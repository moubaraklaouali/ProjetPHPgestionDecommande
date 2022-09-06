<?php 
include_once("../connexion/connexion_mysql.php");

//----Les fonctiond ajout, consultation, modification, suppression
// include("fonction_utilisateur.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================// commande

include("fonction_commande.php");
include("fonction_fournisseur.php");
include("fonction_produit.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//

if(isset($_GET['id_commande_modifier'])) {
  $id_commande=$_GET['id_commande_modifier'];
  $critere = " id_commande=$id_commande ";
  $resultat=afficherCommande($critere);
  $row= $resultat->fetch();
  $id_commande_modifier=$row['id_commande'];
  $date_commande_modifier=$row['date_commande'];
  $qte_commande_modifier=$row['qte_commande'];
  $fournisseur_id_modifier=$row['fournisseur_id'];
  $produit_id_modifier=$row['produit_id'];


}


?>
<!DOCTYPE html>
<html lang="en">

<head>

<style>
  .nomclasse{
    color: ;
    width: ;
    margin-left: 
  }
</style>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion de commande</title>

  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="wrapper">
<!--========== MENU =================-->
<?php include("menu.php");  ?>
<!-- ================================ -->


<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header" style="color: #14aaf5">Commandes</h1>
<?php
      if(isset($_GET['message'])) {
        $message =$_GET['message'];
        $statut =$_GET['statut'];

        if($statut==0) {
          echo "<div class='alert alert-danger'>$message</div>";
        }
        else {
          echo "<div class='alert alert-success'>$message</div>";
        }

      }
    ?>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading" style="color: #14aaf5">
 Gestion des commandes
</div>
<div class="panel-body">
<div class="row">
  <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-6" style="background-color:#14aaf5" >

  
    <!-- --------------------------------------- -->
    <!-- FORMULAIRE POUR AJOUTER UN UTILISATEUR -->
    <!-- --------------------------------------- -->
     <!-- --------------------------------------- -->
    <!-- FORMULAIRE POUR AJOUTER UN UTILISATEUR -->
    <!-- --------------------------------------- -->
    <fieldset>
      <legend style="color: #fff">Ajouter une commande</legend>
      <form action="traitement_commande.php" method="post">

          <!-- LE CHAMPS POUR NOM fournisseur -->
          <div class="form-group input-group">
              <span class="input-group-addon">
               <i class="fa fa-calendar"></i>
               <small style="color: red">*</small>
              </span>
              <input type="date" class="form-control datepicker" 
              placeholder="Entrez la date du commande" name="date_commande"
              value="<?php if(isset($date_commande_modifier)){echo $date_commande_modifier;} ?>">
          </div>

          <!-- LE CHAMPS POUR PRENOM fournisseur -->
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa"></i>
              <small>*</small>
            </span>
              <input type="text" class="form-control" placeholder="Entrez la quantite" name="qte_commande"
               value="<?php if(isset($qte_commande_modifier)){echo $qte_commande_modifier;} ?>">
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-male"></i> 
              <small>*</small>
            </span>
            <select name="fournisseur_id" id="" class="form-control">
            <option value="">
                Selectionner un fournisseur
            </option>
            <?php
        //=======LISTE DES UTILISATEUR=============//
        // LA VALEUR PAR DEFAUT EST TRUE===
        $critere=true;
        $sql_resultat=afficherFournisseur($critere);
        $i=1;
        foreach ($sql_resultat as $row ) {
            
          if(isset($fournisseur_id_modifier) && $fournisseur_id_modifier==$row['id_fournisseur'] ) {
       ?>

            <option value="<?php echo $row['id_fournisseur'] ?>" selected="selected"> <?php echo $row['nom'] ?> <?php echo $row['prenom'] ?></option>
            <?php } else { ?>
              <option value="<?php echo $row['id_fournisseur'] ?>"> <?php echo $row['nom'] ?> <?php echo $row['prenom'] ?></option>
              <?php } ?>
            <?php }?>
            </select>
        
</div>

<div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-product-hunt"></i> 
              <small>*</small>
            </span>
            <select name="produit_id" id="" class="form-control">
            <option value="">
                Selectionner un produit
            </option>
            <?php
        //=======LISTE DES UTILISATEUR=============//
        // LA VALEUR PAR DEFAUT EST TRUE===
        $critere=true;
        $sql_resultat=afficherProduit($critere);
        $i=1;
        foreach ($sql_resultat as $row ) {
          if(isset($produit_id_modifier) && $produit_id_modifier==$row['id_produit'] ) {
          
       ?>

            <option value="<?php echo $row['id_produit'] ?>" selected="selected"> <?php echo $row['libelle'] ?> </option>
            <?php } else { ?>
              <option value="<?php echo $row['id_produit'] ?>"> <?php echo $row['libelle'] ?> </option>
            <?php } }?>
            </select>
        
</div>


         
          <!-- === CHAMPS CACHE POUR ID USER=== -->
          <input type="hidden" name="id_commande"
              value="<?php if(isset($id_commande_modifier)){echo $id_commande_modifier;} ?>">

       
          <input type="submit" name="enregistrer" class="btn  btn-dark  btn-xs" value="Enregistrer">



      </form>
     </fieldset>
     </div>
     <div class="col-lg-6" style="background-color:#14aaf5" >
      <table id="example" class='table  table-bordered table-stripedtable-condensed' style="font-size:12px;" >
      <thead style="color: #fff">
      <th>Index</th>
        <th>Nom fournisseur</th>
        <th>Produit</th>
        <th>Prix unitaire</th>
        <th>Quantite commande</th>
        <th>Total</th>
        <th>Date Commande</th>
        <th>Action</th>
       </thead>
       <tbody>

       <?php
        //=======LISTE DES UTILISATEUR=============//
        // LA VALEUR PAR DEFAUT EST TRUE===
        $critere=true;
        $sql_resultat=afficherCommande($critere);
        $i=1;
        foreach ($sql_resultat as $row ) {
          $id_commande=$row['id_commande'];
       ?>

<tr>
              <td><?php echo$i++ ?></td>
              <td><?php echo $row['nom'] ?> <?php echo $row['prenom'];?></td>
              <td><?php echo $row['libelle']; ?></td>
              <td><?php echo $row['prix_unitaire'];?></td>
              <td><?php echo $row['qte_commande'] ?></td>
              <td><?php echo $row['prix_unitaire']*$row['qte_commande'];?></td>
              <td><?php echo $row['date_commande'];?></td>
              
              
              <td>
                <a href="traitement_commande.php?id_commande_supprimer=<?=$id_commande;?>" title="Supprimer la commande" 
                   class="supprimer">
                    <i class="fa fa- fa-trash-o fa-2x"
                      style="color: red;"></i>
                </a>
                    |
                <a href="commande.php?id_commande_modifier=<?=$id_commande;?>" title="Modifier une commande">
                      <i class="fa fa-edit fa-2x"
                      style="color:green;"></i> 
                </a>
              </td>
           </tr>
           <?php }?>
       
       </tbody>
      </table>
      </div>
    <!-- /.col-lg-6 (nested) -->
    </div>
   <!-- /.row (nested) -->
   </div>
  <!-- /.panel-body -->
  </div>
 <!-- /.panel -->
 </div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<footer class="sticky-footer col-lg-12" style="background-color:#14aaf5">
                <div class="container-fluid" >
				<h6 style="text-align: center; margin-top: 10px; font-size: 20px; color: #fff;  padding-top: 30px; padding-bottom: 0px;">Gestion commande<span style="color: orange;">.</span></h6>
                    <div class="copyright text-center my-auto" style="padding-top: 20px; padding-bottom: 40px;">
                        <span style="text-align: center;  color: #fff; ">Copyright &copy; 2022. Tous droits réservés.</span>
                    </div>
                </div>
            </footer>
</div>
<!-- /#page-wrapper -->
</div>
  <!-- /#wrapper -->

<!-- ===========DATA TABLE================ -->
  <script src="../media/js/jquery.js"></script>






  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
  $('#example').dataTable( {
  "iDisplayLength": 5,
  "aLengthMenu": [[5, 25, 50, 100, -1], [5, 25, 50, 100, "Tout"]],
  "sPaginationType": "full_numbers"
  });





  }); 
  </script>
  <style type="text/css" title="currentStyle">
  @import "../media/css/demo_page.css";
  @import "../media/css/demo_table.css";
  </style>
  <!-- /#wrapper -->
  <script type="text/javascript" language="javascript"  src="../media/js/jquery.dataTables.js">
  </script> 

<!--========== jQuery =============-->

<script type="text/javascript" src=""></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="../vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../dist/js/sb-admin-2.js"></script>

</body>
<script type="text/javascript">
  $(document).ready(function(){

    $("#login").keyup(function(){
       if ($("#login").val().length<3){
        $("#message_login").css("color","red").html("Le login est trop court(au moins 3 caractères...)");
       }else{
        $("#message_login").html("");
       }
    });



    $(".supprimer").click(function(){
        if(!confirm("Vous voulez terminé cette suppression")){
          return false;
        }
    });




  });
</script>
</html>
