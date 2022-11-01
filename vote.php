<?php
// --------------------------recuperation les donner 9dam----------------------------------
// ila makanch id
if (!isset($_GET["id"])) {
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

    // ila kayn id fla base de donner
    if (count($data) == 0) {
        header("Location:index.php");
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
</head>


<body>
    <header class="header">
        <!-- <h1 href="#" class="logo"><i class="fa-solid fa-check-to-slot"></i>Voting</h1> -->
        <h3 href="#" class="logo">
            <img src="./assets/logo2.png" width="35px" height="35px" alt="">
            Voting
        </h3>
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="result.php?id=<?php echo $id; ?>">Result</a>
        </nav>
    </header>



    <div id="container">
        <!-- clock -->
        <div class="clock"></div>



        <!--<div class="sliders">
            <?php //foreach ($data as $candidate) : ?>
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="./public/uploads/<?php echo $candidate["candidate_image"]; ?>" alt="">
                    </div>
                </div>
                <div class="info">
                    <h2><?php echo $candidate["firstname"].' ' . $candidate["lastname"]; ; ?></h2>
                </div>
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div> -->

            <?php //endforeach; ?>
            <!-- card no 1 -->

            <!-- duplicate card according to your need -->

        <!-- </div> -->


        <!-- version v2 -->
        <div class="wrapper">
            <?php foreach ($data as $candidate) : ?>

            <div class="card" >
                <div class="content">
                <div class="img"><img src="./public/uploads/<?php echo $candidate["candidate_image"]; ?>" alt=""></div>
                <div class="details">
                    <span class="name"><?php echo $candidate["firstname"].' ' . $candidate["lastname"]; ; ?></span>
                    <p>Frontend Developer</p>
                </div>
                </div>
                <a href="addVote.php?id=<?php echo $candidate["cand_id"] ?>">Vote Now</a>
            </div>      
            <?php endforeach; ?>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- owl carousel cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/flipclock.js"></script>
    <script>
    var clock = $('.clock').FlipClock({
        clockFace: 'TwelveHourClock'
    });
    </script>
</body>

</html>