<?php
if((isset($_POST['name']) && $_POST['name'] !== "") and (isset($_POST['difficulty']) and $_POST['difficulty'] !== "") and (isset($_POST['distance']) and $_POST['distance'] !== "") and (isset($_POST['duration']) and $_POST['duration'] !=="") and (isset($_POST['height_difference'] ) and $_POST['height_difference'] !== "")) {
    
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
</head>
<body id="edit">
    
<main>
    <div class="edit-box">
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
    <input type="submit" value="change entry" class="submit-entry">
        </form>
    </div>
</main>












</body>
</html>