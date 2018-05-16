<?php
// including the database connection file
include_once("../classes/crud.php");
include_once("../classes/validation.php");

$crud = new Crud();
$validation = new Validation();

if (isset($_POST['update'])) {
    $msg = $validation->check_empty($_POST, array('start', 'end', 'iterations'));

    $result = $crud->update($_POST['id'], $_POST['start'], $_POST['end'], $_POST['iterations']);
    //redirectig to the display page. In our case, it is index.php
    header("Location: create.php");
}
