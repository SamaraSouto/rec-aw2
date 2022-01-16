<?php
    require_once 'init.php';
    // receuve POST data from form and create a new Disc and
    // insert it on db

    if(isset($_POST['titulo']) && isset($_POST['autor'])){
        $disco = new Disco();
        $disco->titulo = $_POST['titulo'];
        $disco->autor = $_POST['autor'];
        insert($disco);
    }

    // redirect to index.php
    header('Location: index.php');
