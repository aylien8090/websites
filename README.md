# 24/7Music Web Application Project

## Project Overview

This project is part of Web Applications course. The objective is to create a web-based music streaming application similar to Spotify, named 24/7Music. The application allows both members and non-members to search for and view lists of songs, artists, and albums, as well as play short samples of selected songs. Additionally, members can create playlists of their favorite songs.

## Features

- **Search Functionality:** Allows users to search for songs, artists, and albums.
- **View Lists:** Users can view lists of songs, artists, and albums.
- **Play Samples:** Users can play short samples of selected songs.
- **Create Playlists:** Members can create playlists of their favorite songs.

## Technologies Used

- **HTML5:** For structuring the web pages.
- **CSS:** For styling the web pages.
- **JavaScript:** For client-side scripting and form validation.
- **PHP:** For server-side scripting and database interaction.
- **MySQL:** For database management.
- **GitHub & Git Bash:** For version control and collaborative development.
- **Linux Terminal:** For efficient data handling and processing.

## Security Measures

- **Input Validation:** Ensures that all user inputs are validated to prevent SQL injection attacks.
- **Password Encryption:** User passwords are encrypted using the SHA-256 algorithm.
- **Session Management:** Manages user sessions securely to prevent unauthorized access.

## Project Structure

The project is organized into the following main pages:

1. **Index Page (index.php):** 
   - Welcome message.
   - Navigation bar with links to other pages.
   - Displays member username and membership category if logged in.

2. **Search Page (search.php):**
   - Navigation bar with login/logout links.
   - Search form for albums, artists, and songs.
   - Displays search results with links to detailed views.

3. **Play Page (play.php):**
   - Displays content based on the selected match (artist, album, song, or playlist).
   - Allows playing short song samples using Spotify iframe.

4. **Playlist Page (playlist.php):**
   - Allows logged-in members to create and manage playlists.
   - Displays lists of playlists and songs in playlists.

5. **Login Page (login.php):**
   - Login form for members.
   - Redirects to the search page upon successful login.

6. **Logout Page (logout.php):**
   - Logs the member off and redirects to the search page.

## Database

- The application uses a MySQL database named `247Music`.
- Tables include `albums`, `artists`, `songs`, `members`, and `playlists`.
- Sample data is pre-populated in the database for testing purposes.

## Setup Instructions

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/aylien8090/R-Code-project.git
   cd R-Code-project
