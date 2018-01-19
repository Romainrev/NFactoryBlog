<?php

if($_SESSION['admin']==1) {
    $connexion=mysqli_connect("localhost","root","","NFactoryBlog");
    $requete = "SELECT * FROM t_users";
    $result = mysqli_query($connexion,$requete);
    echo("<table>");
    while($donnees=mysqli_fetch_array($result)) {

        echo("<td><td>".$donnees['USERNAME']."</td>"."<td>".$donnees['USERFNAME']."</td>"."<td>".$donnees['USERMAIL']."
</td>"."<td>".$donnees["T_ROLES_ID_ROLE"]."</td>"."<td>"."<select><option value='1'>1</option><option value='2'>2</option>
<option value='3'>3</option><option value='4'>4</option><option value='7'>7</option></select></td><td><input type='submit' 
value='Mettre à jour' name ='Mettre à jour' </td></tr>");
        echo('<p>');
    }
    echo("</table>");
    echo('<p> Vous êtes sur la page administrateur </p>');

}else {
    echo('Erreur');

}