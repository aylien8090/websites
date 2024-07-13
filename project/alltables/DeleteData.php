<?php
require_once 'conn.php';

// Construct the DELETE SQL statement
$deleteSQL = "DELETE FROM memberplaylist WHERE playlist_id >= 6";

// Execute the DELETE query
if ($connection->query($deleteSQL) === TRUE) {
    echo "Data deleted successfully";
} else {
    echo "Error deleting data: " . $connection->error;
}