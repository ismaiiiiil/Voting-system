<?php
session_start();
if(isset($_GET['id']) && isset($_GET['category'])){
    var_dump($_GET['category']);
    $id = $_GET["id"];
    $category = $_GET['category'];
    $user_id = $_SESSION['user_id'];
    if(is_numeric($id))
    {
        require("./config.php");
        $query = "UPDATE candidates set votes=votes+1 where cand_id=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=> $id)); 

        $query = "INSERT into voting(catg_id,user_id) VALUES(:catg_id,:user_id)";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
                            ":user_id"=> $user_id,
                            ":catg_id"=> $category
                        ));

        $_SESSION['status'] = 'You have successfully voted';
        $_SESSION['status_code'] = 'success';
        header("Location:index.php");
    }

}
