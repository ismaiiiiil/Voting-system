<?php
// session_start();
require   "./DB.php";

class CandidateController{
// ---------- select ----------------
    public function getAllcategories(){
        $query = "SELECT * FROM categories";
        $data = DB::connect()->query($query); 
        $categories = $data->fetchAll();
        return $categories;
    }


// -------- donner form----------
public function newCandidate(){
    if(isset($_POST["firstname"])) {

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

}
$data = new CandidateController();
$categories = $data->getAllcategories();
if(isset($_POST['submit'])){
    $data = new CandidateController();
    $data->newCandidate();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container">
        <!-- sidebar -->
        <?php include('./include/sidebar.php') ?>
        <div class="main">
            <!-- NavBar -->
            <?php include('./include/navbar.php') ?>
            <!-- formulaire -->
            <div class="card-user">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus"></i>
                    Ajouter Candidate
                </div>
                <hr>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="login-form">
                            <label for="login">Nom de Candidate</label>
                            <input type="text" name="firstname" id="login-id" placeholder="votre login" required="required">
                        </div>
                        <div class="login-form">
                            <label for="login">Prénom de Candidate</label>
                            <input type="text" name="lastname" id="login-id" placeholder="votre prénom"
                                required="required">
                        </div>
                        
                        <div class="login-form">
                            <label for="login">Date de Naissance</label>
                            <input type="date" name="birth_date" id="login-id" placeholder="date de naissance"
                                required="required">
                        </div>
                        <div class="login-form">
                            <label for="password">Image de Candidate</label>
                            <input type="file" name="candidate_image" id="password-id" placeholder="mot de passe"
                                required="required">
                        </div>
                        <div class="login-form">
                            <label for="category">Catégories*</label>
                            <select class=""  name="category" id="login-id">
                                <?php foreach($categories as $category) : ?>
                                    <option value="<?php echo $category["catg_id"];?>">
                                        <?php echo $category["catg_name"];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-primary" id="button-id" value="Ajouter" ></input>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>