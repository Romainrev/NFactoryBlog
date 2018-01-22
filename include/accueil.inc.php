<?php
echo("<h2>Page d'accueil</h2>");
$dsn ="mysql:dbname=NFactoryBlog;host=localhost;charset=utf8";
$username = "root";
$password ="";
$db = new PDO($dsn, $username, $password);
$requete = "SELECT * FROM t_articles ORDER BY ARTDATE DESC LIMIT 1, 5;";
$result = $db->query($requete);




while ($donnees = $result->fetch()) {

    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo "Publié le: " . date ("F d Y H:i");
    echo('<p>');
    echo "Modifié le: " . date ("F d Y H:i", getlastmod());

    echo("<hr>");




}
unset($db);
?>