<?php
include_once ("./include/NewMDP.php");
if(isset($_POST['valider'])) {
    $email =$_POST['email'];
    $taberreur=array();

    if($email==""){
        array_push($taberreur, "Veuillez saisir une adresse mail");
    }
    if(count($taberreur)!=0){
        $message="<ul>";
        for($i=0;$i<count($taberreur);$i++){
            $message .= "<li>".$taberreur[$i]."</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formRecuperation.php");
    }else {
        $db=connectionPDO();
        $requete = "SELECT * FROM t_users WHERE USERMAIL ='$email'";
        if($result=$db->query($requete)){
            $count = $result->rowCount();
            if($count==0){
                echo("Email invalide");
            } else {


                $to =$email;
                $subject = "Récupération de mot de passe";
                $cle=generationMdp();
                $message=$cle;
                $cle=sha1($cle);
                $message .='<html>
                             <body>
                             
                             <a href="http://localhost/Blog2/index.php?page=modifPass&amp;cle='.$cle.'&amp;email='.$to.'">Cliquez-ici pour modifier votre mot de passe.</a>
                                    </body>
                                 </html>';

                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Admin <16983@csm-rouen.net>' . "\r\n";
                mail($to, utf8_decode($subject), $message, $headers);
            }
        }

    }

}  else {

    include("./include/formRecuperation.php");}