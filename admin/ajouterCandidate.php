<?php
include './CandidateControllers.php';
$data = new CandidateController();
$categories = $data->getAllcategories();
if($_SESSION['status_code'] = 'success'){
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
    <div class="container-all">
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
                    <!-- -------- Form  ----------- -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="login-form">
                            <label for="login">Nom de Candidate</label>
                            <input type="text" name="firstname" id="login-id" placeholder="votre login" >
                        </div>
                        <div class="login-form">
                            <label for="login">Prénom de Candidate</label>
                            <input type="text" name="lastname" id="login-id" placeholder="votre prénom"
                                >
                        </div>
                        
                        <div class="login-form">
                            <label for="login">Date de Naissance</label>
                            <input type="date" name="birth_date" id="login-id" placeholder="date de naissance"
                                >
                        </div>
                        <div class="upload">
                            <button type="button" class="btn-warning">
                                <i class="fa fa-upload"></i> Upload Image
                                <input type="file" name="candidate_image" id="password-id" placeholder="mot de passe">
                            </button>
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
   <?php include './include/scripts.php';  ?>
    
</body>

</html>