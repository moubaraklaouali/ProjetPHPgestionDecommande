<?php

include("fonction_fournisseur.php");
include("fonction_commande.php");
include("fonction_produit.php");



if(isset($_POST["action"]))
{
	

	if($_POST["action"] == 'fetch')
	{
        $critere=true;
        $resultat1=afficherProduit($critere);
        $produit=$resultat1->rowCount();
        $resultat2=afficherCommande($critere);
        $commande=$resultat2->rowCount();
        $resultat3=afficherFournisseur($critere);
        $fournisseur=$resultat3->rowCount();

		$data = array();


		

		// $c='#' . rand(100000, 999999) . '';
		// $p='#' . rand(100000, 999999) . '';
		// $f='#' . rand(100000, 999999) . '';
		
			$data[] = array(
				'language'		=>	"Produit",
				'total'			=>	 $produit,
				'color'			=>	"#4e73df"
			);

			$data[] = array(
				'language'		=>	"Fournisseur",
				'total'			=>	$fournisseur,
				'color'			=>	"#36b9cc"
			);

			$data[] = array(
				'language'		=>	"Commande",
				'total'			=>	$commande,
				'color'			=>	"#1cc88a"
			);
		

		
		

		echo json_encode($data);
	}
}


?>