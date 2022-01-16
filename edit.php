<?php
    require_once 'init.php';

    // get the id from the url if it exists and get from the db
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $disco = select($id);
    }else{
        //redirect to index.php
        header('Location: index.php');
    }

    // if the form is submitted, update the db
    if(isset($_POST['titulo']) && isset($_POST['autor'])){
        $disco->titulo = $_POST['titulo'];
        $disco->autor = $_POST['autor'];
        update($disco);
    }
?>
<!-- form to update the disc -->
<form action="edit.php?id=<?php echo $disco->id; ?>" method="POST">
    <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $disco->titulo; ?>">
    <input type="text" name="autor" placeholder="Autor" value="<?php echo $disco->autor; ?>">
    <input type="submit" value="Update">
</form>
<a href="index.php">Back</a>
