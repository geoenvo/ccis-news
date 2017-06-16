<?php
$servername = "localhost";
$username = "dds_readonly";
$password = "ddsreadonlyp455w0rd";
$dbname = "dds";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT title, url, thumbnail, date_str, description, categories, published FROM open_news_article WHERE published = 1";
$result = $conn->query($sql);
?>