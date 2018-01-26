<?php

if(isset($_SESSION['login'])) {
    echo("<h1>Votre espace personnel</h1>");
    $id = $_SESSION['id'];
    $db = connectionPDO();
    $requete = "SELECT * FROM t_users WHERE ID_USER='$id'";
    $result = $db->query($requete);

    while (($donnes = $result->fetch())) {
        echo("<p> Votre nom : " . $donnes['USERNAME'] . "</p>");
        echo("<p> Votre prenom : " . $donnes['USERFNAME'] . "</p>");
        echo("<p> Votre email : " . $donnes['USERMAIL'] . "</p>");
    }
    echo("<form method='post' action='#'><input type='submit' value='Modifier' name='modifier'></form>");

    if (isset($_POST['modifier'])) {
        echo("<form method='post' action='#'>
            <label for='nom'>Nouveau nom : </label><input type='text' name='newNom'><hr>
            <label for='prenom'>Nouveau prénom : </label><input type='text' name='newPrenom'><hr>
            <label for='email'>Nouvelle adresse email : </label><input type='text' name='newEmail'><hr>
            <label for ='mdp'> Mot de passe</label><input type ='password' name='mdp'><hr>
            <input type='submit' value='Modifier mes informations' name='newInfo'><hr>
            
</form>");
    }
    if (isset($_POST['newInfo'])) {
        $tabErreur = array();
        $nom = $_POST['newNom'];
        $prenom = $_POST['newPrenom'];
        $email = $_POST['newEmail'];
        $mdp = $_POST['mdp'];

        if ($nom == "") {
            array_push($tabErreur, "Veuillez saisir votre nom");
        }

        if ($prenom == "") {
            array_push($tabErreur, "Veuillez saisir votre nom");

        }
        if ($email == "") {
            array_push($tabErreur, "Veuillez saisir votre email");
        }
        if ($mdp == "") {
            array_push($tabErreur, "Veuillez saisir votre mot de passe");
        }
        if (count($tabErreur) != 0) {
            $message = "<ul>";
            for ($i = 0; $i < count($tabErreur); $i++) {
                $message .= "<li>" . $tabErreur[$i] . "</li>";
            }
            $message .= "</ul>";
            echo($message);
            //include("./include/login.php");


        } else {
            $mdp=sha1($mdp);
            if ($mdp!= $_SESSION['mdp']) {
                echo("Erreur");
            } else {

                //$db = connectionPDO();
                $requete = "UPDATE t_users SET USERNAME='$nom', USERFNAME='$prenom', USERMAIL='$email' WHERE ID_USER='$id'";
                $result = $db->query($requete);
                }
        }


    }

} else {
    echo("Veuillez vous connecter");
}



