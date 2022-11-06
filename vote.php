<?php
// --------------------------recuperation les donner 9dam----------------------------------
session_start();

// ila makanch id
if (!isset($_GET["id"])) {
    header("Location:index.php");
}

if (!isset($_SESSION["user_id"])) {
    $_SESSION['status'] = 'Il faut connecter avant de voter';
    $_SESSION['status_code'] = 'info';
    header("Location:index.php");
}



if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (!is_numeric($id)) {
        header("Location:index.php");
    }
    require("config.php");
    $query = "SELECT * from candidates
        JOIN categories on categories.catg_id=candidates.category
        where category=:id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(":id" => $id));
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($data);

    // ila kayn id fla base de donner
    if (count($data) == 0) {
        $_SESSION['status'] = 'Désolé Category est vide en ce moment';
        $_SESSION['status_code'] = 'info';
        header("Location:index.php");
    }

    $stmt2 = $db->prepare('SELECT * from categories 
                        where catg_id=:id');
    $stmt2->execute(array(":id"=>$id)); 
    while($res = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $date = $res['end_date'];
        $h = $res['h'];
        $m = $res['m'];
        $s = $res['s'];
    }
    // $query = $db->prepare('SELECT * from voting where catg_id=:id');
    // $query->execute(array(":id"=>$id)); 
    // $exit = 0;
    // while($voting = $query->fetch(PDO::FETCH_ASSOC)) {
    //         if($voting['user_id']===$_SESSION['user_id'] && $voting['catg_id']===$id):
    //             $exit = 1;
    //         endif;
    // }
    $stmt1 = $db->prepare('SELECT * from voting 
                            JOIN users on voting.user_id=users.user_id
                            JOIN categories on voting.catg_id=categories.catg_id
                        where voting.user_id=:user_id and  voting.catg_id=:catg_id
                        ');
    $stmt1->execute(array(
                    ":user_id"=>$_SESSION["user_id"],
                    ":catg_id"=>$id
                ));
    $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    // $exit = 0;
    $Voted =false;
    if(count($data1) >0){
        // $_SESSION['status'] = 'Tu as déja voter dans cette categorie';
        // $_SESSION['status_code'] = 'info';
        // header("Location:index.php");
        $Voted = true;
    }



}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page voting</title>
    <link rel="stylesheet" href="css/vote.css">
    <!-- owl caousel cdn ( css )-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>


<body>
    <header class="header">
        
        <!-- <h1 href="#" class="logo"><i class="fa-solid fa-check-to-slot"></i>Voting</h1> -->
        <h3 href="#" class="logo">
            <img src="./assets/voted-icone.png" width="50px" height="50px" alt="">
            Voting
        </h3>
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="result.php?id=<?php echo $id; ?>">Result</a>
        </nav>
    </header>



    <div id="container">
        <!-- clock -->
        <div id="clock">
            <h1 class="time" id="time"></h1>
            
        </div>
        
        <!-- version v2 -->
        <div class="wrapper">
            <?php foreach ($data as $candidate) : ?>

            <div class="card" >
                <div class="content">
                <div class="img"><img src="./public/uploads/<?php echo $candidate["candidate_image"]; ?>" alt=""></div>
                <div class="details">
                    <span class="name"><?php echo $candidate["firstname"].' ' . $candidate["lastname"]; ; ?></span>
                    <p><?php echo $candidate["catg_name"] ;?></p>
                </div>
                </div>
                <?php
                    $countDownDate = (int) strtotime("$date $h:$m:$s" )* 1000;
                    $now =(int) time() *1000;
                    $distance = $countDownDate - $now;
                ?>

                <?php
                if($distance >= 0 ){
                    if($Voted === false ) {?>
                        <a href="addVote.php?id=<?php echo $candidate["cand_id"]; ?>&category=<?php echo $candidate["category"]; ?>">Vote Now</a>
                    <?php }else{ ?>
                        <h1 class='interdi'>
                            <!-- <i class="fa-solid fa-check"></i>  -->
                            <img src="assets/interdi-icone.png" width="30" alt="">
                            Not allowed
                        </h1>
                <?php 
                    }
                }
                ?>
                
            </div>      
            <?php endforeach; ?>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- owl carousel cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <!-- ----------- clock ------------ -->    
    <script>
    var countDownDate = <?php echo strtotime("$date $h:$m:$s" ) ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {
    now = now + 1000;
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    // --------------------
    document.getElementById("time").innerHTML = days + "d " + hours + "h : " +
    minutes + "m : " + seconds + "s ";
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "EXPIRED";
    }
    }, 1000);

    </script>
</body>

</html>