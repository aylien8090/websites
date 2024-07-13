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

        if (isset($_GET['customerName'])) {
            $customerName = ($_GET['customerName']);

            $query = "SELECT state, firstName, lastName, name, shipped, shippingDate FROM customer
        INNER JOIN purchase ON customer.customerID = purchase.customerID
        INNER JOIN product ON purchase.productCode = product.productCode
        WHERE CONCAT(customer.firstName, ' ', customer.lastName) = '$customerName'";

            $result = $connection->query($query);

            if ($result->num_rows) {
                echo '<table>';
                echo '<tr><th>Customer Name</th><th>State</th><th>Product Name</th><th>Is Shipped?</th><th>Date Shipped</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['firstName'];
                    echo " " . $row['lastName'] . '</td>';
                    echo '<td>' . $row['state'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['shipped'] . '</td>';
                    echo '<td>' . $row['shippingDate'] . '</td>';
                }
                echo '</table>';

            } else {
                echo '<p style="font-weight:bold; font-size:x-large">Sorry there are no products purchased for that customer</p>';
                echo '<a href="exercise2.php">Return to customers</a>';
            }
        } else {
            $query = "SELECT customer.customerID, purchase.productCode, firstName, lastName, state, name, shipped, shippingDate FROM ((customer 
        INNER JOIN purchase ON customer.customerID = purchase.customerID)
        INNER JOIN product ON purchase.productCode = product.productCode)
        ORDER BY shipped ASC";
            $result = $connection->query($query);

            if ($result->num_rows) {
                echo '<table>';
                echo '<tr><th>Customer Name</th><th>State</th><th>Product Name</th><th>Is Shipped?</th><th>Date Shipped</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['firstName'];
                    echo " " . $row['lastName'] . '</td>';
                    echo '<td>' . $row['state'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['shipped'] . '</td>';
                    echo '<td>' . $row['shippingDate'] . '</td>';
                }
                echo '</table>';

            }
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