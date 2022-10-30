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
        $query = "SELECT candidates.firstname,candidates.lastname,candidates.candidate_image,candidates.votes , sum(candidates.votes) as sumvotes from candidates
        JOIN categories on categories.catg_id=candidates.category
        where category=:id
        
        group by candidates.firstname,candidates.lastname,candidates.candidate_image,candidates.votes"; 
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$id)); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// ------------
        $sum = "SELECT sum(votes) from candidates
                JOIN categories on categories.catg_id=candidates.category
                where category=:id"; 
        $stmt->execute(array(":id"=>$id)); 
        $sum_vote = 0;
        while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sum_vote += $row1['votes'];
        }
        
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
    <link rel="stylesheet" href="css/result.css">
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
            <a href="index.php">Home</a>
        </nav>
    </header>



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
                    <h2><?php echo $candidate["firstname"] .' '.$candidate["lastname"] ;?></h2>
                    <h4 class="text-danger"><?php echo $candidate["votes"]; ?></h4>

                </div>
                <?php
                    $sum = (int) $sum_vote;
                    $prog =$candidate["votes"]*100/$sum;
                    $intprog = (int) $prog;
                ?>
                <div class="progress-circle p<?php echo $intprog ?>">
                    <span><?php echo $intprog ?>%</span>
                    <div class="left-half-clipper">
                        <div class="first50-bar"></div>
                        <div class="value-bar"></div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>


        </div>


    </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- owl carousel cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>