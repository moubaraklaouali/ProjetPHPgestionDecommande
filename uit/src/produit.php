<?php 
include_once("../connexion/connexion_mysql.php");

//----Les fonctiond ajout, consultation, modification, suppression
// include("fonction_utilisateur.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//

include("fonction_produit.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//

if(isset($_GET['id_produit_modifier'])) {
  $id_produit=$_GET['id_produit_modifier'];
  $critere = " id_produit=$id_produit ";
  $resultat=afficherProduit($critere);
  $row= $resultat->fetch();
  $id_produit_modifier=$row['id_produit'];
  $libelle_modifier=$row['libelle'];
  $prix_unitaire_modifier=$row['prix_unitaire'];


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
<h1 class="page-header" style="color: #14aaf5">Produits</h1>
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
 Gestion des produits
</div>
<div class="panel-body">
<div class="row">
  <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-6" style="background-color:#14aaf5">

   
    <!-- --------------------------------------- -->
    <!-- FORMULAIRE POUR AJOUTER UN UTILISATEUR -->
    <!-- --------------------------------------- -->
     <!-- --------------------------------------- -->
    <!-- FORMULAIRE POUR AJOUTER UN UTILISATEUR -->
    <!-- --------------------------------------- -->
    <fieldset>
      <legend style="color: #fff">Ajouter un produit</legend>
      <form action="traitement_produit.php" method="post">

          <!-- LE CHAMPS POUR NOM produit -->
          <div class="form-group input-group">
              <span class="input-group-addon">
               <i class="fa fa-product-hunt"></i>
               <small style="color: red">*</small>
              </span>
              <input type="text" class="form-control" 
              placeholder="Entrez le libelle" name="libelle"
              value="<?php if(isset($libelle_modifier)){echo $libelle_modifier;} ?>">
          </div>

          <!-- LE CHAMPS POUR PRENOM fournisseur --> 
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-eur"></i>
              <small>*</small>
            </span>
              <input type="text" class="form-control" placeholder="Entrez le prix_unitaire" name="prix_unitaire"
               value="<?php if(isset($prix_unitaire_modifier)){echo $prix_unitaire_modifier;} ?>">
          </div>



         
          <!-- === CHAMPS CACHE POUR ID USER=== --> 
          <input type="hidden" name="id_produit"
              value="<?php if(isset($id_produit_modifier)){echo $id_produit_modifier;} ?>">

       
          <input type="submit" name="enregistrer" class="btn  btn-dark  btn-xs" value="Enregistrer">



      </form>
     </fieldset>
     </div>
     <div class="col-lg-6" style="background-color:#14aaf5">
      <table id="example" class='table  table-bordered table-stripedtable-condensed' style="font-size:12px;" >
      <thead style="color: #fff">
      <th>Index</th>
          <th>libelle</th>
          <th>Prix Unitaire</th>
          <th>Action</th>
       </thead>
       <tbody>
 
       <?php
        //=======LISTE DES UTILISATEUR=============//
        // LA VALEUR PAR DEFAUT EST TRUE===
        $critere=true;
        $sql_resultat=afficherProduit($critere);
        $i=1;
        foreach ($sql_resultat as $row ) {
          $id_produit=$row['id_produit'];
       ?>

<tr>
              <td><?php echo$i++ ?></td>
              <td><?php echo $row['libelle'] ?></td>
              <td><?php echo $row['prix_unitaire'] ?></td>
              <td>
                <a href="traitement_produit.php?id_produit_supprimer=<?=$id_produit;?>" title="Supprimer le produit" 
                   class="supprimer">
                    <i class="fa fa- fa-trash-o fa-2x"
                      style="color: red;"></i>
                </a>
                    |
                <a href="produit.php?id_produit_modifier=<?=$id_produit;?>" title="Modifier un produit">
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
