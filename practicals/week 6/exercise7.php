<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Class 8 Exercise 7</title>
    <style>
        input[type="text"] {
            width: 100px;
        }

        label {
            padding: 0 20px;
        }

        .error {
            color: red;
        }

        table {
            border-spacing: 0;
        }

        td,
        th {
            padding: 5px;
            border: 1px solid black;
        }

        footer {
            bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    require_once 'conn.php';

    ?>
    <h1>Search <em>Electrical</em> Products</h1>
    <p>Enter a search query and a quantity desired</p>
    <form method="get" action="<?PHP echo $_SERVER["PHP_SELF"]; ?>">
        <p>
            <label for="query">Product Name:</label><input type="text" name="query" id="query" value='<?php echo isset($_GET["query"]) ? $_GET["query"] : ''; ?>'>
            <label for="quantity">Quantity:</label><input type="text" placeholder="0" name="quantity" id="quantity"
                value='<?php echo isset($_GET["quantity"]) ? $_GET["quantity"] : ''; ?>'>
        </p>
        <?php
        $error1 = "";
        $error2 = "";
        if (isset($_GET["submit"])) {
            if (empty($_GET["query"])) {
                $error1 = "Search query is required.";
            } else {
                $error1 = "";
            }

            if (empty($_GET["quantity"])) {
                $error2 = "";
            } else {
                if (!is_numeric($_GET["quantity"]) || $_GET["quantity"] < 0) {
                    $error2 = "Quantity needs to be a positive number when entered.";
                }
            }
        }


        ?>

        <p class="error" <?php echo (empty($error1) && empty($error2)) ? 'style="display:none;"' : ''; ?>>
            <?php
            echo $error1;
            echo '<br>';
            echo $error2;
            ?>
        </p>

        <p>
            <input type="submit" value="Search" name="submit">
        </p>
    </form>
    <hr>
    <?php
if (isset($_GET["submit"]) && !empty($_GET["query"])) {
    $startingQuery = isset($_GET["query"]) ? $_GET["query"] : "";
    $numQuery = isset($_GET["quantity"]) ? $_GET["quantity"] : "0";
    $query = "SELECT name, quantityInStock, price 
        FROM product 
        WHERE name LIKE '%$startingQuery%' AND quantityInStock >= '$numQuery' 
        ORDER BY price ASC";
    $result = $connection->query($query);

    if ((!is_numeric($numQuery) || $numQuery < 0) && !empty($numQuery)) {
        echo '';
    } elseif ($result->num_rows <= 0) {
        if (empty($_GET["quantity"])) {
            echo '<p style="font-weight:bold; font-size:x-large">There are no products for ' . $_GET["query"] . '</p>';
        } else {
            echo '<p style="font-weight:bold; font-size:x-large">There are no products for ' . $_GET["query"] . ' with ' . $_GET["quantity"] . ' or more in stock</p>';
        }
    } else {
        echo '<table>';
        echo '<tr><th>Product Name</th><th>Price</th><th>Qty</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['quantityInStock'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>
</body>


</html>