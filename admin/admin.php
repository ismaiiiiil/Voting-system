<?php
require("../config.php");

$query = "SELECT * FROM candidates";
$data = $db->query($query); // PDOStatment -- CURSEUR
$candidates = $data->fetchAll(); // tatjib kolchi


$query = "SELECT * FROM users";
$data = $db->query($query); // PDOStatment -- CURSEUR
$users = $data->fetchAll(); // tatjib kolchi

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Admin panel</title>
</head>

<body>
    <div class="container">
        <!-- sidebar -->
        <?php include('./include/sidebar.php') ?>
        <div class="main">
            <!-- NavBar -->
            <?php include('./include/navbar.php') ?>

            <!-- -------- Card --------- -->
            <?php include('./include/card.php') ?>


            <!-- ----- Table ------ -->
            <div class="tables">
                <div class="last-appointments">
                    <!-- users -->
                    <div class="heading">
                        <h2>Users</h2>
                        <a href="#" class="btn-view">Ajouter</a>
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
                                <td>
                                    <i class="far fa-eye"></i>
                                    <i class="far fa-edit"></i>
                                    <i class="far fa-trash-alt"></i>
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
                        <a href="#" class="btn-view">Ajouter</a>
                    </div>
                    <table class="visiting">
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
                                        <img src="../public/uploads/<?php echo $candidate['candidate_image']; ?>"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $candidate['firstname'] . ' ' . $candidate['lastname']; ?>
                                </td>
                                <td>
                                    <?php echo $candidate['votes']; ?>
                                </td>

                                <td><i class="far fa-eye"></i></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>