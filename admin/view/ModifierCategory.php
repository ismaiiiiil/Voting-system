<?php

include './../controller/CategoriesControllers.php';
$data = new CategoryController();
$category=$data->getCategory();
// var_dump($category);
if(isset($_POST['submit'])){
    $data = new CategoryController();
    $data->updateCategory();
// var_dump($data);

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
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
                    <i class="fa-solid fa-medal"></i>
                    Modifier Category
                </div>
                <hr>
                <div class="card-body">
                    <!-- -------- Form  ----------- -->
                    <form method="POST" enctype="multipart/form-data">
                        <!-- -------- hidden ------------- -->
                        <input type="hidden"  name="catg_id" 
                            value="<?php echo $category->catg_id;?>">
                            <!-- ila ma3tanach image -->
                        <input type="hidden"  name="image" 
                            value="<?php echo $category->image;?>">
                        <!-- ----------------- -->
                        <div class="login-form">
                            <label for="login">Nom de Category</label>
                            <input type="text" name="catg_name" id="login-id" placeholder="Nom de Category" 
                            value="<?php echo $category->catg_name ;?>"
                            >
                        </div>
                        
                        <div class="img-categ-form">
                            <img class="img" src="./../../public/uploads/<?php echo $category->image ;?>" alt="">
                        </div>
                        <div class="upload">
                            <button type="button" class="btn-warning">
                                <i class="fa fa-upload"></i> Upload Image
                                <input type="file" name="image"
                                    value="<?php echo $category->image ;?>"
                                >
                            </button>
                        </div>
                        <div class="date-form">
                            <label for="login">End Date de Category</label>
                            <div class="date-info">
                                <div class="date">
                                    <input type="date" name="end_date" id="login-id"
                                    value="<?php echo $category->end_date ;?>">
                                </div>
                                <div class="date">
                                    <span> H*</span><input type="number" min="1" max="24" name="h" placeholder="00"
                                    value="<?php echo $category->h ;?>">
                                </div>
                                <div class="date">
                                    <span> M*</span><input type="number" min="1" max="60" name="m" placeholder="00"
                                    value="<?php echo $category->m ;?>"> 
                                </div>
                                <div class="date">
                                    <span> S*</span><input type="number" min="1" max="60" name="s" placeholder="00"
                                    value="<?php echo $category->s ;?>"> 
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="card-footer">
                            <input type="submit" name="submit" class="btn btn-primary" id="button-id" value="Ajouter" ></input>
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