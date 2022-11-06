<?php 
    session_start();

    require("config.php");
    $query = "SELECT * FROM categories";
    $data = $db->query($query); // PDOStatment -- CURSEUR
    $data = $data->fetchAll(); // tatjib kolchi

    if(!empty($_SESSION['user_id'])){
    $stmt1 = $db->prepare('SELECT voting.catg_id from voting 
                            JOIN users on voting.user_id=users.user_id
                            JOIN categories on voting.catg_id=categories.catg_id
                            where voting.user_id=:user_id 
                        ');
    $stmt1->execute(array(
                    ":user_id"=>$_SESSION["user_id"]
                ));
            
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $res=array();
    for( $i=0; $i < count($result); $i++) {
        array_push($res,  $result[$i]['catg_id']);
    }
    }
    // var_dump($res);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script
      src="https://kit.fontawesome.com/5c565df8e2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>

<body>
    <!-- <header class="header">
        <h1 href="#" class="logo">
            <img src="./assets/logo2.png" width="35px" height="35px" alt="">
            Voting
        </h1>


        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="#footer">contact</a>
            <a href="#category">categories</a>
        </nav>

        <div class="icons">
            <?php if( !isset($_SESSION['user_id'])){  ?>
            <a href="signup.php" class="btn">login</a>
            <?php }else{  ?>
            <hr>
            <a href="./logout.php" class="btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php } ?>

        </div>

    </header> -->
    <!-- header section ends -->

    <!-- home section starts  -->

    <!-- <section class="home" id="home">
        <div class="content">
            <h3>Globe Soccer Award <span>2022</span>.</h3>
            <h3>VOTE FOR YOUR FAVOURITES .</h3>
            <a href="#category" class="btn">Vote Now</a>
        </div>
    </section> -->
    <!-- ------------------- Version 2--------------------------------- -->
    <header class="header">
      <section class="container">
        <!-- nabigation bar start -->
        <nav>
          <div class="navbar-left">
            <div class="mobile-nav">
              <i class="fa fa-bars"></i>
            </div>
            <ul>
              <li><a href="#!" target="_blank">Home</a></li>
              <li><a href="#!" target="_blank">Clubs</a></li>
              <li><a href="#!" target="_blank">Contact</a></li>
            </ul>
            
        </div>
        <div class="navbar-right">
                <?php if( !isset($_SESSION['user_id'])){  ?>
                <a class="action-button" href="signup.php" class="btn">login</a>
                <?php }else{  ?>
                <hr>
                <a class="action-button" href="./logout.php" class="btn"><i class="fas fa-sign-in-alt"></i> Logout</a>
                <?php } ?>
          </div>
        </nav>
        <!-- /.nabigation bar end -->

        <!-- header banner section start  -->
        <div class="header-contents">
          <div class="contents">
            <div class="content">
              <h1 class="content-title">Conmebol Copa America 2021</h1>
                <a class="action-button" href="#category" target="_blank" class="action-button"
                  >Vote Now<i class="fas fa-arrow-right"></i
                ></a>
            </div>

            <div class="content effect">
              <!-- <img src="assets/log1.png" alt="bannner image" /> -->
              <img src="assets/rank.png" alt="bannner image" />
            </div>
          </div>
        </div>
        <!-- /.header banner section end  -->
      </section>
    </header>






    <!-- categories section starts  -->
    
    <!-- categories V2 -->
    <h1  id="category" class="heading">Voting <span>categories</span></h1>

    <section class="container-card">
    <?php if(!empty($_SESSION['user_id'])){
        
         foreach($data as $category) : ?>
            <?php 
                if( in_array($category['catg_id'],$res)
            ){ ?>
            <div class="card">
                <div class="imgBx">
                    <img src="./public/uploads/<?php echo $category["image"]; ?>" alt="">
                    <h1><?php  echo$category["catg_name"];?></h1>
                </div>
                <div class="content">
                    <a class="btn-voted" href="vote.php?id=<?php echo $category["catg_id"];?>">
                        <i class="fa-solid fa-circle-check"></i>
                        Voted
                    </a>
                </div>
            </div>
                    <?php
                    }else if(
                        !in_array($category['catg_id'],$res)
                    ){ ?>
                    <div class="card1">
                        <div class="imgBx">
                            <img src="./public/uploads/<?php echo $category["image"]; ?>" alt="">
                            <h1><?php  echo$category["catg_name"];?></h1>
                        </div>
                        <div class="content">
                            <a class="btn-vote" href="vote.php?id=<?php echo $category["catg_id"];?>">Voting Now</a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                
        <?php endforeach; 
        }else{ ?>
            <?php foreach($data as $category) : ?>
                <div class="card1">
                    <div class="imgBx">
                        <img src="./public/uploads/<?php echo $category["image"]; ?>" alt="">
                        <h1><?php  echo$category["catg_name"];?></h1>
                    </div>
                    <div class="content">
                        <a class="btn-vote" href="vote.php?id=<?php echo $category["catg_id"];?>">Voting Now</a>
                        <!-- <a class="btn-vote" href="result.php?id=<?php echo $category["catg_id"];?>">Result</a> -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php 
        }
        ?>

        
    </section>

    <!-- ----------FeedBack ------------ -->
    <h1  id="category" class="heading">Your <span>FeedBack</span></h1>
        <div class="contents">
            <div class="content effect">
                <!-- <img src="assets/log1.png" alt="bannner image" /> -->
                <img src="assets/win1.png" alt="bannner image" />
            </div>
            <div class="content">
                <div class="feedback">
                <div class="post">
                    <div class="text">Thanks for rating us!</div>
                    <div class="edit">EDIT</div>
                </div>
                <div class="star-widget">
                    <input type="radio" name="rate" value="I just hate it " id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="I don't like it " id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="It is awesome " id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="I just like it " id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" value="I just love it " id="rate-1" >
                    <label for="rate-1" class="fas fa-star"></label>
                    <form action="#">
                    <header class="head"></header>
                    <div class="textarea">
                        <textarea cols="30" placeholder="Describe your experience.."></textarea>
                    </div>
                    <div class="btn-form">
                        <button name="submit" type="submit">Post</button>
                    </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    

    <!-- blogs section ends -->

    <!-------------Footer Section---------------------->
    <section id="footer" class="footer">
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

    <!-- v2 footer -->
   


    <!----------------Scripts------------------------->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <?php include './admin/include/scripts.php';  
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    ?>
    <script>
      const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
    </script>
</body>

</html>