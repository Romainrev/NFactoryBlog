<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<form method = "post" action ="#">
    <div class="titre">
        <label for="titre">Titre : </label><input type ="texte" name ="titre">
    </div>
    <div class="chapo">
        <label for="chapo">Sous titre : </label><input type ="texte" name ="chapo">
    </div>
    <div class="contenu">
        <label for="contenu">Article : </label><textarea name ="contenu"></textarea>
    </div>
    <div class="date">
        <label for="date">Publié le  : </label><input type ="date" name ="date"
    </div>
    <div class ="bouton">
        <input type = "submit" value = "Soumettre" name ="formulaire3">
    </div>

</form>


<?php
