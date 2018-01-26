<h1>Inscription</h1>
<?php


if(isset($_POST["formulaire"])) {


    $tabErreur = array();
    $nom =trim($_POST['nom']);
    $prenom=trim($_POST["Prenom"]);
    $email= $_POST["email"];
    $mdp=$_POST["password"];

    if($_POST["nom"] == "")
        array_push($tabErreur, "Veuillez saisir votre nom");

    if($_POST["Prenom"] == "")
        array_push($tabErreur, "Veuillez saisir votre prénom");

    if($_POST["email"] == " " || !filter_var($email, FILTER_VALIDATE_EMAIL))
        array_push($tabErreur, "Veuillez saisir votre e-mail");

    if($_POST["password"] == "")
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
        $db = connectionPDO();

        if($_POST['captcha'] != $_SESSION['captcha']) {
            echo("Erreur captcha");
        }else {


            $mdp = sha1($_POST['password']);
            $requete = "INSERT INTO t_users (ID_user, USERNAME, USERFNAME,USERMAIL,USERPASSWORD,USERDATEINS,T_ROLES_ID_ROLE) VALUES (NULL, '$nom', '$prenom', '$email', '$mdp', NULL, 2)";
            $db->query($requete);
            unset($db);
        }
    }







}

else {

    include("./include/formInscription.php");
}
