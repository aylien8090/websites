<?php
$connection = new mysqli('localhost', 'TWA_student', 'TWA_SUM23', 'electrical');
if ($connection->connect_error) {
    // If there is a connection error, die and display an error message
    die('Connection Error (' . $connection->connect_errno . ')'
        . $connection->connect_error);
}

// Perform a query to retrieve table names from the 'electrical' database

$result = $connection->query('SHOW TABLES');

if (!$result) {
    // If the query fails, die and display an error message
    die('Query Error: ' . $connection->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML5 Minimal Template</title>
</head>

<body>
    <!-- This is a comment -->
    <header>

    </header>

    <main>
        <h1>Tables with Electrical</h1>

        <section>
            <ul>
                <?php
                // Loop through the result set and display table names
                while ($row = $result->fetch_assoc()) {
                    echo '<li>' . $row['Tables_in_electrical'] . '</li>';
                }
                ?>
            </ul>
        </section>

    </main>

    <footer>

    </footer>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
