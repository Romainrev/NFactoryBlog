<?php
$db = connectionPDO();

$share = '<a href="http://twitter.com/share" class="twitter-share-button" 
  data-count="vertical" data-via="InfoWebMaster">Tweet</a>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';

$share3 = '<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&size=small&mobile_iframe=true&width=105&height=20&appId" width="105" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';

$id = $_GET['id'];
$requete = $db -> prepare("SELECT * FROM t_articles WHERE ID_ARTICLE = $id");
$requete-> execute(array($id));
$donnees=$requete->fetch();
echo("<h2>".html_entity_decode($donnees['ARTTITRE'])."</h2>");
echo("<h3>".html_entity_decode($donnees['ARTCHAPO'])."</h3>");
echo("<p>".html_entity_decode($donnees['ARTCONTENU'])."</p>");
echo($share.$share3);




/*$sql = "SELECT * FROM t_articles

LEFT JOIN t_categories_has_t_articles ON t_articles.ID_ARTICLE=t_categories_has_t_articles.T_ARTICLES_ID_ARTICLE
LEFT JOIN t_categories ON t_categories_has_t_articles.T_CATEGORIES_ID_CATEGORIE=t_categories.ID_CATEGORIE
WHERE ID_CATEGORIE = 3 ORDER BY ID_ARTICLE DESC LIMIT 0,3";
$reponse = $db->query($sql) or die(mysqli_error());

while ($donnees= $reponse->fetch(PDO::FETCH_ASSOC)){
    $articleId = $donnees['ID_ARTICLE'];

    echo "<h2>"."<a href=\"index.php?page=articlesfull&amp;id=$articleId\">".$donnees['ARTTITRE']."</a>"."</h2>"."<h3>" .$donnees['ARTCHAPO'] ."<hr>" ."</h3>" ;
