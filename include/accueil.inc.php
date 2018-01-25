<?php
echo("<h2>Page d'accueil</h2>");

$db = connectionPDO();
$messagesParPage= 3;
$retourTotal= $db->query('SELECT COUNT(*) AS total FROM t_articles');
$donneesTotal= $retourTotal->fetch(PDO::FETCH_ASSOC);
$total=$donneesTotal['total'];

$nombreDePages=ceil($total/$messagesParPage);




if(isset($_GET['debut'])) {
    $pageActuelle=intval($_GET['debut']);

    if($pageActuelle>$nombreDePages){
        $pageActuelle=$nombreDePages;
    }
} else {
    $pageActuelle=1;
}

$premiereEntree=($pageActuelle-1)*$messagesParPage;

$requete ="SELECT * FROM t_articles LEFT JOIN t_categories_has_t_articles
 ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE 
 LEFT JOIN t_categories ON t_categories_has_t_articles.T_CATEGORIES_ID_CATEGORIE=t_categories.ID_CATEGORIE LIMIT $premiereEntree, $messagesParPage";
$result = $db->query($requete);


//$retourArticle = $db ->query("SELECT * FROM t_articles LIMIT 0,3");




echo("<p>");
while ($donnees =$result->fetch()) {


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

echo '<p align="center">Page : ';
for($i=1; $i<=$nombreDePages; $i++)
{

    if($i==$pageActuelle)
    {
        echo ' [ '.$i.' ] ';
    }
    else //Sinon...
    {
        echo ' <a href="index.php?page=accueil&amp;debut='.$i.'">'.$i.'</a> ';
    }
}
echo '</p>';
unset($db);

?>


