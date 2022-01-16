<?php
    require_once 'init.php';

    // get the id from the url if it exists and get from the db
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $disco = select($id);
        //delete from the db
        delete($disco);
    }

    header('Location: index.php');
?>
