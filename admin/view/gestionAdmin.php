<?php
// session_start();
include './../controller/AdminControllers.php';
$data = new AdminController();
$admines = $data->getAlladmins();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container-all">
        <!-- sidebar -->
        <?php include('./../include/sidebar.php') ?>
        <div class="main">
            <!-- NavBar -->
            <?php include('./../include/navbar.php') ?>

            <!-- ----- Table ------ -->

                <div class="table-admines">
                    <!-- admins -->
                    <div class="admins-visiting">
                        <div class="heading">
                            <h2>Admins</h2>
                            <a href="./ajouterAdmin.php" class="btn-view">Ajouter</a>
                        </div>
                        <table class="visiting">
                            <thead>
                                <td>fullname</td>
                                <td>Email</td>
                                <td>Mot de passe</td>
                                <td>Actions</td>
                            </thead>
                            <tbody>
                                <?php foreach ($admines as $admin) : ?>
                                <tr>
                                    <td>
                                        <?php echo $admin['firstname'] . " ".$admin['lastname']; ?>
                                    </td>
                                    <td>                             
                                        <?php echo $admin['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $admin['admin_password'] ?>
                                    </td>
                                    <td class="icon">
                                        <a onClick="return confirm('Are you sure you want to Modifier?')" type='button' href="ModifierAdmin.php?id=<?php echo $admin['admin_id'];?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a onClick="return confirm('Are you sure you want to delete?')" type='button' href="DeleteAdmin.php?id=<?php echo $admin["admin_id"];?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <!-- <i class="far fa-eye"></i>
                                        <i class="far fa-edit"></i>
                                        <i class="far fa-trash-alt"></i> -->
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    <?php include './../include/scripts.php';  

    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
</body>

</html>