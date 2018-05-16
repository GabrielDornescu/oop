<?php
// including the database connection file
include_once("../classes/crud.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM multiplication WHERE id=$id");

foreach ($result as $res) {
$startpoint = $res['start'];
$endpoint = $res['end'];
$iterations = $res['iterations'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>



<form name="form1" method="post" action="update.php">
    <table border="0">
        <tr>
            <td>Startpoint</td>
            <td><input type="text" name="start" value="<?php echo $startpoint;?>"></td>
        </tr>
        <tr>
            <td>Endpoint</td>
            <td><input type="text" name="end" value="<?php echo $endpoint;?>"></td>
        </tr>
        <tr>
            <td>Iteration</td>
            <td><input type="text" name="iterations" value="<?php echo $iterations;?>"></td>
        </tr>
        <tr>
            <td>Id</td>
            <td><input type="text" name="id" value=<?php echo $_GET['id'];?>></td>

        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
<div id="center_button"><button onclick="location.href='create.php'">Go Back</button></div>
<br/><br/>
</body>
</html>

