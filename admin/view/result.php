<?php
include_once './../controller/CandidateControllers.php';
$data = new CandidateController();
$categories = $data->getAllcategories();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/result.css?v=<?php echo time(); ?>">
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
                <?php
                    include_once './../../config.php';
                 foreach ($categories as $category) : 
                    $stmt = $db->prepare('CALL maxCandidateParCategorie(?)');
                    $stmt->execute([$category['catg_id']]);    
                    $candidates=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($candidates as $candidate) : 
                        $query = "SELECT * from candidates where category=:id";
                        $stmt = $db->prepare($query);
                        $stmt->execute(array(":id"=>$candidate['category']));
                        $sum_vote = 0;
                        while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $sum_vote += $row1['votes'];
                        } 
                ?>
                <H1 style="text-align: center;color: #b49e54;"> <?php echo $category['catg_name'] ?></H1>
                <div class="card" >
                    <div class="content">
                        <div class="img"><img src="./../../public/uploads/<?php echo $candidate["candidate_image"]; ?>" alt=""></div>
                        <div class="details">
                            <span class="name">
                            <?php echo $candidate["firstname"] .' '.$candidate["lastname"] ;?>
                            </span>
                            <p>
                            <span class="vote"><?php echo $candidate["votes"]; ?></span> voting
                            </p>
                        </div>
                    </div>
                    <?php
                    $sum = (int) $sum_vote;
                    $prog =$candidate["votes"]*100/$sum;
                    $intprog = (int) $prog;
                    ?>
                    <div class="skill-box">
                        <div class="skill-bar">
                            <span class="skill-per html" style="width: <?php echo $intprog ?>%;">
                                <span class="tooltip"><?php echo $intprog ?>%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach;
                endforeach; ?>
            </div>
            
        </div>
    </div>
    <div class="loader"></div>

    <script src="./../js/loader.js"></script>
    <script src='./../js/profile.js'></script>

    <?php include './../include/scripts.php';  ?>
    
</body>

</html>