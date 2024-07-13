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
        //obtain the input from the $_POST array
        if (isset($_POST["street"])) {
            $street = $_POST["street"];
        } else {
            $street = "";
        }
        if (isset($_POST["suburb"])) {
            $suburb = $_POST["suburb"];
        } else {
            $suburb = "";
        }
        if (isset($_POST["state"])) {
            $state = $_POST["state"];
        } else {
            $state = "";
        }
        if (isset($_POST["emaillist"])) {
            $emaillist = $_POST["emaillist"];
        } else {
            $_POST["emaillist"] = "";
            $emaillist = $_POST["emaillist"];
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
    <?php
    // Check if the streams array is set in $_POST
    if (isset($_POST["streams"])) {
        $streams = $_POST["streams"];
        
        echo "Streams:";
        foreach ($streams as $stream) {
            echo $stream . ", ";
        }
    } else {
        echo "Streams: None selected";
    }
    ?>

    <!--output the other form inputs here -->
</body>

</html>