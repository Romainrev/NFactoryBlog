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




