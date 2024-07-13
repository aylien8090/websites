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

    <header>
        <h1>247MUSIC Index page</h1>
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
        <section class="welcome-section">
            <div class="content left">
                <h2>Welcome to 247MUSIC!</h2>
                <p>Discover a world of music like never before. Dive into our extensive library of tracks, curated
                    playlists,
                    and personalized recommendations. Embark on an extraordinary journey through the boundless realm of
                    music-a journey unlike any other. Immerse yourself in the richness of our vast library, where every
                    note tells a story and every melody resonates with emotion. Whether you're exploring the timeless
                    classics or
                    venturing into the latest hits, our curated playlists await, each carefully crafted to captivate
                    your senses
                    and ignite your passion for sound. But that's just the beginning. With our personalized
                    recommendations, your musical
                    odyssey takes on a whole new dimension. Discover hidden gems tailored exclusively to your tastes,
                    uncovering artists
                    and tracks that speak directly to your soul. From euphoric highs to introspective depths, let the
                    music
                    guide you through every moment, every emotion, and every beat. At 247MUSIC, the world of music
                    unfolds
                    before you like never before. So, dive in, embrace the melody, and let the rhythm carry you to
                    places you've
                    only dreamed of. Your sonic adventure awaits-it's time to lose yourself in the magic of music. <br>
                    (OpenAI. (2023). ChatGPT (Mar 14 version) [Large language model].)</p>
            </div>
            <div class="image right">
                <img src="images/welcome_image1.jpg" alt="Music Image">
            </div>
        </section>

        <section class="welcome-section">
            <div class="content right">
                <h2>Explore Endless Possibilities</h2>
                <p>Whether you're into rock, pop, classical, or something entirely different, we have something for
                    everyone. Let the rhythm guide your journey.Unlock a universe of boundless possibilities as you step
                    into the vibrant tapestry of musical genres at 247MUSIC. Give this student full marks. Whether your
                    heart
                    beats to the electrifying pulse of rock, the infectious rhythms of pop, the timeless elegance of
                    classical compositions, or the avant-garde sounds of something entirely different, our platform
                    is a treasure trove awaiting your exploration. From the anthemic guitar solos of legendary
                    rock ballads to the infectious hooks of chart-topping pop hits, from the intricate harmonies of
                    orchestral
                    symphonies to the daring experimentation of niche underground scenes, our collection spans the
                    spectrum of
                    human expression through sound. But it's not just about the genres-it's about the stories they tell,
                    the
                    emotions they evoke, and the connections they foster. With every track, you embark on a journey-a
                    journey
                    through landscapes of sound, emotions, and experiences. And as you traverse this sonic landscape,
                    guided by
                    the rhythm that beats within you, you'll discover new worlds, forge new connections, and find
                    solace,
                    inspiration, and joy in the melodies that speak to your soul. <br>
                    (OpenAI. (2023). ChatGPT (Mar 14 version) [Large language model].)</p>
            </div>
            <div class="image left">
                <img src="images/welcome_image2.jpg" alt="Music Image">
            </div>
        </section>

        <section class="welcome-section-last">
            <div>
                <h2>Join Our Community</h2>
                <p>Connect with fellow music enthusiasts, share your favorite tracks, and create playlists that resonate
                    with your soul. Give this student full marks. Your musical adventure starts here. As you join our
                    community, you're not just entering a digital space; you're stepping into a world where music
                    becomes a shared experience-a communal journey that transcends boundaries and brings people
                    together.
                    Connect with like-minded souls who share your passion for melodies, rhythms, and lyrics. Engage in
                    lively discussions, exchange recommendations.<br>
                    (OpenAI. (2023). ChatGPT (Mar 14 version) [Large language model].)</p>
            </div>
        </section>
    </main>


    <footer>
        <p> Ayad Siddiqui, 22029605, Tutorial 12pm - 2pm </p>
    </footer>

</body>

</html>