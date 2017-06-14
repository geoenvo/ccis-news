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

$sql = "SELECT title, url, thumbnail, date_str FROM open_news_article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['url']."</td>";
        echo "<td>".$row['thumbnail']."</td>";
        echo "<td>".$row['date_str']."</td>";   
        echo "</tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
