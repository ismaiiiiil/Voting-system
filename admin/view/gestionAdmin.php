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
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
                                    <td class="icon-admin">
                                        <!-- <a onClick="return confirm('Are you sure you want to Modifier?')" type='button' href="ModifierAdmin.php?id=<?php echo $admin['admin_id'];?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a onClick="return confirm('Are you sure you want to delete?')" type='button' href="DeleteAdmin.php?id=<?php echo $admin["admin_id"];?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a> -->
                                        <!-- <i class="far fa-eye"></i>
                                        <i class="far fa-edit"></i>
                                        <i class="far fa-trash-alt"></i> -->
                                        <a onClick="submitUpdateAdminForm(<?php echo $admin["admin_id"];?>)">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form id='UpdateAdminForm' method="POST" action="ModifierAdmin.php" >
                                            <input type="hidden" id="admin_id" name="admin_id" />
                                        </form>
                                        <!-- button delete -->
                                        <a onClick="submitDeleteAdminForm(<?php echo $admin["admin_id"];?>)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <form id='DeleteAdminForm' method="POST" action="DeleteAdmin.php" >
                                            <input type="hidden" id="admin_id_del" name="admin_id" />
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>
    <script src='./../js/profile.js'></script>
    <script>
         // -------------------------------------
    function submitDeleteAdminForm($id) {
        swal({
            title: "Are you sure you want deleted this Admin?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#admin_id_del");
                const form = document.querySelector("#DeleteAdminForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    function submitUpdateAdminForm($id) {
        

        swal({
            title: "Are you sure you want updated this Admin?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#admin_id");
                const form = document.querySelector("#UpdateAdminForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    </script>

    <?php include './../include/scripts.php';  

    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
    
</body>

</html>