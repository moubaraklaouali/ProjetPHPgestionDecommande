<?php

include("../connexion/connexion_mysql.php");

// FONCTION QUI PERMET D'AJOUTER UN UTILASTEUR
// DANS LA BASE DE DONNEES date('Y-m-d H:i:s')==================
function ajouterProduit($libelle,
                            $prix_unitaire) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
    //----DEMARRER UNE TRANSACTION----//
    $connexion->beginTransaction();
    $connexion->exec("INSERT INTO produit(libelle,
                                        prix_unitaire)
                                            VALUE ('$libelle',
                                                '$prix_unitaire')");
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

    function afficherProduit($critere) {
        $connexion=$GLOBALS["connexion"]; 
        try {
             //----DEMARRER UNE TRANSACTION----//
        $connexion->beginTransaction();
        $resultat=$connexion->query("SELECT * FROM produit WHERE $critere
                                        ORDER BY id_produit DESC");
        $connexion->commit();
        return $resultat;
    } catch (Exception $erreur) {
        $connexion->rollback();
        return $erreur->getMessage();
        }
    }
    //Suppression d'un utilisateur
    function supprimerProduit($id_produit) {
        $connexion=$GLOBALS["connexion"];
        try {
            $connexion->beginTransaction();
            $connexion->exec("DELETE FROM produit WHERE id_produit=$id_produit");
            return true;  
        }  catch (Exception $erreur) {
            $connexion->rollback();
            $erreur->getMessage();
            }
    }


    //FONCTION MODIFIER UN UTLISATEUR
    function modifierProduit($id_produit, 
    $libelle,
    $prix_unitaire) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
//----DEMARRER UNE TRANSACTION----//
$connexion->beginTransaction();
$connexion->exec(" UPDATE produit 
                        set libelle='$libelle',
                         prix_unitaire='$prix_unitaire'
                        WHERE id_produit=$id_produit

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