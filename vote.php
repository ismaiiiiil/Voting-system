<?php
// --------------------------recuperation les donner 9dam----------------------------------
// ila makanch id
if(!isset($_GET["id"]))
{
    header("Location:index.php");
}



if(isset($_GET["id"])) 
{
    $id = $_GET["id"];
    if(!is_numeric($id))
    {
        header("Location:index.php");
    }
        require("config.php");
        $query = "SELECT * from candidates
        JOIN categories on categories.catg_id=candidates.category
        where category=:id"; 
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$id)); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // ila kayn id fla base de donner
        if(count($data) == 0)
        {
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
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="#">Result</a>
        </nav>
    </header>
    
    <div class="clock"></div>

    <div id="container">
        <!-- clock -->


        <div class="sliders">
        <?php foreach($data as $candidate) : ?>
            <div class="cards">
                <!-- profile images -->
                <div class="profile">
                    <div class="images">
                        <img src="./public/uploads/<?php echo $candidate["candidate_image"]; ?>" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2><?php echo $candidate["firstname"];?></h2>
                    <p><?php echo $candidate["lastname"];?></p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>

        <?php endforeach; ?>  
            <!-- card no 1 -->
           
            <!-- duplicate card according to your need -->
        
        </div> 
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- owl carousel cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/flipclock.js"></script>
    <script>
        // $(document).ready(function(){
        //     $(".sliders").owlCarousel({
        //         loop: true,
        //         autoplay: true,
        //         autoplayTimeout: 3000,
        //         autoplayHoverPause: true
        //     });
        // })
        var clock = $('.clock').FlipClock({
            clockFace: 'TwelveHourClock'
        });
    </script>
</body>
</html>