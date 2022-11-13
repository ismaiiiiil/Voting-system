<?php
session_start();
if(isset($_POST['user_id'])){
    $id = $_POST["user_id"];
    if(is_numeric($id))
    {
        require("./../../config.php");         
        $query = "DELETE from users where user_id=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); // execute fkolchi

        $_SESSION['status'] = 'User est Supprimer';
        $_SESSION['status_code'] = 'success';
        header("Location:admin.php");
    }else{
        $_SESSION['status'] = 'User n\'exist pas ';
        $_SESSION['status_code'] = 'error';
        header("Location:admin.php");
    }
}
