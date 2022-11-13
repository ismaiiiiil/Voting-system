<?php
require './../controller/NumberCardControllers.php';
$num=new NumberCardController();
$sum_categories=$num->getNumbercategories();
$sum_users=$num->getNumberusers();
$sum_votes=$num->getNumbervotes();
$sum_candidates=$num->getNumbercandidates();

?>

<div class="cards">
    <div class="card">
        <div class="card-content">
            <div class="number"><?php echo $sum_users; ?></div>
            <div class="card-name">Number Users</div>
        </div>
        <div class="icon-box">
        <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="number"><?php echo $sum_candidates; ?></div>
            <div class="card-name">Number Candidates</div>
        </div>
        <div class="icon-box">
            <i class='bx bxs-group'></i>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="number"><?php echo $sum_categories; ?></div>
            <div class="card-name">Number Categories</div>
        </div>
        <div class="icon-box">
            <i class='bx bxs-category'></i>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="number"><?php echo $sum_votes; ?></div>
            <div class="card-name">Number Votes</div>
        </div>
        <div class="icon-box">
        <i class="fa-solid fa-check-to-slot"></i>
        </div>
    </div>
</div>