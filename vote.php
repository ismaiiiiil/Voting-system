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
            <a href="./index.html">Home</a>
            <a href="#">Result</a>
        </nav>
    </header>
    
    <div class="clock"></div>

    <div id="container">
        <!-- clock -->


        <div class="sliders">
            <!-- card no 1 -->
            <div class="cards">
                <!-- profile images -->
                <div class="profile">
                    <div class="images">
                        <img src="assets/image1.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>ANAYA</h2>
                    <p>WEB DEVELOPER</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>

            <!-- duplicate card according to your need -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image2.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>ISMAIL RH</h2>
                    <p>FULL STACK</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 3 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image3.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>ANAYA</h2>
                    <p>WEB DEVELOPER</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 4 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image4.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>ANAYA</h2>
                    <p>WEB DEVELOPER</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 5 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image5.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>MORAD</h2>
                    <p>DEVELOPER</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 6 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image6.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>KHALID</h2>
                    <p>ecommerce</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 7 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image7.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>mohamed</h2>
                    <p>player</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
            <!-- card no 8 -->
            <div class="cards">
                <div class="profile">
                    <div class="images">
                        <img src="assets/image8.jpg" alt="">
                    </div>
                </div>
                <div class="info">
                    <!-- user name -->
                    <h2>ANAYA</h2>
                    <p>WEB DEVELOPER</p>
                </div>
                <!-- cards Buttons -->
                <div class="messages">
                    <button class="btns">Vote Now</button>
                </div>
            </div>
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