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
</head>
<body id="table">  
    <main>

    <div>
        <a href="./disconnect.php">disconnect</a>
    </div>
    <?php
        include "db-connect.php";
        $query = "SELECT * FROM DATA";
        $result = $conn ->query($query);
        $title = $result->fetch(PDO::FETCH_ASSOC);
        echo "<table class='table'>";
        echo "<tr class='title'>";
        foreach($title as $field=> $data){
            ?>
    <th><?php print_r($field) ?></th>
    <?php
        }
        echo "<th>edit</th>";
        echo "<th>delete</th>";
        echo "</tr>";
    
      echo  "<tr class='element'>";
     foreach($title as $field=> $data){
            ?>
    <td><?php print_r($data) ?></td>
    
    <?php
        }
        ?>
        <td><a href="delete.php?id=<?php print_r($title['id']) ?> "> delete</a>  </td>
        <td><a href="edit.php?id=<?php print_r($title['id']) ?> "> edit</a>  </td>
    
    <?php
    
    
        echo" </tr>";
    
    
    
    
    
    $row = $result->fetchall(PDO::FETCH_ASSOC);
    
    
    
    foreach($row as $data) {
        ?>
         <tr class="element">
            <td> <?php print_r($data['id']) ?> </td>
            <td> <?php print_r($data['name']) ?> </td>
            <td> <?php print_r($data['difficulty']) ?> </td>
            <td> <?php print_r($data['distance']) ?> </td>
            <td> <?php print_r($data['duration']) ?> </td>
            <td> <?php print_r($data['height_difference']) ?> </td>
            <td><a href="delete.php?id=<?php print_r($data['id']) ?> "> delete</a>  </td>
            <td><a href="edit.php?id=<?php print_r($data['id']) ?> "> edit</a>  </td>
    
    
    </tr>
    
        <?php
    
    }
    ?>
    </table>

<!-- new entry function + html -->
    <?php 

    if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'] )) {
        $name =$_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance =$_POST['distance'];
        $duration =$_POST['duration'];
        $height = $_POST['height_difference'];
        $createsql = "INSERT INTO DATA (name,difficulty,distance,duration,height_difference) VALUES ('$name','$difficulty','$distance','$duration','$height')";
        $create = $conn->prepare($createsql);
        $create->execute();
        echo "<meta http-equiv='refresh' content='1'>";
    
    }
    
    
    ?>
    <h2>New entry</h2>
    <form action="" method="POST">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="difficulty" placeholder="difficulty">
    <input type="text" name="distance" placeholder="distance"> <br>
    <input type="text" name="duration" placeholder="duration">
    <input type="text" name="height_difference" placeholder="height_difference">
    <input type="submit" value="send new entry" class="submit-entry">
    </form>
    
    <?php
    
        }else{
            header('location:hikes.php');
        }
        ?>






















</main>
</body>
</html>