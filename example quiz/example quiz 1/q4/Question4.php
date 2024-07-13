<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Quiz Question 4 Form</title>
  <link href="styles.css" rel="stylesheet">
  <style>
    table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px; /* Optional: Add margin at the bottom */
}

table, th, td {
  border: 1px solid #ddd; /* Add a border to all elements */
}

th, td {
  padding: 8px; /* Add padding to table cells */
  text-align: left; /* Align text to the left */
}

th {
  background-color: #f2f2f2; /* Add a background color to table headers */
}

  </style>
</head>

<body>

  <?php
  $servername = "localhost";
  $username = "sumAquiz";
  $password = "quizpw24";
  $database = "warehouse";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  ?>

  <h1>Orders by Postcode</h1>
  <p>Enter a postcode and then select whether you want to view orders that have been shipped or not shipped:</p>
  <form id="Q4form" action="question4.php" method="post">
    <p>
      <label for="postcode">Post Code:</label>
      <input type="text" id="postcode" name="postcode">
    </p>
    <p><label for="shipped">Show me</label>
      <select id="shipped" name="shipped">
        <option value="0">--please choose--</option>
        <option value="Y">Shipped</option>
        <option value="N">Not-Shipped</option>
      </select>
      &nbsp;orders for this postcode<br>
      <input type="submit" value="Show Orders" name="submit">
    </p>
  </form>
  <?php

  $postcode = isset($_POST["postcode"]) ? mysqli_real_escape_string($conn ,$_POST["postcode"]): null;

  $shipped = isset($_POST["shipped"]) ? mysqli_real_escape_string($conn ,$_POST["shipped"]): null;


  if (isset($_POST["submit"])) {
    $query = "SELECT firstName, lastName, address, suburb, state, postcode, orders.orderNumber, orders.orderNumber, orders.customerID, orders.orderDate, orders.shipped, orders.shippingDate, orders.staffID
    FROM customer 
    INNER JOIN orders ON customer.customerID = orders.customerID
    WHERE postcode = '$postcode' AND orders.shipped = '$shipped'
    ORDER BY orderDate ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      // output data of each row
      ?>
      <table>
        <tr>
          <th>orderNumber</th>
          <th>orderDate</th>
          <th>shippingDate</th>
          <th>customerID</th>
          <th>firstName</th>
          <th>lastName</th>
          <th>postcode</th>
        </tr>
      <?php
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row['orderNumber'];
        echo "</td>";
        echo "<td>";
        echo $row['orderDate'];
        echo "</td>";
        echo "<td>";
        echo $row['shippingDate'];
        echo "</td>";
        echo "<td>";
        echo $row['customerID'];
        echo "</td>";
        echo "<td>";
        echo $row['firstName'];
        echo "</td>";
        echo "<td>";
        echo $row['lastName'];
        echo "</td>";
        echo "<td>";
        echo $row['postcode'];
        echo "</td>";
        echo "<td>";
        echo $row['shipped'];
        echo "</td>";
        echo "<tr>";
      }
      ?>
      </table>
      <?php
    } else {
      echo "0 results";
    }
  }


  ?>

  <p>For testing purposes here are the current postcodes:</p>
  <ul>
    <li>2322</li>
    <li>3001</li>
    <li>1345</li>
    <li>2222</li>
    <li>2732</li>
    <li>2771</li>
    <li>2560</li>
    <li>6234</li>
    <li>1023</li>
    <li>5345</li>
    <li>4035</li>
  </ul>
</body>

</html>

<?php
$conn->close();
?>