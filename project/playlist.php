<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Playlist Page</title>
    <script src="javascript/java.js" defer></script>
    <?php echo '<link rel="stylesheet" href="css/stylesheet.css">' ?>
    <!-- Additional meta tags, stylesheets, or scripts can be added here -->
</head>

<body>

    <header>
        <h1>247MUSIC Playlsit page</h1>
        <nav>
            <ul>
                <li><a href="index.php">&#127968;Home</a></li>
                <li><a href="search.php">&#128269;Search</a></li>
                <?php
                session_start();
                if (isset($_SESSION['level'])) {
                    echo "<li><a href='playlist.php'>&#128252;Playlists</a></li>";
                    echo "<li><a href='logout.php'>&#128274;Logout</a></li>";
                    echo "<li>Logged in</li>";
                    echo isset($_SESSION['level']) ? "<li>" . $_SESSION['level'] . "</li>" : '<li>level</li>';
                    echo isset($_SESSION['firstname']) ? "<li>" . $_SESSION['firstname'] . ' ' . "</li>" : '<li>firstname</li>';
                    echo isset($_SESSION['surname']) ? "<li>" . $_SESSION['surname'] . "</li>" : '<li>surname</li>';
                    echo isset($_SESSION['username']) ? "<li>" . $_SESSION['username'] . "</li>" : '<li>username</li>';
                } else {
                    echo "<li><a href='login.php'>&#128273;Login/Signin</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <p>247MUSIC Playlist page</p>
        <?php

        require_once 'conn.php';

        function sanitize_input($input)
        {
            $sanitized_input = htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
            return $sanitized_input;
        }

        function validate_playlist_name($playlistName)
        {
            //Only alphanumeric characters and spaces
            return preg_match('/^[a-zA-Z0-9\s]+$/', $playlistName);
        }

        //Display Playlist
        $memberid = isset($_SESSION['member_id']) ? $_SESSION['member_id'] : die("<p style='color: red;'><strong>No Playlists for Non Members!</strong></p>");
        $queryplaylist = "SELECT DISTINCT playlist_name, member_id, playlist_id 
            FROM memberplaylist
            WHERE member_id = '$memberid'";

        $result = $connection->query($queryplaylist);
        if ($result->num_rows > 0 && (!isset($_GET['track_title'])) && (!isset($_GET['newplaylistName']))) {
            echo '<div class="section1">';
            echo '<h1>' . ($result->num_rows > 1 ? 'Playlists' : 'Playlist') . '</h1>';
            echo '<div class="scrollable-section-a">';
            echo '<table>';
            echo '<tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<td>';
                // Display Playlist names and link to play.php
                $link = 'play.php?playlist_id=' . $row['playlist_id'];
                echo '<p class="AAnames"><strong><a href="' . $link . '">' . $row['playlist_name'] . '</a></strong></p>';
                echo '</td>';
            }
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            if ($result->num_rows > 0) {
                $playlistName = isset($_GET['newplaylistName1']) ? sanitize_input($_GET['newplaylistName1']) : null;
                $queryaddplaylist = "SELECT DISTINCT playlist_id, member_id playlist_name 
                    FROM memberplaylist 
                    WHERE playlist_name = '$playlistName'";
                ?>
                <!-- New playlist Form-->
                <form method="GET" action="<?PHP echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="newplaylistName1">New Playlist Name:</label>
                    <input type="text" name="newplaylistName1" id="newplaylistName1" placeholder="New playlist name">
                    <input type="submit" value="Add new Playlist" name="createPlaylist1">
                </form>
                <?php
                if (isset($_GET['createPlaylist1'])) {

                    if (!empty($playlistName) && validate_playlist_name($playlistName)) {
                        $INSERTPLAYLISTCREATESQL = "INSERT INTO memberplaylist (member_id, playlist_name) VALUES 
                    ($memberid, '$playlistName')";
                        $insertResult = $connection->query($INSERTPLAYLISTCREATESQL);
                        $result = $connection->query($queryaddplaylist);
                        $row = $result->fetch_assoc();
                        $playlistid = $row['playlist_id'];

                        $link = 'play.php?playlist_id=' . $row['playlist_id'];
                        header('Location: ' . $link);

                    } else {
                        echo "Invalid playlist name. Playlist names may only contain alphanumeric characters and spaces.";
                    }
                }
            }


            // Create playlist
        } elseif ((isset($_GET['track_title'])) && (!isset($errorMessage))) {
            $trackTitle = $_GET['track_title'];
            $trackId = $_GET['track_id'];
            ?>
            <!-- New playlist Form-->
            <form method="GET" action="<?PHP echo $_SERVER["PHP_SELF"]; ?>">
                <label for="newplaylistName">New Playlist Name:</label>
                <input type="text" name="newplaylistName" id="newplaylistName" placeholder="New playlist name">
                <input type="hidden" name="track_title" id="track_title" value="<?php echo $trackTitle; ?>">
                <input type="hidden" name="track_id" id="track_id" value="<?php echo $trackId; ?>">
                <input type="submit" value="Add <?php echo $_GET['track_title']; ?> to new Playlist" name="createPlaylist">
            </form>
            <?php
            if (isset($_GET['newplaylistName'])) {
                $playlistName = isset($_GET['newplaylistName']) ? sanitize_input($_GET['newplaylistName']) : null;
                $track_id = $_GET['track_id'];
                $querycreateplaylist = "SELECT DISTINCT id, playlist.playlist_id, playlist.track_id 
                FROM playlist
                INNER JOIN memberplaylist ON playlist.playlist_id = memberplaylist.playlist_id
                INNER JOIN track ON playlist.track_id = track.track_id";
                $INSERTPLAYLISTSQL = "INSERT INTO memberplaylist (member_id, playlist_name) VALUES 
                ($memberid, '$playlistName')";

                $result = $connection->query($querycreateplaylist);
                $insertResult = $connection->query($INSERTPLAYLISTSQL);
                if ($insertResult) {
                    $queryaddtrack = "SELECT DISTINCT playlist_id, member_id playlist_name 
                    FROM memberplaylist 
                    WHERE playlist_name = '$playlistName'";
                    $result = $connection->query($queryaddtrack);
                    $row = $result->fetch_assoc();
                    $playlistid = $row['playlist_id'];
                    $INSERTRACKSQL = "INSERT INTO playlist (playlist_id, track_id) VALUES
                    ($playlistid ,$track_id)";
                    $insertResult = $connection->query($INSERTRACKSQL);
                    $link = 'play.php?playlist_id=' . $row['playlist_id'];
                    header('Location: ' . $link);
                }
            } ?>

            <!-- Exsiting playlist Form-->
            <form method="GET" action="<?PHP echo $_SERVER["PHP_SELF"]; ?>">
                <label for="playlistName">Playlist Name:</label>
                <select name="playlistid" id="playlistName">
                    <?php
                    $queryExistingPlaylists = "SELECT playlist_name, playlist_id 
                    FROM memberplaylist
                    WHERE member_id = $memberid";
                    $result = $connection->query($queryExistingPlaylists);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['playlist_id'] . "'>" . $row['playlist_name'] . "</option>";
                        }

                    }
                    ?>
                </select>
                <input type="hidden" name="track_title" value="<?php echo $_GET['track_title']; ?>">
                <input type="hidden" name="track_id" id="track_id" value="<?php echo $trackId; ?>">
                <input type="submit" value="Add to Playlist" name="existingPlaylist">
            </form>
            <?php
            if (isset($_GET["existingPlaylist"])) {
                echo 'Add to playlist is starting';
                $playlistid = $_GET['playlistid'];
                $track_id = $_GET['track_id'];

                $queryexistingplaylist = "SELECT DISTINCT id, playlist.playlist_id, playlist.track_id 
                FROM playlist
                INNER JOIN memberplaylist ON playlist.playlist_id = memberplaylist.playlist_id
                INNER JOIN track ON playlist.track_id = track.track_id";

                $INSERTPLAYLISTSQL = "INSERT INTO playlist (playlist_id, track_id) VALUES 
                ($playlistid, $track_id)";
                $result = $connection->query($queryexistingplaylist);
                $insertResult = $connection->query($INSERTPLAYLISTSQL);

                if ($insertResult) {
                    //Take back to playlist page
                    header("location:playlist.php");
                }
            }
        }

        if ($result->num_rows <= 0) {
            $errorMessage = 'No Playlists on this account<br><br>';
            echo $errorMessage;
            $playlistName = isset($_GET['newplaylistName']) ? $_GET['newplaylistName'] : null;
            $queryaddplaylist = "SELECT DISTINCT playlist_id, member_id playlist_name 
            FROM memberplaylist 
            WHERE playlist_name = '$playlistName'";
            ?>
            <!-- New playlist Form-->
            <form method="GET" action="<?PHP echo $_SERVER["PHP_SELF"]; ?>">
                <label for="newplaylistName">New Playlist Name:</label>
                <input type="text" name="newplaylistName" id="newplaylistName" placeholder="New playlist name">
                <input type="submit" value="Add new Playlist" name="createPlaylist">
            </form>
            <?php
            if (isset($_GET['newplaylistName'])) {
                echo 'createPlaylist is set';
                $playlistName = $_GET['newplaylistName'];
                $INSERTPLAYLISTCREATESQL = "INSERT INTO memberplaylist (member_id, playlist_name) VALUES 
                ($memberid, '$playlistName')";

                $insertResult = $connection->query($INSERTPLAYLISTCREATESQL);
                $result = $connection->query($queryaddplaylist);
                $row = $result->fetch_assoc();
                $playlistid = $row['playlist_id'];

                $link = 'play.php?playlist_id=' . $row['playlist_id'];
                header('Location: ' . $link);
            }
        }
        ?>

    </main>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>

</body>

</html>