<?php
$errorMessage = '';

if (isset($_POST["Submit"])) {
    if (empty($_POST['userName']) || empty($_POST['Password'])) {
        $errorMessage = "Both username and password are required";
    } else {
        require_once('conn.php');
        $username = $_POST['userName'];
        $password = $_POST['Password'];

        //hash the password
        $hashedPassword = hash('sha256', $password);

        //queries
        $query = "SELECT category, username, surname, firstname, password, member_id 
        FROM membership 
        WHERE username = '$username' 
        AND password = '$hashedPassword'";
        $rs = $connection->query($query);
        if ($rs->num_rows) {
            session_start();
            $user = $rs->fetch_assoc();
            $_SESSION['level'] = $user['category'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['member_id'] = $user['member_id'];
            header('Location: search.php');
        } else {
            $errorMessage = 'Invalid Username or Password';
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
    <script src="javascript/java.js" defer></script>
    <?php echo '<link rel="stylesheet" href="css/stylesheet.css">' ?>
    <!-- Additional meta tags, stylesheets, or scripts can be added here -->
</head>

<body>
    <!-- This is a comment -->
    <header>
        <h1>Member Login</h1>
        <nav>
            <ul>
                <li><a href="index.php">&#127968;Home</a></li>
                <li><a href="search.php">&#128269;Search</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p style="color:red;">
                <?php echo $errorMessage; ?>
            </p>
            <label for="userName">Username:</label>
            <input type="text" name="userName" id="userName">
            <br><br>
            <label for="Password">Password:</label>
            <input type="password" name="Password" id="Password">

            <div class="button-container">
                <p>
                    <input type="submit" value="Submit" name="Submit">
                </p>
            </div>
        </form>

        <div class="header">
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0" class="button">Sign Up here!</a>
        </div>

    </main>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>
</body>


</html>