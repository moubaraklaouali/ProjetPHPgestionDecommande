<nav class="navbar navbar-default navbar-static-top" 
role="navigation" style="margin-bottom: 0">
 <div class="navbar-header">
        <a class="navbar-brand" href="" style="color:#4e73df"><?php session_start(); echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></a>
        <?php if(empty($_SESSION['id_user'])){
            $message="Connectez vous d'abors";
            header("location:../index.php?message=$message");
        } ?>
 </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
         <i class="fa fa-caret-down"></i>     
        </li>
        <li class="dropdown">
        <a href="deconnexion.php"><i class="fa fa-sign-out fa-fw"></i> Deconnexion</a>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
            <li>
                    <a href="accueil.php">
                    <i class="fa fa-home fa-fw"></i> Accueil</a>
                </li>
               
                <li>
                    <a href="fournisseur.php">
                    <i class="fa fa-male fa-fw"></i> Fournisseur</a>
                </li>
                <li>
                    <a href="produit.php">
                    <i class="fa fa-product-hunt fa-fw"></i> Produit</a>
                </li>
                <li>
                    <a href="commande.php">
                    <i class="fa fa-shopping-basket fa-fw"></i> Commande</a>
                </li>
                <?php if($_SESSION['droit']==1) { ?>

                <li>
                    <a href="utilisateur.php"><i class="fa fa-user fa-fw"></i> Utilisateur</a>
                </li>

                <?php } ?>
               
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>