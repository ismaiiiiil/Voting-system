<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET["id"];
    if(is_numeric($id))
    {
        require("./config.php"); //bach itl3o erreur
        // ------------------- meth2 Injection - Prepared - Statments (fach tikono variable l'utilisateur entre chi $var)-----------------
        $query = "UPDATE candidates set votes=votes+1 where cand_id=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); // execute fkolchi

        $_SESSION['status'] = 'You have successfully voted';
        $_SESSION['status_code'] = 'success';
        header("Location:index.php");
    }

}
