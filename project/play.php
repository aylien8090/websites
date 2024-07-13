<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Play Page</title>
    <script src="javascript/java.js" defer></script>
    <?php echo '<link rel="stylesheet" href="css/stylesheet.css">' ?>
    <!-- Additional meta tags, stylesheets, or scripts can be added here -->
</head>

<body>

    <header>
        <h1>247MUSIC Play page</h1>
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
        <p id=top title>Welcome to the 247MUSIC Play page</p>
        <?php

        require_once 'conn.php';

        // Check 'album_name' set
        if (isset($_GET['album_name'])) {
            $albumName = $_GET['album_name'];
            $queryalbum = "SELECT DISTINCT album_name, album_date, album_name, artist.artist_name, 
            track.track_title, track.track_length, track.track_id, 
                artist.thumbnail AS artistthumbnail, 
                album.thumbnail AS albumthumbnail 
                FROM album 
                INNER JOIN artist ON album.artist_id = artist.artist_id
                INNER JOIN track ON album.album_id = track.album_id
                WHERE album_name = '$albumName'";
            $result = $connection->query($queryalbum);

            if ($result->num_rows > 0) {
                echo '<div class="section1">';
                echo '<h1>Album</h1>';
                echo '<table>';
                echo '<tr>';

                $row = $result->fetch_assoc();
                echo '<td>';
                ?>
                <img src="/twa/thumbs/albums/<?php echo $row["albumthumbnail"] ?>" style="width: 106px; height: 106px;"
                    alt='<?php echo $row["albumthumbnail"] . "thumbnail" ?>'>
                <?php
                echo '<p class="AAnames"><strong>' . $row['album_name'] . '</strong><br>';
                echo $row['artist_name'] . '</p>';

                echo '</td>';

                echo '</tr>';
                echo '</table>';
                echo '</div>';

                echo '<h1>' . $row['album_name'] . ' Songs</h1>';
                echo '<div class="scrollable-section-a">';
                echo '<table>';
                echo '<tr>';

                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    echo '<td>';
                    // Album Image
                    echo '<br>';
                    echo '<img src="/twa/thumbs/albums/' . $row["albumthumbnail"] . '" alt="' . $row["albumthumbnail"] . ' thumbnail" style="width: 104px; height: 104px;">';

                    // Track Information
                    echo '<br>';

                    $link = 'play.php?track_id=' . urlencode($row['track_id']);
                    echo '<strong><a href="' . $link . '">' . $row['track_title'] . '</a>';
                    echo ' &#8226; ' . $row['track_length'] . '</strong><br>';
                    echo $row['album_name'] . ' &#8226; ' . $row['artist_name'];


                    echo '</td>';
                }
                echo '</tr>';
                echo '</table>';
                echo '</div>';
            }
            // Check 'artist name' set
        } elseif (isset($_GET['artist_name'])) {
            $artistName = $_GET['artist_name'];
            $queryartist = "SELECT DISTINCT artist_name, album.album_date, album.album_name, 
            artist.thumbnail AS artistthumbnail, 
            album.thumbnail AS albumthumbnail 
            FROM artist 
            INNER JOIN album ON artist.artist_id = album.artist_id
            WHERE artist_name = '$artistName'";
            $result = $connection->query($queryartist);

            if ($result->num_rows > 0) {
                echo '<div class="section1">';
                echo '<h1>Artist</h1>';
                echo '<table>';
                echo '<tr>';

                $row = $result->fetch_assoc();
                echo '<td>';
                ?>
                <img src="/twa/thumbs/artists/<?php echo $row["artistthumbnail"] ?>" style="width: 106px; height: 106px;"
                    alt='<?php echo $row["artistthumbnail"] . "thumbnail" ?>'>
                <?php
                echo '<p class="AAnames"><strong>' . $row['artist_name'] . '</strong></p>';
                echo '</td>';

                echo '</tr>';
                echo '</table>';
                echo '</div>';

                echo '<h1>' . $row['artist_name'] . ' Albums</h1>';
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
                    echo '<p class="AAnames"><strong><a href="' . $link . '">' . $row['album_name'] . ' &#8226; ' . $row['album_date'] . '</a></strong></p>';

                    echo '</td>';
                }
                echo '</tr>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<br>';
                echo 'No artist with that name';
                echo '<br>';
            }

            // If statement to display tracks and add them to playlist page
        } elseif (isset($_GET['track_id'])) {
            $trackId = $_GET['track_id'];
            $querytrack = "SELECT DISTINCT album.album_id, artist.artist_id, 
            album.thumbnail AS albumthumbnail, 
            artist_name, album_name, track_title, track_length, spotify_track 
            FROM track 
            INNER JOIN album ON track.album_id = album.album_id 
            INNER JOIN artist ON track.artist_id = artist.artist_id 
            WHERE track_id = '$trackId'";
            $result = $connection->query($querytrack);

            // Display Tracks
            if ($result->num_rows > 0) {
                echo '<div class="section">';
                echo '<h1>Track</h1>';
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
                    echo '<strong>' . $row['track_title'] . ' &#8226; ' . $row['track_length'] . '</strong><br>';
                    echo $row['album_name'] . ' &#8226; ' . $row['artist_name'];
                    echo '</td>';

                    // Iframe
                    echo '<td>';
                    ?>
                    <iframe src='https://open.spotify.com/embed/track/7G5eBJbcCGu6XMBcjRvqK9' width="380" height="380"
                        style="border: none;" allow="encrypted-media">
                    </iframe>
                    <?php
                    echo '</td>';
                    echo '<tr>';
                    if (isset($_SESSION['level'])) {
                        $link = 'playlist.php?track_title=' . urlencode($row['track_title']) . '&track_id=' . $_GET['track_id'];
                        echo '<td colspan="2">'; // Span both columns
                        echo '<p class="AAnames"><a href="' . $link . '"> Add <span style="color: white; font-weight: bold;">' . $row['track_title'] . '</span> to a playlist</a></p>';
                        echo '</td>';
                    }
                    echo '</tr>';

                }
                echo '</table>';
                echo '</div>';
                echo '</div>';


            } else {
                echo '<br>';
                echo 'No track with that name';
                echo '<br>';
            }
            //Display Playlists if Session is set
        } elseif (isset($_GET['playlist_id']) && isset($_SESSION['member_id'])) {
            $memberid = $_SESSION['member_id'];
            $playlistid = $_GET['playlist_id'];
            echo "<a href='playlist.php' style='color: white; font-weight: bold;'>&#8617; Back</a>";
            $queryplaylist = "SELECT DISTINCT playlist_name, memberplaylist.playlist_id, playlist.playlist_id, 
            track.track_title, track.track_length, album.album_name, artist.artist_name, track.track_id, 
                album.thumbnail AS albumthumbnail 
                FROM memberplaylist 
                INNER JOIN playlist ON memberplaylist.playlist_id = playlist.playlist_id 
                INNER JOIN track ON playlist.track_id = track.track_id 
                INNER JOIN album ON track.album_id = album.album_id 
                INNER JOIN artist ON album.artist_id = artist.artist_id 
                WHERE playlist.playlist_id = '$playlistid'";
            $result = $connection->query($queryplaylist);


            if ($result->num_rows > 0) {
                echo '<div class="section1">';
                echo '<h1>Playlist</h1>';

                $row = $result->fetch_assoc();
                echo '<p class="AAnames"><strong>' . $row['playlist_name'] . '</strong></p>';
                echo '<div class="scrollable-section-a">';
                echo '<table>';
                echo '<tr>';

                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    echo '<td>';
                    // Album Image
                    echo '<br>';
                    echo '<img src="/twa/thumbs/albums/' . $row["albumthumbnail"] . '" alt="' . $row["albumthumbnail"] . ' thumbnail" style="width: 104px; height: 104px;">';

                    // Track Information
                    echo '<br>';

                    $link = 'play.php?track_id=' . $row['track_id'];
                    echo '<strong><a href="' . $link . '">' . $row['track_title'] . '</a>';
                    echo ' &#8226; ' . $row['track_length'] . '</strong><br>';
                    echo $row['album_name'] . ' &#8226; ' . $row['artist_name'];


                    echo '</td>';
                }
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                echo '</div>';

            } else {
                echo '<br>';
                $link = 'search.php';
                echo '<br>';
                $link = 'search.php';
                echo '<a href="' . $link . '" style="font-size: 20px; color: white; font-weight: bold;">Add Songs to playlist from Search page</a>';

            }
        } else {
            header('location:index.php');
        }
        ?>
    </main>

    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>

</body>

</html>