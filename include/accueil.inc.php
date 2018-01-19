<?php
echo("<h2>Page d'accueil</h2>");
$connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
$reponse = mysqli_query($connexion,"SELECT * FROM t_articles ORDER BY ARTDATE DESC LIMIT 1, 5;");
while ($donnees= mysqli_fetch_array($reponse)) {
    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo "Publié le: " . date ("F d Y H:i");
    echo('<p>');
    echo "Modifié le: " . date ("F d Y H:i", getlastmod());

    echo("<hr>");




}
?>