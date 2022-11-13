<?php
session_start();
if(isset($_POST['admin_id'])){
    $id = $_POST["admin_id"];
    if(is_numeric($id))
    {
        require("./../../config.php");         
        $query = "DELETE from admin where admin_id=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); // execute fkolchi

        $_SESSION['status'] = 'Admin est Supprimer';
        $_SESSION['status_code'] = 'success';
        header("Location:GestionAdmin.php");
    }else{
        $_SESSION['status'] = 'Admin n\'exist pas ';
        $_SESSION['status_code'] = 'error';
        header("Location:GestionAdmin.php");
    }
}
