<?php
session_start();
if(isset($_POST['id_feedback'])){
    $id = $_POST["id_feedback"];
    if(is_numeric($id))
    {
        require("./../../config.php");         
        $query = "DELETE from feedback where id_feedback=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); // execute fkolchi

        $_SESSION['status'] = 'Feedback est Supprimer';
        $_SESSION['status_code'] = 'success';
        header("Location:feedback.php");
    }else{
        $_SESSION['status'] = 'Feedback n\'exist pas ';
        $_SESSION['status_code'] = 'error';
        header("Location:feedback.php");
    }
}
