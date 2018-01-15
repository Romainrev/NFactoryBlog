<?php
session_start();
include_once ("./function/callPage.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel ="stylesheet" href ="./assets/css/style.css">
    <script type="text/javascript" src="./assets/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({

            selector: 'textarea'
        });
    </script>
</head>

<body>
<div id="main">
    <?php
    include_once("./include/header.php");?>
    <main>

        <?php

        callPage();


        ?>

    </main>
</div>

</body>
</html>