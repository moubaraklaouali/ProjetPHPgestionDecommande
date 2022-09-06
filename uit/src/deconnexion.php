<?php
    //---DEMARRER LA SESSION---
    session_start();
    //---DETRUIRE LA SESSION
    session_unset();
    //Rediriger l;utlisateur vers la page deconnexion
    header("location:../index.php");
?>