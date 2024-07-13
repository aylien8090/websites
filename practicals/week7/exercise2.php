<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML5 Minimal Template</title>
    <style>
    </style>
</head>

<body>
    <!-- This is a comment -->
    <header>
        <h1>List of Items Shipped</h1>
    </header>

    <main>
        <?php
        require_once 'conn.php';

        $query = "SELECT DISTINCT CONCAT(firstName, ' ', lastName) AS customerName
                  FROM customer
                  ORDER BY customerName ASC";
        $result = $connection->query($query);

        if ($result->num_rows) {
            echo '<ul>';

            while ($row = $result->fetch_assoc()) {
                $customerName = urlencode(($row['customerName'])); //$customerName is passed through the urlencode() function to ensure that any special 
                //characters, including spaces, are properly encoded for a URL so validator doesn't make problems.
                $link = 'exercise1.php?customerName=' . $customerName;

                echo '<li><a href="' . $link . '">' . htmlspecialchars($row['customerName']) . '</a></li>';
                // By adding htmlspecialchars($row['customerName']), any special characters in the customer's name (including spaces) are properly escaped, 
                // ensuring they displayed correctly in HTML without causing issues in URL/HTML structure. Resolving problem of 
                // displaying + characters instead of spaces in the customer's name.
                
            }
            echo '</ul>';

        }



        ?>

    </main>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>