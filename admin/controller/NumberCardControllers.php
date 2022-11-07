<?php
require   "./../database/DB.php";

class NumberCardController{
    public function getNumbercategories(){
        $query = "SELECT * FROM categories";
        $data = DB::connect()->query($query); // PDOStatment -- CURSEUR
        $sum_categories= 0;
        while($data->fetch(PDO::FETCH_ASSOC)) {
            $sum_categories += 1;
        }
        return $sum_categories;
    }
    public function getNumberusers(){
        $query = "SELECT * FROM users";
        $data = DB::connect()->query($query); // PDOStatment -- CURSEUR
        $sum_users= 0;
        while($data->fetch(PDO::FETCH_ASSOC)) {
            $sum_users += 1;
        }
        return $sum_users;
    }
    public function getNumbervotes(){
        $query = "SELECT * FROM candidates";
        $data = DB::connect()->query($query); // PDOStatment -- CURSEUR
        $sum_votes= 0;
        while($row= $data->fetch(PDO::FETCH_ASSOC)) {
            $sum_votes += $row['votes'];
        }
        return $sum_votes;
    }
    public function getNumbercandidates(){
        $query = "SELECT * FROM candidates";
        $data = DB::connect()->query($query); // PDOStatment -- CURSEUR
        $sum_candidates= 0;
        while($data->fetch(PDO::FETCH_ASSOC)) {
            $sum_candidates += 1;
        }
        return $sum_candidates;
    }

}