<?php

$article = $data['article'];

?>

<h1>Ajouter un commentaire</h1>

<form action="/index.php?c=comment&a=add-comment&id=<?= $article->getId() ?>" method="post" class="formRegister">
    <textarea name="content" id="" cols="100" rows="10" required></textarea>
    <input type="submit" name="save" value="Ajouter">
</form>
