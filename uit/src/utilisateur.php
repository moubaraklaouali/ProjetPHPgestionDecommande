<?php 
include_once("../connexion/connexion_mysql.php");

//----Les fonctiond ajout, consultation, modification, suppression
include("fonction_utilisateur.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//

if(isset($_GET['id_user_modifier'])) {
  $id_user=$_GET['id_user_modifier'];
  $critere = " id_user=$id_user ";
  $resultat=afficherUtilisateur($critere);
  $row= $resultat->fetch();
  $id_user_modifier=$row['id_user'];
  $nom_modifier=$row['nom_user'];
  $prenom_modifier=$row['prenom_user'];
  $telephone_modifier=$row['telephone_user'];
  $login_modifier=$row['login_user'];
  $droit_modifier=$row['droit'];

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
<h1 class="page-header" style="color: #14aaf5">Utilisateurs</h1>
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
 Gestion des utilisateurs
</div>
<div class="panel-body">
<div class="row">
  <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-6" style="background-color:#14aaf5" >

    <!-- --------------------------------------- -->
    <!-- FORMULAIRE POUR AJOUTER UN UTILISATEUR -->
    <!-- --------------------------------------- -->
    <fieldset>
      <legend style="color: #fff">Ajouter un utilisateur</legend>
      <form action="traitement_utilisateur.php" method="post">

          <!-- LE CHAMPS POUR NOM UTILISATEUR -->
          <div class="form-group input-group">
              <span class="input-group-addon">
               <i class="fa fa-male"></i>
               <small style="color: red">*</small>
              </span>
              <input type="text" class="form-control" 
              placeholder="Entrez le nom" name="nom"
              value="<?php if(isset($nom_modifier)){echo $nom_modifier;} ?>">
          </div>

          <!-- LE CHAMPS POUR PRENOM UTILISATEUR -->
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-male"></i>
              <small>*</small>
            </span>
              <input type="text" class="form-control" placeholder="Entrez le prenom" name="prenom"
               value="<?php if(isset($prenom_modifier)){echo $prenom_modifier;} ?>">
          </div>

          <!-- LE CHAMPS POUR TELEPHONE UTILISATEUR -->
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-phone-square"></i>
              <small>*</small>
            </span>
              <input type="text" class="form-control"
               placeholder="Entrez le telephone" name="telephone" value="<?php if(isset($telephone_modifier)){echo $telephone_modifier;} ?>">
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-user-secret"></i>
              <small>*</small>
            </span>
              <input type="text" class="form-control"
               placeholder="Entrez le niveau 0(user) et 1(admin)" name="droit" value="<?php if(isset($droit_modifier)){echo $droit_modifier;} ?>">
          </div>


          <!-- LE CHAMPS POUR LOGIN UTILISATEUR -->
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
              <small style="color: red">*</small>
            </span>
              <input type="text" class="form-control" placeholder="Entrez le login" name="login" id="login" value="<?php if(isset($login_modifier)){echo $login_modifier;} ?>">
              <small id="message_login"></small>
          </div>
          
          <!-- LE CHAMPS POUR PASSWORD UTILISATEUR -->
          <div class="form-group input-group">
            <span class="input-group-addon">
              <i class="fa fa-key"></i>
              <small style="color: red">*</small>
            </span>
              <input type="password" class="form-control" placeholder="Entrez le password" name="password" id="password">
              <small id="pass1"></small>
          </div>
          <input type="hidden" name="createdBy" value="<?php echo $_SESSION['id_user']; ?> ">
          <!-- === CHAMPS CACHE POUR ID USER=== -->
          <input type="hidden" name="id_user"
              value="<?php if(isset($id_user_modifier)){echo $id_user_modifier;} ?>">

       
          <input type="submit" name="enregistrer" class="btn  btn-dark  btn-xs" value="Enregistrer">



      </form>
     </fieldset>
     </div>
     <div class="col-lg-6" style="background-color:#14aaf5" >
      <table id="example" class='table  table-bordered table-stripedtable-condensed' style="font-size:12px;" >
      <thead style="color: #fff">
          <th>Index</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Tel</th>
          <th>Login</th>
          <th>Niveau</th>
          <th>Action</th>
       </thead>
       <tbody>

       <?php
        //=======LISTE DES UTILISATEUR=============//
        // LA VALEUR PAR DEFAUT EST TRUE===
        $critere=true;
        $sql_resultat=afficherUtilisateur($critere);
        $i=1;
        foreach ($sql_resultat as $row ) {
          $id_user=$row['id_user'];
       ?>

           <tr>
              <td><?php echo$i++ ?></td>
              <td><?php echo $row['nom_user'] ?></td>
              <td><?php echo $row['prenom_user'] ?></td>
              <td><?php echo $row['telephone_user'] ?></td>
              <td><?php echo $row['login_user'] ?></td>
              <td><?php if($row['droit']==1) echo "Admin"; else echo "User"; ?></td>
              <td>
                <a href="traitement_utilisateur.php?id_user_supprimer=<?=$id_user;?>" title="Supprimer l'utilisateur" 
                   class="supprimer">
                    <i class="fa fa- fa-trash-o fa-2x"
                      style="color: red;"></i>
                </a>
                    |
                <a href="utilisateur.php?id_user_modifier=<?=$id_user;?>" title="Modifier un utilisateur">
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
