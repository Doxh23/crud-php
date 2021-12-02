<?php
$id = $_GET['id'];
$name = $_GET['name'];
$difficulty = $_GET['difficulty'];
$distance = $_GET['distance'];
$duration = $_GET['duration'];
$height_difference = $_GET['height_difference'];
if((isset($_POST['name']) && $_POST['name'] !== "") and (isset($_POST['difficulty']) and $_POST['difficulty'] !== "") and (isset($_POST['distance']) and $_POST['distance'] !== "") and (isset($_POST['duration']) and $_POST['duration'] !=="") and (isset($_POST['height_difference'] ) and $_POST['height_difference'] !== "")) {
   include "db-connect.php";
$namep = $_POST['name'];
$difficultyp = $_POST['difficulty'];
$distancep = $_POST['distance'];
$durationp = $_POST['duration'];
$height_differencep = $_POST['height_difference'];
  $editp = $conn ->prepare("UPDATE DATA SET name='$namep', difficulty='$difficultyp', distance='$distancep' , duration='$durationp' ,height_difference='$height_differencep' WHERE id='$id' ");
  $editp->execute();
  header('location: hikes.php');


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<body id="edit">
    
<main>
<a href="hikes.php"> <i class="fas fa-sign-out-alt"></i></a>
    <div class="edit-box">
        <form action="" method="POST">
        <input type="text" name="name" placeholder="name" value=<?php print_r($name) ?>>
        <select name="difficulty" placeholder="difficulty" id="" value=<?php print_r($difficulty) ?> >
<option value="easy">easy</option>
<option value="normal">normal</option>
<option value="hard">hard</option>
    </select>       
    <input type="text" name="distance" placeholder="distance" value=<?php print_r($distance) ?> > <br>
    <input type="text" name="duration" placeholder="duration" value=<?php print_r($duration) ?>>
    <input type="text" name="height_difference" placeholder="height_difference" value=<?php print_r($height_difference) ?>>
    <input type="submit" value="change entry" class="submit-entry">
        </form>
    </div>
</main>












</body>
</html>