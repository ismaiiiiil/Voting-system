<?php

session_start();
require   "./../database/DB.php";

class CategoryController{
    public function newCategory(){
        if(isset($_POST["submit"])) {
        
            $catg_name = htmlspecialchars(strtolower(trim($_POST["catg_name"])));
            $end_date = htmlspecialchars(strtolower(trim($_POST["end_date"])));            
            $h = htmlspecialchars(strtolower(trim($_POST["h"])));           
            $m = htmlspecialchars(strtolower(trim($_POST["m"])));          
            $s = htmlspecialchars(strtolower(trim($_POST["s"])));         
            if(!empty($catg_name) && !empty($end_date) && !empty($h)&& !empty($m)&& !empty($s) && !empty($_FILES["image"]["name"]) ) {
                $query = "INSERT into categories value(NULL,:catg_name,:image,:end_date,:h,:m,:s)";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(
                                ":catg_name"=> $catg_name ,
                                ":image"=>$this->uploadPhoto() ,
                                ":end_date"=> $end_date,
                                ":h"=>$h,
                                ":m"=>$m,
                                ":s"=>$s
                                        )); // execute fkolchi
    
                $_SESSION['status'] = 'Category est Ajouter';
                $_SESSION['status_code'] = 'success';
                header('Location: adminCategories.php');
    
    
            }else{
                $_SESSION['status'] = 'Tous les champs sont Obligatoire';
                $_SESSION['status_code'] = 'error'; // info
                // header('Location: ajouterCadidate.php');
            };
        }
    }
    public function getCategory(){
        if(isset($_GET['id'])){
            $id = $_GET["id"];
            if(is_numeric($id))
            {
                $query = "SELECT * from categories where catg_id=:id";
                $stmt = DB::connect()->prepare($query);
                $stmt->execute(array(":id"=> $id)); // execute fkolchi
                $categories = $stmt->fetch(PDO::FETCH_OBJ);
                if($categories){
                    return $categories;
                }else{
                    $_SESSION['error'] = 'Category N\'exist pas';
                    $_SESSION['status_code'] = 'error';
                    header('location:adminCategories.php');
                }

            }else{
                $_SESSION['error'] = 'Category N\'exist pas';
                $_SESSION['status_code'] = 'error';
                header("Location:adminCategories.php");
            }
        }
    }

    public function uploadPhoto($oldImage = null){
        $dir = "./../../public/uploads"; // dossier fin timchiw
        $time = time(); // heur
        $name = str_replace(' ','-',strtolower($_FILES["image"]["name"])); // espace => '-'  , name="image" ->"image" 
        $type = $_FILES["image"]["type"]; // png , jpg .. ?
        
        $ext = substr($name,strpos($name,'.')); // mnin i9d3 -> image.jpg -> (.jpg)
        $ext = str_replace('.','',$ext);  // (.jpg) => (jpg)
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name); // -,/. -> "" vide
        $imageName = $name. '-' .$time. '.' .$ext; // le nom finale image
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$dir."/".$imageName)){ // shemain/public/uploads/image-time.png
            return $imageName;
        } //ila mabdlch image tanjibo image l9dima
        return $oldImage;
    }
    public function updateCategory(){
        if(isset($_POST["submit"])) {
    
            // la valeur li jaya mn form
            $catg_id = htmlspecialchars(strtolower(trim($_POST["catg_id"])));
            $catg_name = htmlspecialchars(strtolower(trim($_POST["catg_name"])));
            $end_date = htmlspecialchars(strtolower(trim($_POST["end_date"])));  
            $h = htmlspecialchars(strtolower(trim($_POST["h"])));            
            $m = htmlspecialchars(strtolower(trim($_POST["m"])));           
            $s = htmlspecialchars(strtolower(trim($_POST["s"])));  
            // ila makanch erreur
            if(!empty($catg_id) && !empty($catg_name) && !empty($end_date)&& !empty($h)&& !empty($m)&& !empty($s) && !empty($_FILES["image"]["name"]) ) {
                $query = "UPDATE categories set
                catg_name=:catg_name,
                end_date=:end_date,
                image=:image,
                h=:h,
                m=:m,
                s=:s
                WHERE catg_id=:catg_id
                ";
                
                $oldImage= $_POST["image"];
                $stmt = DB::connect()->prepare($query);

                $stmt->execute(array(
                                ":catg_id"=> $catg_id ,
                                ":catg_name"=> $catg_name ,
                                ":end_date"=> $end_date,
                                ":image"=>$this->uploadPhoto($oldImage),
                                ":h"=>$h,
                                ":m"=>$m,
                                ":s"=>$s
                                        ));
                $_SESSION['status'] = 'Category est Modifier';
                $_SESSION['status_code'] = 'success';
                header('Location: adminCategories.php');
            }else{
                $_SESSION['status'] = 'Tous les champs sont Obligatoire';
                $_SESSION['status_code'] = 'error'; 
            };   
        }
    }

    





}