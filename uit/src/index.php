<?php 
include("../connexion/connexion_mysql.php");
include("fonction_utilisateur.php");

if(isset($_POST['login']) && isset($_POST['password'])) {
    if(empty($_POST['login']) OR empty($_POST['password'])) {
        $message= " Le login ou le password sont obligatoire.";
        header("location:../index.php?message=$message");
    } else {
        $login=$_POST['login'];
        $password= sha1($_POST['password']);
        $critere="login_user='$login' and password_user='$password'";
        $resultat=afficherUtilisateur($critere);
        $nombre_ligne=$resultat->rowCount();
        if($nombre_ligne>0) {
            //---les informations de l'utilsateur-----
            $row=$resultat->fetch();
            $id_user=$row['id_user'];
            $nom=$row['nom_user'];
            $prenom=$row['prenom_user'];
            $droit=$row['droit'];

            ////-----UTLISATION DES SESSIONS DEMARRE LA SESSION---
            session_start(); //CETTE FONCTION PERMET DE DEMARRER UNE SESSION
            $_SESSION['id_user'] =$id_user;
            $_SESSION['nom']=$nom;
            $_SESSION['prenom']=$prenom;
            $_SESSION['login']=$login;
            $_SESSION['droit']=$droit;
            $_SESSION['password']=$password;
            header("location:accueil.php");
        } else {
            $message="Le login ou le password est incorrect.";
            header("location:../index.php?message=$message");
        }
    }
}



?>


