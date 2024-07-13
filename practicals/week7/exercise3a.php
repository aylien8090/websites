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
        <?php
        if (isset($_SESSION['fullName'])) {
            $fullName = $_SESSION['fullName'];
            echo '<h1>Hi ' . $fullName . '!</h1>';

        } else {
            header("Location: exercise3.html");
        }
        ?>
    </header>

    <main>
        <?php
        if (isset($_SESSION['TAC'])) {
            $TAC = ($_SESSION['TAC'] == '') ? 'No' : 'Yes';

            echo 'Did you agree to the Terms and Conditions? ' . $TAC;
            echo '<br><br>';
            echo '<a href="exercise3.html">Return to form</a>';
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
<?php
// Start the session
session_destroy();
?>