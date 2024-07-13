<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML5 Minimal Template</title>

</head>

<body>
    <!-- This is a comment -->
    <header>
        <h1>Customers of the Electrical</h1>
    </header>

    <main>
        <?php
        require_once 'conn.php';

        $query = "SELECT firstName, lastName, address, suburb, state, postcode FROM customer";
        $result = $connection->query($query);

        if($result->num_rows) {
            echo '<table>';
            echo '<tr><th>Name</th><th>Address</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['firstName'];
                echo " " . $row['lastName'] . '</td>';
                echo '<td>'. $row['address'];
                echo ", " . $row['suburb'];
                echo ", " . $row['state'];
                echo ", " . $row['postcode'] . '</td>';
        }
        echo '</table>';

    }



        ?>

    </main>

    <footer>

    </footer>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
