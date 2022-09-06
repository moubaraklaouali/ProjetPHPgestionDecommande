<?php 
include_once("../connexion/connexion_mysql.php");

//----Les fonctiond ajout, consultation, modification, suppression
// include("fonction_utilisateur.php");
//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//

include("fonction_fournisseur.php");
include("fonction_commande.php");
include("fonction_produit.php");

//=============================================//
//===RECUPERATION DES INFOS D'UTILISATEUR//
//================================//





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
  <link href="../dist/css/sb-admin-2.min.css" rel="stylesheet">

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
<h1 class="page-header">Tableau de bord</h1>
</div>
<!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">

<div class="row panel-group" >
    <div class="col-md-4">
        <div class="panel panel-default" style="border-left: 4px solid #4e73df;">
            <?php
                $critere=true;
                 $resultat=afficherProduit($critere);
                 $total=$resultat->rowCount();
            ?>
            <div class="panel-body">
                <strong style="font-size:3em"><?= $total ?></strong> <br>
               <b style="color: #4e73df;"> Produit<?= $total >1 ? 's' : '' ?> total</b>
				<i class="fa fa-product-hunt fa-2x text-gray-300"  style="float : right; color: gray;"></i>
            </div>
        </div>

    </div>
	
	<div class="col-md-4 ">
        <div class="panel panel-default" style="border-left: 4px solid #36b9cc;">
        <?php
                $critere=true;
                 $resultat=afficherFournisseur($critere);
                 $total=$resultat->rowCount();
            ?>
            <div class="panel-body ">
                <strong style="font-size:3em"><?= $total ?></strong> <br>
               <b style="color: #36b9cc;"> Fournisseur<?= $total >1 ? 's' : '' ?> total</b>
				<i class="fa fa-male fa-2x text-gray-300"  style="float : right; color: gray;"></i>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        <div class="panel panel-default" style="border-left: 4px solid #1cc88a;">
        <?php
                $critere=true;
                 $resultat=afficherCommande($critere);
                 $total=$resultat->rowCount();
            ?>
            <div class="panel-body ">
                <strong style="font-size:3em"><?= $total ?></strong> <br>
               <b style="color: #1cc88a;"> Commande<?= $total >1 ? 's' : '' ?> total</b>
				<i class="fa fa-shopping-basket fa-2x text-gray-300"  style="float : right; color: gray;"></i>
            </div>
        </div>

    </div>

    


 
  
   
    </div>
    
   <!-- /.row (nested) -->
   </div>
  <!-- /.panel-body -->
  </div>
 <!-- /.panel -->
 </div>
 <div class="container-fluid">
 <div id="submit_data" class="row panel-group">

 				<!-- <div class="col-md-8" style="padding-bottom: 50px; left : 150px ">
					<div class="panel panel-default mt-6">
						<div class="panel-heading">Bar Chart</div>
						<div class="panel-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div> -->

				<div class="col-md-6" >
					<div class="panel panel-default mt-6">
						<div class="panel-heading" style="color: #4e73df;">Diagramme à bandes </div>
						<div class="panel-body">
							<div class="chart-container pie-chart" >
								<canvas id="bar_chart" ></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-4 " >
					<div class="panel panel-default mt-6" >
						<div class="panel-heading" style="color: #4e73df;">Diagramme circulaire</div>
						<div class="panel-body" >
							<div class="chart-container pie-chart"  >
								<canvas id="pie_chart" ></canvas>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="panel panel-default mt-6">
						<div class="panel-heading" style="color: #4e73df;">Diagramme en anneau</div>
						<div class="panel-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				
				

				<!-- <div class="col-md-6" style="padding-top: 50px; position: center; left: 200px;">
					<div class="panel panel-default mt-6">
						<div class="panel-heading">Bar Chart</div>
						<div class="panel-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div> -->
			<!-- </div> -->

			
			
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
  <script src="../vendor/Chart/Chart.bundle.min.js"></script>
  <script src="../vendor/jquery/jquery-3.6.0.min.js"></script>

</body>


</html>
<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

	

		$.ajax({
			
			success:function(data)
			{
			
				makechart();
			}
		})
		
	});

	makechart();

	function makechart()
	{
		$.ajax({
			url:"traitement_accueil.php",
			method:"POST",
			data:{action:'fetch'},
			dataType:"JSON",
			success:function(data)
			{
				var language = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					language.push(data[count].language);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:language,
					datasets:[
						{
							label:'Vote',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart3 = $('#bar_chart');

				var graph3 = new Chart(group_chart3, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

</script>
