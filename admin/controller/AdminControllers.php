<?php

session_start();
require   "./../database/DB.php";

class AdminController{
// ---------- select ----------------
    public function getAlladmins(){
        $query = "SELECT * FROM admin ORDER BY RAND()";
        $data = DB::connect()->query($query); 
        $admins = $data->fetchAll();
        return $admins;
    }
    public function newAdmin(){
        try{
            if(isset($_POST["submit"])) {
                $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
                $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));            
                $email = htmlspecialchars(strtolower(trim($_POST["email"])));            
                $admin_password = htmlspecialchars(strtolower(trim($_POST["admin_password"])));            
                $admin_password2 = htmlspecialchars(strtolower(trim($_POST["admin_password2"])));            
                if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($admin_password)&& !empty($admin_password2))
                {
                    if($admin_password == $admin_password2)
                    {
                        $query = "INSERT into admin values(NULL, :firstname, :lastname, :email, :admin_password)"; 
                        $stmt = DB::connect()->prepare($query);
                        $stmt->execute(array(
                                        ":firstname"=> $firstname,
                                        ":lastname"=> $lastname,
                                        ":email"=> $email,
                                        ":admin_password"=>$admin_password
                                    ));
                        $_SESSION['status'] = 'Admin est ajouter';
                        $_SESSION['status_code'] = 'success'; // info
                        header('location:gestionAdmin.php');
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
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function getAdmin(){
        if(isset($_GET['id'])){
            $id = $_GET["id"];
            if(is_numeric($id))
            {
                $query = "SELECT * from admin where admin_id=:id";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":id"=> $id)); // execute fkolchi
                $admin = $stmt->fetch(PDO::FETCH_OBJ);
                if($admin){
                    return $admin;
                }else{
                    $_SESSION['error'] = 'Admin n\'exist pas';
                    $_SESSION['status_code'] = 'error';
                    header('location:gestionAdmin.php');
                }

            }else{
                $_SESSION['error'] = 'Admin n\'exist pas';
                $_SESSION['status_code'] = 'error';
                header("Location:gestionAdmin.php");
            }
        }
    }

    public function updateAdmin(){
        try{
            if(isset($_POST["submit"])) {
                $admin_id = htmlspecialchars(strtolower(trim($_POST["admin_id"])));

                $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
                $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));            
                $email = htmlspecialchars(strtolower(trim($_POST["email"])));            
                $admin_password = htmlspecialchars(strtolower(trim($_POST["admin_password"])));            
                $admin_password2 = htmlspecialchars(strtolower(trim($_POST["admin_password2"])));                   
                if(!empty($firstname) && !empty($lastname)  && !empty($email) && !empty($admin_password)&& !empty($admin_password2))
                {
                    if($admin_password == $admin_password2)
                    {
                        $query = "UPDATE admin SET 
                        firstname=:firstname, 
                        lastname=:lastname,
                        email=:email,
                        admin_password=:admin_password
                        WHERE admin_id=:id"; 
                        $stmt = DB::connect()->prepare($query);
                        $stmt->execute(array(
                                        ":id"=>$admin_id,
                                        ":firstname"=> $firstname,
                                        ":lastname"=> $lastname,
                                        ":email"=> $email,
                                        ":admin_password"=>$admin_password
                                    ));
                        $_SESSION['status'] = 'Admin est modifier';
                        $_SESSION['status_code'] = 'success'; // info
                        header('location:gestionAdmin.php');
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