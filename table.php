<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] === TRUE){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body id="table">  
    <main>

    <div class="disconnect">
        <a href="./disconnect.php"><i class="fas fa-sign-out-alt"></i></a>
    </div>
    <?php
        include "db-connect.php";
        $query = "SELECT * FROM DATA";
        $result1 = $conn ->query($query);
        $title = $result1->fetch(PDO::FETCH_ASSOC);
        echo "<table class='table'>";
        echo "<tr class='title'>";
        foreach($title as $field=> $data){
            ?>
    <th><?php print_r($field) ?></th>
    <?php
        }
        echo "<th>delete</th>";
        echo "<th>edit</th>";     
        $result2 = $conn ->query($query);
    $row = $result2->fetchall(PDO::FETCH_ASSOC);
    
    
    
    foreach($row as $data) {
        ?>
         <tr class="element">
            <td> <?php print_r($data['id']) ?> </td>
            <td> <?php print_r($data['name']) ?> </td>
            <td> <?php print_r($data['difficulty']) ?> </td>
            <td> <?php print_r($data['distance']) ?> </td>
            <td> <?php print_r($data['duration']) ?> </td>
            <td> <?php print_r($data['height_difference']) ?> </td>
            <td><a href="delete.php?id=<?php print_r($data['id']) ?>&name=<?php print_r($data['name']) ?> "> <i class="fas fa-trash"></i></a>  </td>
            <td><a href="edit.php?id=<?php print_r($data['id']) ?>&name=<?php print_r($data['name']) ?> &difficulty=<?php print_r($data['difficulty'])?>&distance=<?php print_r($data['distance']) ?>&duration=<?php print_r($data['duration']) ?>&height_difference=<?php print_r($data['height_difference']) ?> "> <i class="fas fa-edit"></i></a>  </td>
    
    
    </tr>
    
        <?php
    
    }
    ?>
    </table>

<!-- new entry function + html -->
    <?php 
    if(isset($_POST['submit']) ){
    if((isset($_POST['name']) && $_POST['name'] !== "") and (isset($_POST['difficulty']) and $_POST['difficulty'] !== "") and (isset($_POST['distance']) and $_POST['distance'] !== "") and (isset($_POST['duration']) and $_POST['duration'] !=="") and (isset($_POST['height_difference'] ) and $_POST['height_difference'] !== "")) {
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance =$_POST['distance'];
        $duration =$_POST['duration'];
        $height = $_POST['height_difference'];
        $createsql = "INSERT INTO DATA (name,difficulty,distance,duration,height_difference) VALUES ('$name','$difficulty','$distance','$duration','$height')";
        $create = $conn->prepare($createsql);
        $create->execute();
        echo "<meta http-equiv='refresh' content='1'>";
    }else{
        echo "<script> alert('pls fill all blank')</script>";
    }}
    
    ?>
    <h2>New entry</h2>
    <form action="" method="POST">
    <input type="text" name="name" placeholder="name">
    <select name="difficulty" placeholder="difficulty" id="">
<option value="easy">easy</option>
<option value="normal">normal</option>
<option value="hard">hard</option>
    </select>
    <input type="text" name="distance" placeholder="distance"> <br>
    <input type="text" name="duration" placeholder="duration">
    <input type="text" name="height_difference" placeholder="height_difference">
    <input type="submit" name="submit" value="send new entry" class="submit-entry">
    </form>
    
    <?php
    
     } else{
            header('location:hikes.php');
        }
        ?>






















</main>
</body>
</html>