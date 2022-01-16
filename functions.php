<?php
function get_connection(){
    $PDO = new PDO('mysql:host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASS);

    //create database if not exists and the table if not exists
    $PDO->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);

    // set database
    $PDO->exec("USE " . DB_NAME);

    $PDO->exec("CREATE TABLE IF NOT EXISTS " . DB_TABLE . " (
        id INT NOT NULL AUTO_INCREMENT,
        titulo VARCHAR(255) NOT NULL,
        autor VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )");

    return $PDO;
}

function insert($disco){
    $sql = "INSERT INTO " . DB_TABLE . " (titulo, autor) VALUES (:titulo, :autor)";
    $PDO = get_connection();
    $stmt = $PDO->prepare($sql);
    $stmt->bindValue(':titulo', $disco->titulo);
    $stmt->bindValue(':autor', $disco->autor);
    $stmt->execute();

    $disco->id = $PDO->lastInsertId();

    return $disco;
}


function update($disco){
    $sql = "UPDATE " . DB_TABLE . " SET titulo = :titulo, autor = :autor WHERE id = :id";
    $PDO = get_connection();
    $stmt = $PDO->prepare($sql);
    $stmt->bindValue(':titulo', $disco->titulo);
    $stmt->bindValue(':autor', $disco->autor);
    $stmt->bindValue(':id', $disco->id);
    $stmt->execute();

    return $disco;

}

function delete($disco){
    $sql = "DELETE FROM " . DB_TABLE . " WHERE id = :id";
    $PDO = get_connection();
    $stmt = $PDO->prepare($sql);
    $stmt->bindValue(':id', $disco->id);
    $stmt->execute();

    return $disco;

}

function select($id){
    $sql = "SELECT * FROM " . DB_TABLE . " WHERE id = :id";
    $PDO = get_connection();
    $stmt = $PDO->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $disco = $stmt->fetchObject('Disco');

    return $disco;
}

function getAll(){
    $sql = "SELECT * FROM " . DB_TABLE;
    $PDO = get_connection();
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $discos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $discos;
}
