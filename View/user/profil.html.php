<?php
    $user = $_SESSION['user']->getId();
?>

<h1>Espace utilisateur</h1>

<div class="edit-profil">
    <div class="line">
        <div><p class="detail">Votre prénom : <?= ($_SESSION['user'])->getFirstname() ?></p></div>
        <div><a href="" class="edit">Editer</a></div>
    </div>
    <div class="line">
        <div><p class="detail">Votre nom : <?= ($_SESSION['user'])->getLastname() ?></p></div>
        <div><a href="" class="edit">Editer</a></div>
    </div>
    <div class="line">
        <div><p class="detail">Votre email : <?= ($_SESSION['user'])->getEmail() ?></p></div>
        <div><a href="" class="edit">Editer</a></div>
    </div>
    <div class="line">
        <div><p class="detail">Votre âge : <?= ($_SESSION['user'])->getAge() . ' ans' ?></p></div>
        <div><a href="" class="edit">Editer</a></div>
    </div>
    <div class="line">
        <a href="" class="deleteAccount">Supprimer votre compte</a>
    </div>
</div>