<?php
include './../controller/AdminControllers.php';

if(isset($_POST['submit'])){
    $data = new AdminController();
    $data->newAdmin();
}

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
            <!-- formulaire -->
            <div class="card-user">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus"></i>
                    Ajouter Admin
                </div>
                <hr>
                <div class="card-body">
                    <form method="POST">
                        <div class="login-form">
                            <label for="firstname">Nom d'admin</label>
                            <input type="text" name="firstname" id="login-id" placeholder="votre login">
                        </div>
                        <div class="login-form">
                            <label for="lastname">Prénom d'admin</label>
                            <input type="text" name="lastname" id="login-id" placeholder="votre prénom"
                            >
                        </div>
                        <div class="login-form">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="login-id" placeholder="votre email">
                        </div>
                        <div class="password-form">
                            <label for="admin_password">Mot de passe</label>
                            <input type="password" name="admin_password" id="password-id" placeholder="votre mot de passe"
                            >
                            <!-- <img src="./icones/eye-slash.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="password-form">
                            <label for="admin_password2">Confirm Mot de passe</label>
                            <input type="password" name="admin_password2" id="password-id" placeholder="Confirm mot de passe"
                            >
                            <!-- <img src="./../img/icones/eye.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-primary" id="button-id" value="Ajouter" ></input>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>

    <?php include './../include/scripts.php';  ?>
    
</body>

</html>