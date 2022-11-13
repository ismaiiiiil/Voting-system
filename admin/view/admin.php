<?php
session_start();
require("./../../config.php");

$query = "SELECT * FROM candidates";
$data = $db->query($query); 
$candidates = $data->fetchAll(); 


$query = "SELECT * FROM users";
$data = $db->query($query); 
$users = $data->fetchAll(); 

$query = "SELECT * FROM categories";
$data = $db->query($query); 
$categories = $data->fetchAll(); 

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

            <!-- -------- Card --------- -->
            <?php include('./../include/card.php') ?>


            <!-- ----- Table ------ -->
            <div class="tables">
                <div class="last-appointments">
                    <!-- users -->
                    <div class="heading">
                        <h2>Users</h2>
                        <a href="./ajouterUser.php" class="btn-view">Ajouter</a>
                    </div>
                    <table class="appointments">
                        <thead>
                            <td>FullName</td>
                            <td>Email</td>
                            <td>Birth date</td>
                            <td>Actions</td>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                            <tr>
                                <td>
                                    <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
                                </td>
                                <td>
                                    <?php echo $user['email']; ?>
                                </td>
                                <td>
                                    <?php echo $user['birth_date'] ?>
                                </td>
                                <td class="icon">
                                    <!-- button update -->
                                    <a onClick="submitUpdateUserForm(<?php echo $user["user_id"];?>)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form id='UpdateUserForm' method="POST" action="ModifierUser.php" >
                                        <input type="hidden" id="user_id" name="user_id" />
                                    </form>
                                    <!-- button delete -->
                                    <a onClick="submitDeleteUserForm(<?php echo $user["user_id"];?>)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <form id='DeleteUserForm' method="POST" action="DeleteUser.php" >
                                        <input type="hidden" id="user_id_del" name="user_id" />
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- candidates result tabl -->
                <div class="doctor-visiting">
                    <div class="heading">
                        <h2>Candidates</h2>
                        <div class="filter">
                            <p>filtrer par category</p>
                            <div class="form-group">
                            <select name="fetchval" id="fetchval">
                                <option value="" disabled selected>Select Category</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['catg_id'] ?>">
                                    <?php echo $category['catg_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <i class='bx bx-search icon' ></i> -->
                            </div>
                            
                        </div>
                       
                        <a href="./ajouterCandidate.php" class="btn-view">Ajouter</a>
                    </div>
                    <table id="table-data" class="visiting">
                        <thead>
                            <td>Photo</td>
                            <td>FullName</td>
                            <td>Votes</td>
                            <td>Detail</td>
                        </thead>
                        <tbody>
                            <?php foreach ($candidates as $candidate) : ?>

                            <tr>
                                <td>
                                    <div class="img-box-small">
                                        <img class="img" src="./../../public/uploads/<?php echo $candidate['candidate_image']; ?>"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $candidate['firstname'] . ' ' . $candidate['lastname']; ?>
                                </td>
                                <td>
                                    <?php echo $candidate['votes']; ?>
                                </td>
                                    <!-- button -->
                                <td class="icon-cand">
                                    <!-- <a onClick="return confirm('Are you sure you want to Modifier?')" type='button' href="ModifierCandidate.php?id=<?php echo $candidate["cand_id"];?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a onClick="return confirm('Are you sure you want to delete?')" type='button' href="DeleteCandidate.php?id=<?php echo $candidate["cand_id"];?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a> -->
                                    <!-- button update -->
                                    <a onClick="submitUpdateCandidateForm(<?php echo $candidate["cand_id"];?>)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form id='UpdateCandidateForm' method="POST" action="ModifierCandidate.php" >
                                        <input type="hidden" id="cand_id" name="cand_id" />
                                    </form>
                                    <!-- button delete -->
                                    <a onClick="submitDeleteCandidateForm(<?php echo $candidate["cand_id"];?>)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <form id='DeleteCandidateForm' method="POST" action="DeleteCandidate.php" >
                                        <input type="hidden" id="cand_id_del" name="cand_id" />
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
    <script>
    $(document).ready(function() {
       $(document).ready(function(){
        $("#fetchval").on('change',function(){
            var value = $(this).val();
            // alert(value);
            $.ajax({
                url:'actionCandidate.php',
                method:'POST',
                data:'request='+ value,
                // data:{request:value},
                beforeSend:function(){
                    $("#table-data").html("<span class='load'>Loading ...</span>");
                },
                success:function(response){
                    $("#table-data").html(response);
                },
            });
        });
       }); 
    });

    // ----------------------
    function submitDeleteUserForm($id) {
        

        swal({
            title: "Are you sure you want deleted this user?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#user_id_del");
                const form = document.querySelector("#DeleteUserForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    function submitUpdateUserForm($id) {
        

        swal({
            title: "Are you sure you want updated this user?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#user_id");
                const form = document.querySelector("#UpdateUserForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    // -------------------------------------
    function submitDeleteCandidateForm($id) {
        swal({
            title: "Are you sure you want deleted this Candidate?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#cand_id_del");
                const form = document.querySelector("#DeleteCandidateForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
    function submitUpdateCandidateForm($id) {
        
        swal({
            title: "Are you sure you want updated this Candidate?",
            // text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#cand_id");
                const form = document.querySelector("#UpdateCandidateForm");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
</script>

<?php include './../include/scripts.php';  
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
</body>

</html>