<?php



if(isset($_POST['formulaire3'])) {
    $tabErreur = array();

    $titre = $_POST["titre"];
    $chapo = $_POST["chapo"];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];


    if ($_POST["titre"] == "") {
        array_push($tabErreur, "Veuillez saisir votre titre");
    }
    if ($_POST["chapo"] == "") {
        array_push($tabErreur, "Veuillez saisir votre sous titre");
    }
    if ($_POST["contenu"] == "") {
        array_push($tabErreur, "Veuillez saisir votre article");
    }
    if ($_POST["date"] == "") {
        array_push($tabErreur, "Veuillez saisir une date ");
    }
    if (count($tabErreur) != 0) {

        $message = "<ul>";
        for ($i = 0; $i < count($tabErreur); $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formarticle.php");

    } else {

        $connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
        $requete2 = "INSERT INTO t_articles (ID_ARTICLE, ARTTITRE, ARTCHAPO,ARTCONTENU,ARTDATE) VALUES (NULL, '$titre', '$chapo', '$contenu', '$date')";
        mysqli_query($connexion, $requete2);
        mysqli_close($connexion);

    }
}else{
    include("./include/formarticle.php");
}


