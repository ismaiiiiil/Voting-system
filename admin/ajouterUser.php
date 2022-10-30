<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="title">The Best One</div>
                    </a>
                </li>
                <li>
                    <a href="admin.html">
                        <i class="fas fa-th-large"></i>
                        <div class="title">Admin</div>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fas fa-user-md"></i>
                        <div class="title">Users</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-puzzle-piece"></i>
                        <div class="title">Candidates</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="title">Result</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <div class="title">Settings</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        <div class="title">Help</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <!-- Bar -->
            <div class="top-bar">
                <div class="search">
                    <input type="text" name="search" placeholder="search here">
                    <label for="search"><i class="fas fa-search"></i></label>
                </div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="doctor1.png" alt="">
                </div>
            </div>
        
            <!-- formulaire -->
            <div class="card-user">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus"></i>
                    Ajouter Users
                </div>
                <hr>
                <div class="card-body">
                    <form>
                        <div class="alert d-none">
                            <h4>ERREUR !</h4>
                            <span class="close">&times;</span>
                            <p>votre login ou mot de passe est errone !</p>
                        </div>
                        <div class="login-form">
                            <label for="login">Nom d'utilisateur</label>
                            <input type="text" name="login" id="login-id" placeholder="votre login" required="required">
                            <span id="loginError"></span>
                        </div>
                        <div class="login-form">
                            <label for="login">Prénom d'utilisateur</label>
                            <input type="text" name="login" id="login-id" placeholder="votre prénom" required="required">
                            <span id="loginError"></span>
                        </div>
                        <div class="login-form">
                            <label for="login">Email</label>
                            <input type="text" name="login" id="login-id" placeholder="votre email" required="required">
                            <span id="loginError"></span>
                        </div>
                        <div class="login-form">
                            <label for="login">Date de Naissance</label>
                            <input type="text" name="login" id="login-id" placeholder="votre date de naissance" required="required">
                            <span id="loginError"></span>
                        </div>
                        <div class="password-form">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="pass" id="password-id" placeholder="votre mot de passe"
                                required="required">
                            <!-- <img src="./icones/eye-slash.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye"  id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                            <span id="passWordError"></span>
                        </div>
                        <div class="password-form">
                            <label for="password">Confirm Mot de passe</label>
                            <input type="password" name="pass" id="password-id" placeholder="Confirm mot de passe" required="required">
                            <!-- <img src="./icones/eye-slash.svg" alt="icone" class="eye" id="eye-id"> -->
                            <span class="eye" id="eye-id">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                            <span id="passWordError"></span>
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