<?php
include './../controller/UserControllers.php';

$data = new UserController();
$user=$data->getUser();
if(isset($_POST['submit'])){
    $data = new UserController();
    $data->updateUser();
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
                    Modifier Users
                </div>
                <hr>
                <div class="card-body">
                    <form method="POST">
                        <!-- hidden -->
                        <input type="hidden"  name="user_id" 
                            value="<?php echo $user->user_id;?>">
                        <div class="login-form">
                            <label for="firstname">Nom d'utilisateur</label>
                            <input type="text" name="firstname" id="login-id" placeholder="votre login"
                            value="<?php echo $user->firstname; ?>">
                        </div>
                        <div class="login-form">
                            <label for="lastname">Prénom d'utilisateur</label>
                            <input type="text" name="lastname" id="login-id" placeholder="votre prénom"
                            value="<?php echo $user->lastname; ?>">
                        </div>
                        <div class="login-form">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="login-id" placeholder="votre email"
                            value="<?php echo $user->email; ?>"
                            />
                        </div>
                        <div class="date-form">
                            <label for="birth_date">Date de Naissance</label>
                            <input type="date" name="birth_date" id="login-id" placeholder="votre date de naissance"
                            value="<?php echo $user->birth_date; ?>"
                            />
                        </div>
                        <div class="login-form">
                            <label for="">Gender</label>
                            <div class="radio">
                                <label class="">  
                                    <input type="radio" name="gender" value="male"
                                    <?php echo $user->gender === "male" ? "checked" : ""?> >
                                    <span> Male </span> 
                                </label>
                                <label class="r2"> 
                                    <input type="radio" name="gender" value="female"
                                    <?php echo $user->gender === "female" ? "checked" : ""?>
                                    >
                                    <span>Female </span>                  
                                </label>
                            </div>
                        </div>
                       
                        <div class="password-form">
                            <label for="user_password">Mot de passe</label>
                            <input type="password" name="user_password" id="password-id" placeholder="votre mot de passe"
                            value="<?php echo $user->user_password; ?>"
                            />
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="password-form">
                            <label for="user_password2">Confirm Mot de passe</label>
                            <input type="password" name="user_password2" id="password-id" placeholder="Confirm mot de passe"                            
                            />
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