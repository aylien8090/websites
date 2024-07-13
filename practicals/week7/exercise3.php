<?php
// Start the session
session_start();
?>
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
        <h1>Terms and Conditions</h1>
    </header>

    <main>
        <?php
        if (isset($_GET['Submit'])) {
            $_SESSION['fullName'] = isset($_GET['fullName']) ? $_GET['fullName'] : '';
            $_SESSION['TAC'] = isset($_GET['TAC']) ? $_GET['TAC'] : '';
            if (empty($_SESSION['fullName'])) {
                header("Location: exercise3.html");
                exit();
            }
            echo 'Thanks for your input! Go to ';
            echo '<a href="exercise3a.php">Results Page</a>';
        } else {
            header("Location: exercise3.html");
        }

        ?>

    </main>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>
</body>

</html>