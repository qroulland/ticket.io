<div class="container mt-5">
    <h1 class="text-center">Gestion des utilisateurs</h1>
    <button class="btn btn-success btn-sm mb-2 mt-5" data-toggle="modal" data-target="#cardModal">Créer un utilisateur</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user){ ?>
            <tr>
                <th scope="row"><?php echo $user['util_num']?></th>
                <td><?php echo $user['util_nom']?></td>
                <td><?php echo $user['util_prenom']?></td>
                <td><?php echo $user['util_login']?></td>
                <td><?php echo $user['util_mail']?></td>
                <td>
                    <button class="rounded-circle bg-warning icon fas fa-edit text-light mx-2"></button>
                    <button class="rounded-circle bg-danger icon fas fa-trash text-light mx-2"></button>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>