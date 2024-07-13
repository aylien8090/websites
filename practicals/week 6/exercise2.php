<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 6 Prac Class 7 Exercise 2</title>
</head>

<body>
    <section>
        <p>The following information was received from the form:</p>
        <br>
            <?php
            //obtain the input from the $_GET array
            if (isset($_GET["street"])) {
                $street = $_GET["street"];
            }
            else {
                $street = "";
            }
            if (isset($_GET["suburb"])) {
                $suburb = $_GET["suburb"];
            } else {
                $suburb = "";
            }
            if (isset($_GET["state"])) {
                $state = $_GET["state"];
            } else {
                $state = "";
            }
            if (isset($_GET["emaillist"])) {
                $emaillist = $_GET["emaillist"];
            }
            else {
                $_GET["emaillist"] = "";
                $emaillist = $_GET["emaillist"];
            }
            echo "Street:" . $street . "";
            echo '<br>';
            echo "Suburb:" . $suburb . "";
            echo '<br>';
            echo "State:" . $state . "";
            echo '<br>';
            echo "Email list:" . $emaillist . "";
            ?>
    </section>

</body>

</html>