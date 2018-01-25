<?php

echo("<h1>Contactez nous !</h1>");
if(isset($_POST['contact'])) {
    $tabErreur = array();
    $email = $_POST["email"];
    $mdp = $_POST["password"];
    $message = $_POST["message"];

    if ($_POST["email"] == "") {
        array_push($tabErreur, "Veuillez saisir votre email");
    }
    if ($_POST["sujet"] == " ") {
        array_push($tabErreur, "Veuillez saisir votre sujet ");
    }

    if ($_POST["message"] == " ") {
        array_push($tabErreur, "Veuillez saisir votre mess&age ");
    }

    if (count($tabErreur) != 0) {
        $message = "<ul>";
        for ($i = 0; $i < count($tabErreur); $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formContact.php");
    } else {




    }
}else {
    include("./include/formContact.php");
}