<!--Homework 8 Solution - database.php-->
<!--@author Nathan C. Sellars-->

<?php

    $connectionString = 'mysql:host=localhost;dbname=nwacc';
    $userName = 'root';
    $password = '';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($connectionString, $userName, $password, $options);
    } catch (PDOException $exception) {
        $errorMessage = $exception->getMessage();
        include('db_error_connect.php');
        exit;
    }

    /**
     * Throws an {@code PDOException} if there is
     * an error connecting to the database.
     *
     * @param $errorMessage {mixed} the connection
     * error message for this database.
     */
    function displayError($errorMessage) {
        include('db_error.php');
        exit;
    }

?>