<?php
echo("<p>Page d'accueil</p>");
$connexion = mysqli_connect("localhost", "root", "", "NFactoryBlog");
$reponse = mysqli_query($connexion,"SELECT * FROM t_articles WHERE ID_ARTICLE='54'");
while ($donnees= mysqli_fetch_array($reponse)) {

    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo(html_entity_decode($donnees['ARTTITRE']));

}
?>