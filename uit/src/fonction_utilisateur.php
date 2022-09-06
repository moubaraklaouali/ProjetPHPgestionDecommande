<?php
    include("../connexion/connexion_mysql.php");

    // FONCTION QUI PERMET D'AJOUTER UN UTILASTEUR
    // DANS LA BASE DE DONNEES date('Y-m-d H:i:s')==================
    function ajouterUtilisateur($nom,
                                $prenom,
                                $telephone,
                                $login,
                                $password,
                                $createdBy,
                                $createdAt,
                                $droit) {

    //CONNEXION A LA BASE DE DONNEES
    $connexion=$GLOBALS["connexion"];
    try {
        //----DEMARRER UNE TRANSACTION----//
        $connexion->beginTransaction();
        $connexion->exec("INSERT INTO user(nom_user,
                                            prenom_user,
                                            telephone_user,
                                            login_user,
                                            password_user,
                                            createdBy_user,
                                            createdAt_user,
                                            droit )

                                            VALUE('$nom',
                                                    '$prenom',
                                                    '$telephone',
                                                    '$login',
                                                    '$password',
                                                    '$createdBy',
                                                    '$createdAt',
                                                    '$droit')
                                            
                                            ");
        //-----VALIDER LA TRANSACTION----
        $connexion->commit();
        return true;
    } catch (Exception $erreur) {
        $connexion->rollback();
        return $erreur->getMessage();
    }           

    }       
    
    
    /*=======================================================
    La fonction qui affiche la liste des utlisateur
    =====================================*/

    function afficherUtilisateur($critere) {
        $connexion=$GLOBALS["connexion"];
        try {
             //----DEMARRER UNE TRANSACTION----//
        $connexion->beginTransaction();
        $resultat=$connexion->query("SELECT * FROM user WHERE $critere
                                        ORDER BY id_user DESC");
        $connexion->commit();
        return $resultat;
    } catch (Exception $erreur) {
        $connexion->rollback();
        return $erreur->getMessage();
        }
    }
    //Suppression d'un utilisateur
    function supprimerUtilisateur($id_user) {
        $connexion=$GLOBALS["connexion"];
        try {
            $connexion->beginTransaction();
            $connexion->exec("DELETE FROM user WHERE id_user=$id_user");
            return true;  
        }  catch (Exception $erreur) {
            $connexion->rollback();
            $erreur->getMessage();
            }
    }

//FONCTION MODIFIER UN UTLISATEUR
    function modifierUtilisateur($id_user, 
    $nom,
    $prenom,
    $telephone,
    $login,
    $password,
    $createdBy,
    $createdAt,
    $droit) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
//----DEMARRER UNE TRANSACTION----//
$connexion->beginTransaction();
$connexion->exec(" UPDATE user 
                        set nom_user='$nom',
                         prenom_user='$prenom',
                         login_user='$login',
                         telephone_user='$telephone',
                         password_user='$password',
                         createdBy_user='$createdBy',
                         droit='$droit',
                         createdAt_user='$createdAt'
                        WHERE id_user=$id_user

                        "); 
//-----VALIDER LA TRANSACTION----
$connexion->commit();
return true;
} catch (Exception $erreur) {
$connexion->rollback();
return $erreur->getMessage();
}           

}       
    
    
?>