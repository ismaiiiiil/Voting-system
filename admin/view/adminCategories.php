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
    <link rel="stylesheet" href="./../css/styles.css?v=<?php echo time(); ?>">
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

            <!-- ----- Table ------ -->
            <div class="table-categories">
                <!-- candidates result tabl -->
                <div class="categories-visiting">
                    <div class="heading">
                        <h2>Categories</h2>
                        <div class="form-group">
                            <input for="search" id="search"  type="text" placeholder="Search...">
                            <i class='bx bx-search icon' ></i>
                        </div>
                            <!-- <input class="search" for="search" id="search" placeholder="search..." type="text"> -->
                      
                        <a href="./ajouterCategories.php" class="btn-view">Ajouter</a>
                    </div>
                    <table id="table-data" class="visiting">
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
                                <td class='icon-catg'>
                                    <!-- <a onClick="return confirm('Are you sure you want to Modifier?')" type='button' href="ModifierCategory.php?id=<?php echo $category["catg_id"];?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a onClick="return confirm('Are you sure you want to delete?')" type='button' href="DeleteCategory.php?id=<?php echo $category["catg_id"];?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a> -->
                                    <!-- button update -->
                                    <a onClick="submitUpdateCategoryForm(<?php echo $category["catg_id"];?>)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form id='UpdateCategoryForm' method="POST" action="ModifierCategory.php" >
                                        <input type="hidden" id="catg_id" name="catg_id" />
                                    </form>
                                    <!-- button delete -->
                                    <a onClick="submitDeleteCategoryForm(<?php echo $category["catg_id"];?>)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <form id='DeleteCategoryForm' method="POST" action="DeleteCategory.php" >
                                        <input type="hidden" id="catg_id_del" name="catg_id" />
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>
    <script src='./../js/profile.js'></script>

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <?php include './../include/scripts.php';  

    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
    <script>
    $(document).ready(function() {
       $(document).ready(function(){
        $("#search").keyup(function(){
            var search = $(this).val();
            $.ajax({
                url:'actionCategories.php',
                method:'POST',
                data:{query:search},
                success:function(response){
                    $("#table-data").html(response);
                }
            });
        });
       });
        
    });
    // -------------------------------------
    function submitDeleteCategoryForm($id) {
        swal({
            title: "Are you sure you want deleted this Category?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#catg_id_del");
                const form = document.querySelector("#DeleteCategoryForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    function submitUpdateCategoryForm($id) {
        

        swal({
            title: "Are you sure you want updated this Category?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#catg_id");
                const form = document.querySelector("#UpdateCategoryForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }

</script>
</body>

</html>