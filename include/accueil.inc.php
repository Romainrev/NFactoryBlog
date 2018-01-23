<?php
echo("<h2>Page d'accueil</h2>");

$db = connectionPDO();

$requete ="SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles
 ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE LEFT JOIN t_categories ON t_categories_has_t_articles.T_CATEGORIES_ID_CATEGORIE=t_categories.ID_CATEGORIE";
$result = $db->query($requete);

echo("<p>");
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


