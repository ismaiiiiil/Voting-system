<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET["id"];
    if(is_numeric($id))
    {
        require("./../../config.php"); //bach itl3o erreur
        // ------------------- meth2 Injection - Prepared - Statments (fach tikono variable l'utilisateur entre chi $var)-----------------
        $query = "DELETE from candidates where category=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id));
        
        $query = "DELETE from categories where catg_id=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); // execute fkolchi

        $_SESSION['status'] = 'Category est Supprimer';
        $_SESSION['status_code'] = 'success';
        header("Location:adminCategories.php");
    }

}
