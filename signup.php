<?php

    require_once "config.php";

    function checkEmail(){
        $email = trim($_POST['email']);
        $regex = "/^([a-zA-Z0-9\.\-]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        if(!preg_match($regex, $email)){
            echo "<h1 style='color: white;'>ERROR check email</h1>";
            return false;
        }
        /*echo "<h1 style='color: white;'>ERROR</h1>";*/
        return true;
    }
    function checkLastName(){
        $lastname = trim($_POST['lastname']);
        $regex  = "/^([a-zA-Z]+)$/";
        if(!preg_match($regex, $lastname)){
            echo "<h1 style='color: white;'>ERROR check last name</h1>";
            return false;
        }
        /*echo "<h1 style='color: white;'>ERROR</h1>";*/
        return true;
    }

    function checkFirstName(){
        $firstname = trim($_POST['lastname']);
        $regex  = "/^([a-zA-Z]+)$/";
        if(!preg_match($regex, $firstname)){
            echo "<h1 style='color: white;'>ERROR check first name</h1>";
            return false;
        }
        /*echo "<h1 style='color: white;'>ERROR</h1>";*/
        return true;
    }

    function verifyEmail($db){
        $email = trim($_POST['email']);
        $que = $db->prepare('SELECT * FROM users WHERE email = :email');
        $que->bindValue(":email", $email);
        $que->execute();
        $check = $que->fetch();
        if(!empty($check)){
           /* echo "<h1 style='color: white;'>done</h1>";*/
            return false;
        } 
        /*echo "<h1 style='color: white;'>ERROR</h1>";*/
        return true;
    }

    function confirmPassword(){
        if($_POST['password'] == $_POST['confirmpass']){
            /*echo "<h1 style='color: white;'>ERROR</h1>";*/
            return true;

        }
        /*echo "<h1 style='color: white;'>ERROR</h1>";*/
        return false; 
    }
    
    if(isset($_POST['submit'])){
        if((checkEmail() && confirmPassword() && verifyEmail($db) && checkLastName() && checkFirstName())){
            $lastname = trim($_POST['lastname']);
            $firstname = trim($_POST['firstname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $gender = $_POST['Gender'];
            $birth_day = $_POST['DateOfBirth'];
            try {
                $que = $db->prepare('CALL INSERT_USER(?, ?, ?, ?, ?, ?)');
                $res = $que->execute([$lastname, $firstname, $email, $password, $gender, $birth_day]);
                /*
                $que->bindValue(':lastname', $lastname);
                $que->bindValue(':firstname', $firstname);
                $que->bindValue(':email', $email);
                $que->bindValue(':password', $password);
                $que->bindValue(':email', $email);
                $que->bindValue(':gender', $gender); 
                $que->bindValue(':birth', $birth_day);
                $res = $que->execute();*/
                if($res){
                 ?> 

                <script> 
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Signed up successfully',
                    showConfirmButton: false,
                    timer: 1500
                  })
                </script>
                <?php
                }
            } 
            catch (PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    

    <title>Sign Up</title>

</head>

<body class="bg-black">
    <header class="row">
        <a class="col-2" href="#" >
            <div id="target">
            B<span class="hideit">est</span>O<span class="hideit">ne</span>
            </div></a>
        <nav class="col-9">
            <a id="aboutus" href="#">About Us</a>
            <a id="contact" href="#">Contact Us</a>
            <a id="Login" href="login.php">Sign In</a>
        </nav>
    </header>
    <div class="stars"></div>
    <div class="twinkling"></div>
    <main>
    <div class="container col-7 p-5">
    <form method="POST">
            <div class="row input-text"  id="fullname">
                <div class="col-md-6">
                    <label for="firstname" class="form-label">First name <span class="required-span">*</span></label><br>
                    <input type="text" class="from-control" id="firstname" name="firstname" placeholder="Enter firstname">
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label ">Last name <span class="required-span">*</span></label><br>
                    <input type="text" class="from-control" id="lastname" name="lastname" placeholder="Enter last name">
                </div>
            </div>
            <div class="row mt-4  input-text">
                <div class="col-md-6">
                    <label class="form-label" for="Email">Email Address<span class="required-span"> *</span></label><br>
                    <input type="email" class="from-control" maxlength="100"   id="Email" name="email" placeholder="Enter email address">
                </div>
            </div>
            <div class="row mt-4 input-text" id="password">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password <span class="required-span">*</span></label><br>
                    <input type="password" class="from-control" id="password" name="password" placeholder="Enter password">
                    <i class="far fa-eye-slash ico-password" data-password="#Password"></i>
                </div>
                <div class="col-md-6 ">
                    <label for="confirmpass" class="form-label ">Confirm Password <span class="required-span">*</span></label><br>
                    <input type="password" id="confirmpass" name="confirmpass" placeholder="Re-enter password">
                </div>
            </div>
            <div class="col-12 mt-4 passwordReqs">
                <label>Your password must have:</label>
                <div>
                    <i class="fas fa-times ico-validCheck"> </i>
                    <label>8-20 characters</label>
                </div>
                <div>
                    <i class="fas fa-times ico-validCheck"> </i>
                    <label>Upper and lowercase characters</label>
                </div>
                <div>
                    <i class="fas fa-times ico-validCheck"></i>
                    <label>At least one number or one special character</label>
                </div>
            </div>
            <div class="row mt-5 input-text">
                <div class="col-md-6 form-group">
                        <label class="form-label">Date of Birth </label><br>
                        <input id="datepicker"  type="text" onfocus="(this.type='date')" name="DateOfBirth" placeholder="Select date of birth">      
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="Gender">Gender</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4 form-check">
                            <input type="radio" class="form-check-input" id="genderFemale" value="female" name="Gender">
                                </div>
                                <div class="col-6">
                                    <label for="genderFemale">Female</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4 form-check">
                            <input type="radio" class="form-check-input" id="genderMale" value="male" name="Gender">
                                </div>
                                <div class="col-6 form-check">
                                    <label for="genderMale">Male</label>
                                </div>
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                    <input type="submit" class="col-6 btn" value="Sign Up" name="submit">
                    <p class="link-label text-center mt-2" id="hadaccount">Already have an account? <a id="signin" href="#">Sign in.</a></p>
            </div>
            

    </form>
    <footer class=" col-12 text-center">
        <p>Created by &copy Copyrights 2022</p>
    </footer>
</div>
</main>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<script>

Swal.fire({
                    
        icon: 'success',
        title: 'Signed up successfully',
});
</script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>