<?php
echo("<h2>Page d'accueil</h2>");
$dsn ="mysql:dbname=NFactoryBlog;host=localhost;charset=utf8";
$username = "root";
$password ="";
$db = new PDO($dsn, $username, $password);
$requete ="SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles
 ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_CATEGORIES_ID_CATEGORIE²jujulijuijkyh-ykihjkèujkujyhik:uj";
die($requete);
$result = $db->query($requete);

while ($donnees = $result->fetch()) {

    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo "Publié le: " . date ("F d Y H:i");
    echo('<p>');
    echo "Modifié le: " . date ("F d Y H:i", getlastmod());
    echo($donnees['CATLIBELLE']);
    echo("<hr>");




}
unset($db);

?>


