<h1>Liste des utilisateurs</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Age</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody> <?php
        foreach($data['users_list'] as $user) {
            /* @var User $user  */?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getFirstname() ?></td>
                <td><?= $user->getLastname() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getAge() . ' ans' ?></td>
                <td>
                    <a href="/index.php?c=user&a=edit-user&id=<?= $user->getId() ?>">Editer</a>
                </td>
                <td>
                    <a href="/index.php?c=user&a=delete-user&id=<?= $user->getId() ?>">Supprimer</a>
                </td>
            </tr> <?php
        } ?>
    </tbody>
</table>
