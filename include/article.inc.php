<?php


if(isset($_SESSION['login'])) {

    if (isset($_POST['formulaire3'])) {
        $tabErreur = array();
        $titre = $_POST["titre"];
        $chapo = $_POST["chapo"];
        $contenu = $_POST['contenu'];


        if ($_POST["titre"] == "") {
            array_push($tabErreur, "Veuillez saisir votre titre");
        }
        if ($_POST["chapo"] == "") {
            array_push($tabErreur, "Veuillez saisir votre sous titre");
        }
        if ($_POST["contenu"] == "") {
            array_push($tabErreur, "Veuillez saisir votre article");
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

            $dsn ="mysql:dbname=NFactoryBlog;host=localhost;charset=utf8";
            $username = "root";
            $password ="";
            $db = new PDO($dsn, $username, $password);

            $contenu = addslashes(htmlentities($contenu));
            $chapo = addslashes(utf8_decode(htmlentities($chapo)));
            $titre = addslashes(utf8_decode(htmlentities($titre)));
            $requete2 = "INSERT INTO `t_articles` (ID_ARTICLE, ARTTITRE, ARTCHAPO,ARTCONTENU,ARTDATE) VALUES (NULL, '$titre', '$chapo', '$contenu', NOW())";


            if ($db->query ($requete2))
                echo "OK";
            else
                echo "Fuck";
            unset($db);


        }
    } else {
        include("./include/formarticle.php");
    }
}else {
    echo('Erreur, veuillez vous connecter');
}

