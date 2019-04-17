<div class="container mt-5">
    <h1 class="text-center">Gestion des utilisateurs</h1>
    <button data-toggle="modal" data-target="#userModal" class="btn btn-success btn-sm mb-2 mt-5" data-toggle="modal" data-target="#cardModal"><i class="fas fa-plus mr-2"></i>Créer un utilisateur</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
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
                <td><?php echo getRoleLibelle($user['util_rol_num'])?></td>
                <td class="d-flex">
                    <?php if($user['util_rol_num'] != 3){ ?>
                    <a href="?do=removeUser/<?php echo $user['util_num']?>" class="rounded-circle bg-danger icon fas fa-trash text-light d-flex justify-content-center align-items-center mx-2"></a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>