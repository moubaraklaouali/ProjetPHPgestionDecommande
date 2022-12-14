
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Connexion</title>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">CONNEXION</h3>
</div>
<div class="panel-body">
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
</div>
<?php
      if(isset($_GET['message'])) {
        $message =$_GET['message'];
        echo "<b style='color:red'>$message</b>";
      }
    ?>
 <form action="src/index.php" method="post" class="user">
  <fieldset>
    <div class="form-group">
     <input class="form-control" placeholder="login" name="login" type="text" autofocus required>
    </div>

    <div class="form-group">
     <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="password">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <input class="btn btn-primary btn-user btn-block"
     name="bouton" type="submit" value="Connexion">
  </fieldset>
 </form>
</div>
</div>
</div>
</div>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
