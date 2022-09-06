<?php

include("../connexion/connexion_mysql.php");

// FONCTION QUI PERMET D'AJOUTER UN UTILASTEUR
// DANS LA BASE DE DONNEES date('Y-m-d H:i:s')==================
function ajouterFournisseur($nom,
                            $prenom,
                            $adresse) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
    //----DEMARRER UNE TRANSACTION----//
    $connexion->beginTransaction();
    $connexion->exec("INSERT INTO fournisseur(nom,
                                        prenom,
                                        adresse)

                                        VALUE ('$nom',
                                                '$prenom',
                                                '$adresse')");
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

    function afficherFournisseur($critere) {
        $connexion=$GLOBALS["connexion"];
        try {
             //----DEMARRER UNE TRANSACTION----//
        $connexion->beginTransaction();
        $resultat=$connexion->query("SELECT * FROM fournisseur WHERE $critere
                                        ORDER BY id_fournisseur DESC");
        $connexion->commit();
        return $resultat;
    } catch (Exception $erreur) {
        $connexion->rollback();
        return $erreur->getMessage();
        }
    }
    //Suppression d'un utilisateur
    function supprimerFournisseur($id_fournisseur) {
        $connexion=$GLOBALS["connexion"];
        try {
            $connexion->beginTransaction();
            $connexion->exec("DELETE FROM fournisseur WHERE id_fournisseur=$id_fournisseur");
            return true;  
        }  catch (Exception $erreur) {
            $connexion->rollback();
            $erreur->getMessage();
            }
    }


    //FONCTION MODIFIER UN UTLISATEUR
    function modifierFournisseur($id_fournisseur, 
    $nom,
    $prenom,
    $adresse) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
//----DEMARRER UNE TRANSACTION----//
$connexion->beginTransaction();
$connexion->exec(" UPDATE fournisseur 
                        set nom='$nom',
                         prenom='$prenom',
                         adresse='$adresse'
                        WHERE id_fournisseur=$id_fournisseur

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