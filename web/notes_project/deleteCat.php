<?php

// get the data from the POST
$id = $_GET['id'];

//var_dump($id);



// echo "title=$title\n";
// echo "content=$content\n";

require("./library/dbConnect.php");
$db = get_db();

try {

    // We do this by preparing the query with placeholder values
    $nc_query = 'DELETE FROM note_category WHERE categoryid = :id';
    $statement = $db->prepare($nc_query);


    $statement->bindValue(':id', $id);

    $statement->execute();

    $rowsChanged = $statement->rowCount();
    // var_dump($statement);
    $statement->closeCursor();



    $c_query = 'DELETE FROM category WHERE id = :id';
    $statement = $db->prepare($c_query);


    $statement->bindValue(':id', $id);

    $statement->execute();

    $rowsChanged = $statement->rowCount();

    // var_dump($statement);
    // exit;

    $statement->closeCursor();
} catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: showCats.php");

die();
