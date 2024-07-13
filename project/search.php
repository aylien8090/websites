<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Page</title>
    <script src="javascript/java.js" defer></script>
    <?php echo '<link rel="stylesheet" href="css/stylesheet.css">' ?>
    <!-- Additional meta tags, stylesheets, or scripts can be added here -->
</head>

<body>

    <header>
        <h1>247MUSIC Search page</h1>
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
        <?php
        require_once 'conn.php';

        function sanitize_input($input)
        {
            // Use the built-in PHP function htmlspecialchars to convert special characters to HTML entities
            // except %, so LIKE operator works
            $sanitized_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8', false);
            return $sanitized_input;
        }
        ?>
        <p><span>Enter a search Query</span></p>
        <form id="searchform" method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <p id="errormsg" style="display:none; color:red;">Please enter Song, Album or Artist</p>
            <p>
                <label for="query">Search Song:</label><input type="text" name="query" id="query"
                    placeholder="Song, Album or Artist"
                    value='<?php echo isset($_GET["query"]) ? $_GET["query"] : ''; ?>'>
            </p>
            <p>
                <input type="submit" value="Search" name="submit">
            </p>
        </form>
        <hr>
        <?php
        if (isset($_GET["submit"])) {
            if (($_GET["query"]) == '') {
                echo "Nothing here";
            } else {
                echo "<div id=noshow>";
                $querytrack = "SELECT album.album_id, artist.artist_id, album.thumbnail AS albumthumbnail, artist_name, album_name, track_title, track_length, spotify_track, track_id 
                FROM track 
                INNER JOIN album ON track.album_id = album.album_id 
                INNER JOIN artist ON track.artist_id = artist.artist_id 
                WHERE track_title LIKE ?";

                //Sanitization
                $startingQuery = sanitize_input(isset($_GET["query"]) ? $_GET["query"] : "");
                $likeQuery = "%$startingQuery%";
                $stmt = $connection->prepare($querytrack);
                $stmt->bind_param("s", $likeQuery);
                $stmt->execute();
                $result = $stmt->get_result();

                // Display Tracks
                if ($result->num_rows > 0) {
                    echo '<div class="section">';
                    echo '<h1>' . ($result->num_rows > 1 ? 'Tracks' : 'Track') . '</h1>';
                    echo '<div class="scrollable-section">';
                    echo '<table>';
                    echo '<tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<td>';
                        // Album Image
                        echo '<br>';
                        echo '<img src="/twa/thumbs/albums/' . $row["albumthumbnail"] . '" alt="' . $row["albumthumbnail"] . ' thumbnail" style="width: 104px; height: 104px;">';

                        // Track Information
                        echo '<br>';
                        $link = 'play.php?track_id=' . $row['track_id'];
                        echo '<strong><a href="' . $link . '">' . $row['track_title'] . '</a></strong><br>';
                        echo $row['album_name'] . ' &#8226; ' . $row['artist_name'];
                        echo '</td>';
                    }

                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    // No songs error
                } else {
                    echo '<br>';
                    echo 'No songs with that search';
                    echo '<br>';
                }
                $stmt->close();

                $queryartist = "SELECT artist_name, thumbnail AS artistthumbnail FROM artist 
                    WHERE artist_name LIKE ?";

                //Sanitization
                $startingQuery = sanitize_input(isset($_GET["query"]) ? $_GET["query"] : "");
                $likeQuery = "%$startingQuery%";
                $stmt = $connection->prepare($queryartist);
                $stmt->bind_param("s", $likeQuery);
                $stmt->execute();
                $result = $stmt->get_result();

                //Display Artist
                if ($result->num_rows > 0) {
                    echo '<div class=section1>';
                    echo '<h1>' . ($result->num_rows > 1 ? 'Artists' : 'Artist') . '</h1>';
                    echo '<div class="scrollable-section-a">';
                    echo '<table>';
                    echo '<tr>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<td>';
                        ?>
                        <img src="/twa/thumbs/artists/<?php echo $row["artistthumbnail"] ?>" style="width: 106px; height: 106px;"
                            alt='<?php echo $row["artistthumbnail"] . "thumbnail" ?>'>
                        <?php
                        $link = 'play.php?artist_name=' . urlencode($row['artist_name']);
                        echo '<p class="AAnames"><strong><a href="' . $link . '">' . $row['artist_name'] . '</a></strong></p>';
                        echo '</td>';
                    }
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';

                    //No artist error
                } else {
                    echo '<br>';
                    echo 'No artist with that search';
                    echo '<br>';
                }

                $stmt->close();

                $queryalbum = "SELECT DISTINCT album.album_name, artist.artist_name, album.thumbnail AS albumthumbnail FROM album
                INNER JOIN track ON album.album_id = track.album_id  
                INNER JOIN artist ON track.artist_id = artist.artist_id
                WHERE album.album_name LIKE ?";

                //Sanitization
                $startingQuery = sanitize_input(isset($_GET["query"]) ? $_GET["query"] : "");
                $likeQuery = "%$startingQuery%";
                $stmt = $connection->prepare($queryalbum);
                $stmt->bind_param("s", $likeQuery);
                $stmt->execute();
                $result = $stmt->get_result();

                //Display Albums
                if ($result->num_rows > 0) {
                    echo '<div class=section1>';
                    echo '<h1>' . ($result->num_rows > 1 ? 'Albums' : 'Album') . '</h1>';
                    echo '<div class="scrollable-section-a">';
                    echo '<table>';
                    echo '<tr>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<td>';
                        ?>
                        <img src="/twa/thumbs/albums/<?php echo $row["albumthumbnail"] ?>" style="width: 106px; height: 106px;"
                            alt='<?php echo $row["albumthumbnail"] . "thumbnail" ?>'>
                        <?php
                        $link = 'play.php?album_name=' . urlencode($row['album_name']);
                        echo '<p class="AAnames"><strong><a href="' . $link . '">' . $row['album_name'] . '</a></strong><br>' . $row['artist_name'] . '</p>';

                        echo '</td>';
                    }
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';

                    //No album error
                } else {
                    echo '<br>';
                    echo 'No album with that search';
                    echo '<br>';
                }
                echo "</div>";
                $stmt->close();
            } 

        }
        ?>

        <footer>
            <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
        </footer>
    </main>

</body>

</html>