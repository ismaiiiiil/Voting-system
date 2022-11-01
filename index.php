<?php 
      require("config.php");
  
      $query = "SELECT * FROM categories";
      $data = $db->query($query); // PDOStatment -- CURSEUR
      $data = $data->fetchAll(); // tatjib kolchi

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>

<body>
    <header class="header">
        <!-- <h1 href="#" class="logo"><i class="fa-solid fa-check-to-slot"></i>Voting</h1> -->
        <h1 href="#" class="logo">
            <img src="./assets/logo2.png" width="35px" height="35px" alt="">
            Voting
        </h1>


        <nav class="navbar">
            <a href="index.php">Home</a>
            <!-- <a href="vote.php">vote</a> -->
            <a href="result.php">result</a>
        </nav>

        <div class="icons">
            <a href="#" class="btn">Login</a>
            <a href="signup.sign.html" class="btn">Register</a>
            <div class="fas fa-user" id="login-btn"></div>
            <!-- Logout 
            <hr>
            <a href="#" class="btn">Logout</a>
            <div class="fa-solid fa-right-to-bracket" id="login-btn"></div> -->
        </div>

    </header>
    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
        <div class="content">
            <h3>Voting The best <span>¨Players</span> in The world</h3>
            <a href="#category" class="btn">Vote Now</a>
        </div>
    </section>

    <!-- categories section starts  -->
    
    <!-- categories V2 -->
    <h1  id="category" class="heading">Voting <span>categories</span></h1>

    <section class="container-card">
        <?php foreach($data as $category) : ?>

            <div class="card">
                <div class="imgBx">
                    <img src="./public/uploads/<?php echo $category["image"]; ?>" alt="">
                    <h1><?php  echo$category["catg_name"];?></h1>
                </div>
                <div class="content">
                    <a class="btn-vote" href="vote.php?id=<?php echo $category["catg_id"];?>">Voting Now</a>
                </div>
            </div>
        <?php endforeach; ?>

        
    </section>


    <!-- blogs section ends -->

    <!-------------Footer Section---------------------->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3><i class="fa-solid fa-check-to-slot"></i>Voting </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi corrupti possimus dolor molestiae.</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"><i class="fas fa-phone"></i>0694332279</a>
                <a href="#" class="links"><i class="fas fa-envelope"></i>ismail-rharraf@gmail.com</a>
                <a href="#" class="links"><i class="fas fa-map-marker-alt"></i>Morroco,Marrakech</a>
            </div>

            <div class="box">
                <h3>Quick links</h3>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Home</a>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Features</a>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Products</a>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Categories</a>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Review</a>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Blogs</a>
            </div>

        </div>
        <div class="credit">created by <span>Morad And Ismail</span></div>
    </section>


    <!----------------Scripts------------------------->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>