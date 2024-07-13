<?php
//get vars
session_start();
//destroy vars
session_destroy();
//take back to home page
header("Location: search.php");