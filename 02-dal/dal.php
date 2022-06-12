<?php

// Connect to database: 
function connect()
{
    $conn = mysqli_connect('localhost', 'root', '', 'northwind');

    return $conn;
}

// Insert / Update / Delete
function execute($sql)
{
    //Connect to Database:
    $conn = connect();

    // Execute query:
    mysqli_query($conn, $sql);

    //Get auto_increment id: 
    $id = mysqli_insert_id($conn);

    //Close the connection:
    mysqli_close($conn);

    //Return the id: 
    return $id;
}

// Select table:
function select($sql) {

    //Connect to database: 
    $conn = connect();

    //Execute query: returns result object whcih can give us the final rows:
    $result = mysqli_query($conn, $sql);

    //Get first row: 
    $row = mysqli_fetch_object($result);

    //Run while we have rows:
    while($row) {
      //Add row to a table array:
      $table[] = $row;

      //Read the next row: 
      $row = mysqli_fetch_object($result);
    }

    //Close the connection:
    mysqli_close($conn);

    return $table;
}


