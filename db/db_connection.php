<?php


// Set default timezone
date_default_timezone_set('UTC');

try {
    /**************************************
     * open database.sqlite connection                 *
     **************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:./database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Close file database.sqlite connection
    $file_db = null;
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}
