<?php

include("../connexion/connexion_mysql.php");

// FONCTION QUI PERMET D'AJOUTER UN UTILASTEUR
// DANS LA BASE DE DONNEES date('Y-m-d H:i:s')==================
function ajouterCommande($date_commande,
                            $qte_commande,
                            $produit_id,
                            $fournisseur_id) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
    //----DEMARRER UNE TRANSACTION----//
    $connexion->beginTransaction();
    $connexion->exec("INSERT INTO commande(date_commande,
                                        qte_commande,
                                        produit_id,
                                        fournisseur_id)

                                        VALUE ('$date_commande',
                                                '$qte_commande',
                                                '$produit_id',
                                                '$fournisseur_id')");
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

    function afficherCommande($critere) {
        $connexion=$GLOBALS["connexion"];
        try {
             //----DEMARRER UNE TRANSACTION----//
        $connexion->beginTransaction();
        $resultat=$connexion->query("SELECT * FROM commande, fournisseur, produit WHERE id_produit=produit_id and id_fournisseur=fournisseur_id and $critere
                                        ORDER BY id_commande DESC");
        $connexion->commit();
        return $resultat;
    } catch (Exception $erreur) {
        $connexion->rollback();
        return $erreur->getMessage();
        }
    }
    //Suppression d'un utilisateur
    function supprimerCommande($id_commande) {
        $connexion=$GLOBALS["connexion"];
        try {
            $connexion->beginTransaction();
            $connexion->exec("DELETE FROM commande WHERE id_commande=$id_commande");
            return true;  
        }  catch (Exception $erreur) {
            $connexion->rollback();
            $erreur->getMessage();
            }
    }


    //FONCTION MODIFIER UN UTLISATEUR
    function modifierCommande($id_commande, 
    $date_commande,
    $qte_commande,
    $produit_id,
    $fournisseur_id) {

//CONNEXION A LA BASE DE DONNEES
$connexion=$GLOBALS["connexion"];
try {
//----DEMARRER UNE TRANSACTION----//
$connexion->beginTransaction();
$connexion->exec(" UPDATE commande 
                        set date_commande='$date_commande',
                         qte_commande='$qte_commande',
                         fournisseur_id='$fournisseur_id',
                         produit_id='$produit_id'
                        WHERE id_commande=$id_commande

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