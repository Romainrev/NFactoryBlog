<h1>Inscription</h1>
<?php
if(isset($_POST["formulaire"])) {
    $tabErreur = array();
    $nom = $_POST("nom");
    $prenom = $_POST("Prenom");
    $email = $_POST("email");
    $mdp = $_POST("pass");

    if($_POST["nom"] == "")
        array_push($tabErreur, "Veuillez saisir votre nom");

    if($_POST["Prenom"] == "")
        array_push($tabErreur, "Veuillez saisir votre prénom");

    if($_POST["email"] == "")
        array_push($tabErreur, "Veuillez saisir votre e-mail");

    if($_POST["pass"] == "")
        array_push($tabErreur, "Veuillez saisir un mot de passe");

    if(count($tabErreur) != 0) {
        $message = "<ul>";

        for($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }

        $message .= "</ul>";
        echo($message);

        include("./include/formInscription.php");
    } else {
        $connexion=mysqli_connect("localhost","root","","nfactoryblog");
        $requete = "INSERT INTO `t-users`(`ID_user`, `USERNAME`, `USERFNAME`,`USERMAIL`,`USERPASSWORD`,) VALUES (NULL, $nom, $prenom, $email, $mdp NULL, 5)";

        mysqli_query($connexion , $requete);
        mysqli_close($connexion);

    }
  





    
}

else {
    echo("Je viens d'ailleurs");
    include("./include/formInscription.php");
}
