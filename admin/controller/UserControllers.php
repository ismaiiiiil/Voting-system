<?php

session_start();
require   "./../database/DB.php";

class UserController{
    public function newUser(){
        try{
            if(isset($_POST["submit"])) {
                $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
                $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));            
                $birth_date = htmlspecialchars(strtolower(trim($_POST["birth_date"])));            
                $email = htmlspecialchars(strtolower(trim($_POST["email"])));            
                $user_password = htmlspecialchars(strtolower(trim($_POST["user_password"])));            
                $user_password2 = htmlspecialchars(strtolower(trim($_POST["user_password2"])));            
                if(!empty($firstname) && !empty($lastname) && !empty($birth_date) && !empty($email) && !empty($user_password)&& !empty($user_password2))
                {
                    if($user_password == $user_password2)
                    {
                        $query = "INSERT into users values(NULL, :firstname, :lastname, :birth_date,:email, :user_password)"; 
                        $stmt = DB::connect()->prepare($query);
                        $stmt->execute(array(
                                        ":firstname"=> $firstname,
                                        ":lastname"=> $lastname,
                                        ":birth_date"=> $birth_date,
                                        ":email"=> $email,
                                        ":user_password"=>$user_password
                                    ));
                        $_SESSION['status'] = 'User est ajouter';
                        $_SESSION['status_code'] = 'success'; // info
                        header('location:admin.php');
                    }
                    else{
                        $_SESSION['status'] = 'Les deux mot de passe sont différent';
                        $_SESSION['status_code'] = 'error'; // info
                    }
                }else{
                    $_SESSION['status'] = 'Tous les champs sont Obligatoire';
                    $_SESSION['status_code'] = 'error'; 
                }
            }
        } catch (PDOException $e){
            echo "console.log( 'ERROR: ' . $e->getMessage())";
        }
    }

    public function getUser(){
        if(isset($_GET['id'])){
            $id = $_GET["id"];
            if(is_numeric($id))
            {
                $query = "SELECT * from users where user_id=:id";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":id"=> $id)); // execute fkolchi
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if($user){
                    return $user;
                }else{
                    $_SESSION['error'] = 'User n\'exist pas';
                    $_SESSION['status_code'] = 'error';
                    header('location:admin.php');
                }

            }else{
                $_SESSION['error'] = 'User n\'exist pas';
                $_SESSION['status_code'] = 'error';
                header("Location:admin.php");
            }
        }
    }

    public function updateUser(){
        try{
            if(isset($_POST["submit"])) {
                $user_id = htmlspecialchars(strtolower(trim($_POST["user_id"])));

                $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
                $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));            
                $birth_date = htmlspecialchars(strtolower(trim($_POST["birth_date"])));            
                $email = htmlspecialchars(strtolower(trim($_POST["email"])));            
                $user_password = htmlspecialchars(strtolower(trim($_POST["user_password"])));            
                $user_password2 = htmlspecialchars(strtolower(trim($_POST["user_password2"])));            
                if(!empty($firstname) && !empty($lastname) && !empty($birth_date) && !empty($email) && !empty($user_password)&& !empty($user_password2))
                {
                    if($user_password == $user_password2)
                    {
                        $query = "UPDATE users SET 
                        firstname=:firstname, 
                        lastname=:lastname,
                        birth_date=:birth_date,
                        email=:email,
                        user_password=:user_password
                        WHERE user_id=:id"; 
                        $stmt = DB::connect()->prepare($query);
                        $stmt->execute(array(
                                        ":id"=>$user_id,
                                        ":firstname"=> $firstname,
                                        ":lastname"=> $lastname,
                                        ":birth_date"=> $birth_date,
                                        ":email"=> $email,
                                        ":user_password"=>$user_password
                                    ));
                        $_SESSION['status'] = 'User est modifier';
                        $_SESSION['status_code'] = 'success'; // info
                        header('location:admin.php');
                    }
                    else{
                        $_SESSION['status'] = 'Les deux mot de passe sont différent';
                        $_SESSION['status_code'] = 'error'; // info
                    }
                }else{
                    $_SESSION['status'] = 'Tous les champs sont Obligatoire';
                    $_SESSION['status_code'] = 'error'; 
                }
            }
        } catch (PDOException $e){
            echo "console.log( 'ERROR: ' . $e->getMessage())";
        }
    }
}   