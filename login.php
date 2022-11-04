<?php
    require_once "config.php";
    session_start();
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        header('location: index.php');
    }
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        try{
            $req = $db->prepare('SELECT * FROM users WHERE email= :email AND user_password= :password');
            $req->bindValue(':email', $email);
            $req->bindValue(':password', $password);
            $req->execute();
            $count_row = $req->rowCount();
            $data = $req->fetch();
            if($count_row ==1 && !empty($data)){
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['user_id'] = $data['user_id'];
                header('location: index.php');
            } else{
                echo "<h1 style='color:white'>This account doesn't exist or the password/email is incorrect</h1>";
            }
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    

    <title>Sign In</title>

</head>

<body class="bg-black">
    <header>
        <a href="#" >
            <div id="target">
            B<span class="hideit">est</span>O<span class="hideit">ne</span>
            </div></a>
        <nav>
            <a id="aboutus" href="#">About Us</a>
            <a id="contact" href="#">Contact Us</a>
            <a id="register" href="">Sign Up</a>
        </nav>
    </header>
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="container col-md-4">
    <form method="POST"  class="m-3 p-3">
                <div class="row input-text">
                    <label class="form-label" for="Email">Email Address</label><br>
                    <input type="email"  maxlength="100"  id="Email" name="email" placeholder="Enter email address">
                </div>
            
                <div class="row mt-5 input-text">
                    <label for="password" class="form-label">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                </div>
            <div class="row mt-5 justify-content-center">
                    <input type="submit" class="col-6 btn" value="Sign In" name="submit">
                    <p class="link-label text-center mt-3" id="newaccount">Create New Account. <a id="signup" href="signup.php">Sign Up</a></p>
            </div>
            
    </form>
    <footer class=" col-12 text-center">
        <p>&copy Copyrights 2022</p>
    </footer>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<script>

/*Swal.fire({
                    
        icon: 'success',
        title: 'Signed up successfully',
});*/
</script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>