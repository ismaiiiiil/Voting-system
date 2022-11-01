<?php

session_start();
require   "./DB.php";

class CandidateController{
// ---------- select ----------------
    public function getAllcategories(){
        $query = "SELECT * FROM categories";
        $data = DB::connect()->query($query); 
        $categories = $data->fetchAll();
        return $categories;
    }

    public function getCandidate(){
        if(isset($_GET['id'])){
            $id = $_GET["id"];
            if(is_numeric($id))
            {
                $query = "SELECT * from candidates where cand_id=:id";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":id"=> $id)); // execute fkolchi
                $candidate = $stmt->fetch(PDO::FETCH_OBJ);
                if($candidate){
                    return $candidate;
                }else{
                    $_SESSION['error'] = 'Candidate N\'exist pas';
                    $_SESSION['status_code'] = 'error';
                    header('location:admin.php');
                }

            }else{
                $_SESSION['error'] = 'Candidate N\'exist pas';
                $_SESSION['status_code'] = 'error';
                header("Location:admin.php");
            }
        }
    }


// -------- donner form----------
public function newCandidate(){
    if(isset($_POST["submit"])) {
        
        // la valeur li jaya mn form
        $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
        $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));
        $birth_date = htmlspecialchars(strtolower(trim($_POST["birth_date"])));
        // $candidate_image = $_POST["candidate_image"];
        $category = htmlspecialchars(strtolower(trim($_POST["category"])));
        // ila makanch erreur
        if(!empty($firstname) && !empty($lastname) && !empty($birth_date) && !empty($category) && !empty($_FILES["candidate_image"]["name"]) ) {
            $query = "INSERT into candidates value(NULL,:firstname,:lastname,:birth_date,:candidate_image,:category,NULL)";
            
            
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(
                            ":firstname"=> $firstname ,
                            ":lastname"=> $lastname,
                            ":birth_date"=> $birth_date,
                            ":candidate_image"=>$this->uploadPhoto() ,
                            ":category"=> $category,
                                    )); // execute fkolchi

            $_SESSION['status'] = 'Candidate Profile est Ajouter';
            $_SESSION['status_code'] = 'success';
            header('Location: admin.php');


        }else{
            $_SESSION['status'] = 'Tous les champs sont Obligatoire';
            $_SESSION['status_code'] = 'error'; // info
            // header('Location: ajouterCadidate.php');


        };
        // echo var_dump($stmt);
    }
}
public function uploadPhoto($oldImage = null){
    $dir = "../public/uploads"; // dossier fin timchiw
    $time = time(); // heur
    $name = str_replace(' ','-',strtolower($_FILES["candidate_image"]["name"])); // espace => '-'  , name="image" ->"image" 
    $type = $_FILES["candidate_image"]["type"]; // png , jpg .. ?
    
    $ext = substr($name,strpos($name,'.')); // mnin i9d3 -> image.jpg -> (.jpg)
    $ext = str_replace('.','',$ext);  // (.jpg) => (jpg)
    $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name); // -,/. -> "" vide
    $imageName = $name. '-' .$time. '.' .$ext; // le nom finale image
    if(move_uploaded_file($_FILES["candidate_image"]["tmp_name"],$dir."/".$imageName)){ // shemain/public/uploads/image-time.png
        return $imageName;
    } //ila mabdlch image tanjibo image l9dima
    return $oldImage;
}
public function updateCandidate(){
    if(isset($_POST["submit"])) {

        // la valeur li jaya mn form
        $firstname = htmlspecialchars(strtolower(trim($_POST["firstname"])));
        $lastname = htmlspecialchars(strtolower(trim($_POST["lastname"])));
        $birth_date = htmlspecialchars(strtolower(trim($_POST["birth_date"])));
        // $candidate_image = $_POST["candidate_image"];
        $category = htmlspecialchars(strtolower(trim($_POST["category"])));
        $cand_id = htmlspecialchars(strtolower(trim($_POST["cand_id"])));
        
        // ila makanch erreur
        if(!empty($firstname) && !empty($lastname) && !empty($birth_date) && !empty($category) && !empty($_FILES["candidate_image"]["name"]) ) {
            $query = "UPDATE candidates set
            firstname=:firstname,
            lastname=:lastname,
            birth_date=:birth_date,
            candidate_image=:candidate_image,
            category=:category
            WHERE cand_id=:cand_id
            ";
            
            $oldImage= $_POST["candidate_image"];
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(
                            ":cand_id"=> $cand_id ,
                            ":firstname"=> $firstname ,
                            ":lastname"=> $lastname,
                            ":birth_date"=> $birth_date,
                            ":candidate_image"=>$this->uploadPhoto($oldImage) ,
                            ":category"=> $category,
                                    )); // execute fkolchi

            $_SESSION['status'] = 'Candidate Profile est Modifier';
            $_SESSION['status_code'] = 'success';
            header('Location: admin.php');


        }else{
            $_SESSION['status'] = 'Tous les champs sont Obligatoire';
            $_SESSION['status_code'] = 'error'; // info
            // header('Location: ajouterCadidate.php');


        };
        // echo var_dump($stmt);
    }
}
}
