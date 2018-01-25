<?php
$db = connectionPDO();

$requete = $db -> prepare("SELECT * FROM t_categories_has_t_articles LEFT JOIN t_articles ON t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE=t_articles.ID_ARTICLE WHERE T_CATEGORIES_ID_CATEGORIE=?");
$requete -> execute(array($_GET['id']));
while($donnees = $requete -> fetch()) {
    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo "Publié le: " . date ("F d Y H:i");
    echo('<p>');
    echo "Modifié le: " . date ("F d Y H:i", getlastmod());
    echo("<hr>");
}

