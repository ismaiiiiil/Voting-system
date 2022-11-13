<?php
    include_once './../../config.php';
    $output='';

    if(isset($_POST['query'])){
        $search=$_POST['query'];
        $query = "SELECT * from categories 
                where catg_name LIKE ? OR
                end_date LIKE ?";
        $stmt = $db->prepare($query);
        $stmt->execute(array('%' . $search . '%',
        '%' . $search . '%'
    ));
    }
    else{
        $stmt=$db->prepare("SELECT * from categories");
        $stmt->execute();
    }    
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if ( count($result)> 0){

        $output = "<thead>
                    <td>Photo</td>
                    <td>Name Category</td>
                    <td>End Date</td>
                    <td>Detail</td>
                </thead>
            <tbody>
                ";
            for( $i=0; $i < count($result); $i++) {
            $catg_id = $result[$i]["catg_id"];
            $image = $result[$i]["image"];
            $catg_name = $result[$i]["catg_name"];
            $end_date = $result[$i]["end_date"];
            $h = $result[$i]["h"];
            $m = $result[$i]["m"];
            $s = $result[$i]["s"];

            $output .="
            <tr>
            <td>
                <div class='img-categ-small'>
                    <img class='img' src='./../../public/uploads/$image'
                        alt=''>
                </div>
            </td>
            <td>
                $catg_name
            </td>
            <td>
                $end_date $h  h :  $m  m :  $s  s
            </td>
                <!-- button -->
            <td>
                <a onClick='return confirm('Are you sure you want to Modifier?')' type='button' href='ModifierCategory.php?id=$catg_id'>
                    <i class='far fa-edit'></i>
                </a>
                <a onClick='return confirm('Are you sure you want to delete?')' type='button' href='DeleteCategory.php?id=$catg_id'>
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