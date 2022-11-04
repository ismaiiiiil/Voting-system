<?php
// session_start();
include './../controller/CandidateControllers.php';
$data = new CandidateController();
$categories = $data->getAllcategories();
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

            <!-- -------- Card --------- -->
            <?php include('./../include/card.php') ?>


            <!-- ----- Table ------ -->
            <div class="table-categories">
                <!-- candidates result tabl -->
                <div class="categories-visiting">
                    <div class="heading">
                        <h2>Categories</h2>
                        <a href="./ajouterCategories.php" class="btn-view">Ajouter</a>
                    </div>
                    <table class="visiting">
                        <thead>
                            <td>Photo</td>
                            <td>Name Category</td>
                            <td>End Date</td>
                            <td>Detail</td>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>

                            <tr>
                                <td>
                                    <div class="img-categ-small">
                                        <img class="img" src="./../../public/uploads/<?php echo $category['image']; ?>"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $category['catg_name'] ; ?>
                                </td>
                                <td>
                                    <?php echo $category['end_date'] . ' '.$category['h'] . ' h : '. $category['m'] . ' m : '. $category['s'] . ' s'; ?>
                                </td>
                                    <!-- button -->
                                <td>
                                    <a onClick="return confirm('Are you sure you want to Modifier?')" type='button' href="ModifierCategory.php?id=<?php echo $category["catg_id"];?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a onClick="return confirm('Are you sure you want to delete?')" type='button' href="DeleteCategory.php?id=<?php echo $category["catg_id"];?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include './../include/scripts.php';  

    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
</body>

</html>