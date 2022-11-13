<?php
    include_once './../../config.php';
    $output='';

    if(isset($_POST['request'])){
        $request=$_POST['request'];
        $query = "SELECT * FROM candidates WHERE category=:id";
        $stmt = $db->prepare($query);
        $stmt->execute(array(":id"=>$request));
    }
    // else{
    //     $stmt=$db->prepare("SELECT * from candidates");
    //     $stmt->execute();
    // }    
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if ( count($result)> 0){

        $output = "<thead>
                    <td>Photo</td>
                    <td>FullName</td>
                    <td>Votes</td>
                    <td>Detail</td>
                </thead>
            <tbody>
                ";
            for( $i=0; $i < count($result); $i++) {
                $cand_id = $result[$i]["cand_id"];
                $candidate_image = $result[$i]["candidate_image"];
                $firstname = $result[$i]["firstname"];
                $lastname = $result[$i]["lastname"];
                $votes = $result[$i]["votes"];
           

            $output .="
            <tr>
                <td>
                    <div class='img-box-small'>
                        <img class='img' src='./../../public/uploads/$candidate_image'
                        alt=''>
                    </div>
                </td>
                <td>
                    $firstname  $lastname
                </td>
                <td>
                    $votes
                </td>
                <td>
                    <a onClick='return confirm('Are you sure you want to Modifier?')' type='button' href='ModifierCandidate.php?id=$cand_id'>
                        <i class='far fa-edit'></i>
                    </a>
                    <a onClick='return confirm('Are you sure you want to delete?')' type='button' href='DeleteCandidate.php?id=$cand_id'>
                        <i class='far fa-trash-alt'></i>
                    </a>
                </td>
            </tr>";
        };
            $output .="</tbody>";
            echo $output;

    }else{
        echo "<h3 style='text-align: center;padding: 6px;margin: 7px 0;color: #e74d4d;margin-bottom: -6px;'>Sorry! No Records Found!</h3>";
    }

   

?>