<?php

include './../controller/CandidateControllers.php';
$data = new CandidateController();
$categories = $data->getAllcategories();

$data = new CandidateController();
$candidate = $data->getCandidate();


if(isset($_POST['submit'])){
    $data = new CandidateController();
    $data->updateCandidate();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container-all">
        <!-- sidebar -->
        <?php include('./../include/sidebar.php') ?>
        <div class="main">
            <!-- NavBar -->
            <?php include('./../include/navbar.php') ?>
            <!-- formulaire -->
            <div class="card-user">
                <div class="card-header">
                    <i class="fa-solid fa-user-plus"></i>
                    Modifier Candidate
                </div>
                <hr>
                <div class="card-body">
                    <!-- -------- Form  ----------- -->
                    <form method="POST" enctype="multipart/form-data">
                        <!-- -------- hidden ------------- -->
                        <input type="hidden"  name="cand_id" 
                            value="<?php echo $candidate->cand_id;?>">
                            <!-- ila ma3tanach image -->
                        <input type="hidden"  name="candidate_image" 
                            value="<?php echo $candidate->candidate_image;?>">

                        <div class="login-form">
                            <label for="login">Nom de Candidate</label>
                            <input type="text" name="firstname" id="login-id" placeholder="votre login" 
                            value="<?php echo $candidate->firstname ;?>">
                        </div>
                        <div class="login-form">
                            <label for="login">Prénom de Candidate</label>
                            <input type="text" name="lastname" id="login-id" placeholder="votre prénom"
                            value="<?php echo $candidate->lastname ;?>">
                        </div>
                        
                        <div class="date-form">
                            <label for="login">Date de Naissance</label>
                            <input type="date" name="birth_date" id="login-id" placeholder="date de naissance"
                            value="<?php echo $candidate->birth_date ;?>">
                        </div>
                        <div class="login-form">
                            <img class="img" src="./../../public/uploads/<?php echo $candidate->candidate_image ;?>" alt="">
                        </div>
                        <div class="upload">
                            <button type="button" class="btn-warning">
                                <i class="fa fa-upload"></i> Upload Image
                                <input type="file" value="<?php echo $candidate->candidate_image ;?>" name="candidate_image" id="password-id" placeholder="mot de passe"
                                >
                            </button>
                        </div>
                        <div class="login-form">
                            <label for="category">Catégories*</label>
                            <select class=""  name="category" id="login-id">
                                <?php foreach($categories as $category) : ?>
                                    <option 
                                    <?php echo $candidate->category === $category["catg_id"] ? "selected" : "" ?>
                                    value="<?php echo $category["catg_id"];?>">
                                        <?php echo $category["catg_name"];?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-primary" id="button-id" value="Modifier" ></input>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>

   <?php include './../include/scripts.php';   ?>
    
</body>

</html>