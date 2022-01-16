<?php
    require_once 'init.php';

    $discos = getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Make a list of disks on db -->
    <ul>
        <?php foreach($discos as $disco): ?>
            <li>
                Titulo: <?php echo $disco['titulo']; ?>;
                Autor: <?php echo $disco['autor']; ?>
                <a href="edit.php?id=<?php echo $disco['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $disco['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- form to add new disc-->
    <form action="add.php" method="POST">
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="text" name="autor" placeholder="Autor">
        <input type="submit" value="Add">
    </form>
</body>
</html>
