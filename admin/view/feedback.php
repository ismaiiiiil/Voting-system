<?php
session_start();

   
include_once './../../config.php';
$query='SELECT * FROM feedback JOIN users on users.user_id=feedback.user_id';
$data = $db->query($query); // PDOStatment -- CURSEUR
$feedbackes = $data->fetchAll(); // tatjib kolchi
// echo var_dump($feedbackes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/feedback.css?v=<?php echo time(); ?>">
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
            <!-- result -->
            <div class="wrapper">

            
                <?PHP
                foreach($feedbackes as $feedback): ?>
                <div class="card" >
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>  <span><?php echo $feedback['stars'];?></span>
                        </div>
                        <div class="details">
                            <span class="name">
                            <?php echo $feedback['firstname'] . " " . $feedback['lastname'];?>
                            </span>
                            <?php if(strlen($feedback['description']) > 60){ ?>
                            <p> 
                                <?php echo substr( $feedback['description'],1,60 );?> ....
                            </p>
                            <?php }else{ ?>
                                <p>
                                <?php echo $feedback['description'];?> 
                                </p>
                           <?php } ?>
                            
                        </div>
                      <div class='info'>
                        <div class="btn-delete">
                            <a onClick="submitForm(<?php echo $feedback["id_feedback"];?>)">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            <form id='form' method="POST" action="deleteFeedback.php" >
                                <input type="hidden" id="id_feedback" name="id_feedback" />
                            </form>
                        </div>
                        <div class="date">
                                <p class='content'>
                                <?php echo $feedback['datetime'] ;?>
                                </p> 
                        </div>
                      </div>
                        
                    </div>
                </div>
                <?PHP endforeach ; ?>
            </div>
            
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>
    <script src='./../js/profile.js'></script>

    <script>
    function submitForm($id) {
        swal({
            title: "Are you sure you want deleted?",
            text: "This form will be submitted",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then(function (isOkay) {
            if (isOkay) {
                const input = document.querySelector("#id_feedback");
                const form = document.querySelector("#form");
                input.value=$id;
                form.submit();
            }
        });
        return false;
    }
</script>
<?php

include './../include/scripts.php';  
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
?>
    
</body>

</html>