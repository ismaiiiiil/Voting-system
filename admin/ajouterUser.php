<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container">
        <!-- sidebar -->
        <?php include('./include/sidebar.php') ?>
        <div class="main">
            <!-- NavBar -->
            <?php include('./include/navbar.php') ?>
            <!-- formulaire -->
            <div class="card-user">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus"></i>
                    Ajouter Users
                </div>
                <hr>
                <div class="card-body">
                    <form>
                        <div class="login-form">
                            <label for="login">Nom d'utilisateur</label>
                            <input type="text" name="login" id="login-id" placeholder="votre login" required="required">
                        </div>
                        <div class="login-form">
                            <label for="login">Prénom d'utilisateur</label>
                            <input type="text" name="login" id="login-id" placeholder="votre prénom"
                                required="required">
                        </div>
                        <div class="login-form">
                            <label for="login">Email</label>
                            <input type="text" name="login" id="login-id" placeholder="votre email" required="required">
                        </div>
                        <div class="login-form">
                            <label for="login">Date de Naissance</label>
                            <input type="text" name="login" id="login-id" placeholder="votre date de naissance"
                                required="required">
                        </div>
                        <div class="password-form">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="pass" id="password-id" placeholder="votre mot de passe"
                                required="required">
                            <!-- <img src="./icones/eye-slash.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="password-form">
                            <label for="password">Confirm Mot de passe</label>
                            <input type="password" name="pass" id="password-id" placeholder="Confirm mot de passe"
                                required="required">
                            <!-- <img src="./icones/eye-slash.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div type="submit" class="btn btn-primary" id="button-id">Ajouter</div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="./js/handleEye.js"></script>
</body>

</html>