<?php

$recherche = $_POST['recherche'];
// var_dump($recherche);
if($recherche == "") {
    echo "Veuillez remplir le champ";
}
else {
    //   var_dump($e);
    $db = connectionPDO();
    $requete ="SELECT * FROM t_articles WHERE ARTCONTENU LIKE '%" . $recherche . "%' ORDER BY ARTTITRE ASC ";
    // die($requete);
    $result = $db ->query($requete);
    if(isset($_POST['recherche'])) {
        while ($donnees = $result ->fetch())
        {
            echo ("<h2>".html_entity_decode($donnees['ARTTITRE'])."</h2>");
            echo ("<br/>");
            echo ("<h3>".html_entity_decode($donnees['ARTCHAPO'])."</h3>");
            echo ("<p>".html_entity_decode($donnees['ARTCONTENU'])."</p>");
        }
    }
}
