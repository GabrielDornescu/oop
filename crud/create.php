
<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 10/05/2018
 * Time: 22:55
 */


//including the database connection file
include("../classes/crud.php");

$crud = new Crud();


//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM multiplication ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>C.R.U.D</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="../public/crud.css">


</head>

<body>

<h1>C.R.U.D by <span>Dornescu Gabriel</span></h1>

<table class="responstable">

    <tr>
        <th>Startpoint</th>
        <th>Endpoint</th>
        <th>Iterations</th>
        <th>Id</th>
        <th>Datetime</th>
        <th>Action</th>
    </tr>

    <?php
    foreach ($result as $key => $res) {
        //while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['start']."</td>";
        echo "<td>".$res['end']."</td>";
        echo "<td>".$res['iterations']."</td>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['datetime']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"http://localhost/dashboard/it/stagiu_oop_2/result.php?id=$res[id]\">Run Mutliplication</a></td>";
    }
    ?>

</table>
<script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>

<div id="center_button"><button onclick="location.href='../index.php'">Back to Home</button></div>
<img src="../code-minions.gif" alt="Code Works" style="display: block;margin-left: auto;margin-right: auto">
</body>

</html>