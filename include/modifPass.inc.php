<?php

if(!isset($_GET['cle']) || !isset($_GET[('email')])){
    echo("Accés refusé");
}
?>




<?php

if(isset($_GET['cle']) && isset($_GET[('email')])) {
echo("<form method=\"post\" action=\"\">
    <div>
        <label for=\"cle\"> Clé de sécurité : </label><input type=\"password\" name=\"clef\">
    </div>
    <div>
    <label for=\"email\">Adresse email : </label><input type=\"email\" name=\"email\">
    </div>
    <div>
        <label for=\"mdp\">Nouveau mot de passe : </label><input type=\"password\" name=\"mdp\">
    </div>
    <div>
        <input type=\"submit\" value=\"Valider\" name=\"Valider\">
    </div>
</form>");

    if (isset($_POST['Valider'])) {
        $mail = $_GET['email'];
        $cle = $_GET['cle'];
        $clef = $_POST['clef'];
        $clef = sha1($clef);
        $mdp = $_POST['mdp'];
        $mdp = sha1($mdp);
        $email = $_POST['email'];
        if ($clef != $cle) {
            echo("Erreur");
        }
        if ($mail != $email) {
            echo "Erreur";
        } else {
            $db = connectionPDO();
            $requete = "UPDATE t_users SET USERPASSWORD='$mdp' WHERE USERMAIL='$email' ";
            $result = $db->query($requete);

        }
    }
}