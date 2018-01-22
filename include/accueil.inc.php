<?php
echo("<h2>Page d'accueil</h2>");
$dsn ="mysql:dbname=NFactoryBlog;host=localhost;charset=utf8";
$username = "root";
$password ="";
$db = new PDO($dsn, $username, $password);
$requete = "SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles ON t_articles.ID _ARTICLE=t_categories_has_t_articles.T_CATEGORIES_ID_CATEGORIE
 ORDER BY ARTDATE DESC LIMIT 1, 5,";
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


