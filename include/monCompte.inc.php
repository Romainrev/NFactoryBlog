<?php

if(isset($_SESSION['login'])){
    echo("<h1>Votre espace personnel</h1>");
    $id=$_SESSION['id'];
    $db=connectionPDO();
    $requete="SELECT * FROM t_users WHERE ID_USER='$id'";
    $result=$db->query($requete);

    while (($donnes=$result->fetch())){
        echo("<p> Votre nom : ".$donnes['USERNAME']."</p>");
        echo("<p> Votre prenom : ".$donnes['USERFNAME']."</p>");
        echo("<p> Votre email : ".$donnes['USERMAIL']."</p>");
    }
} else {
    echo("Veuillez vous connecter");
}
