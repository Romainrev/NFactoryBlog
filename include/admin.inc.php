<?php

if($_SESSION['admin']==1) {
    $connexion=mysqli_connect("localhost","root","","NFactoryBlog");


    echo('<p> Vous êtes sur la page administrateur </p>');

}else {
    echo('Erreur');

}