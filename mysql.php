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

$sql = "SELECT title, url, thumbnail, date_str, description FROM open_news_article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="row">';

    $numfields = mysql_num_fields($query);
    echo '<table border="1" bgcolor="white"><tr>';
    for ($i = 0; $i<$numfields; $i += 1) {
        $field = mysql_fetch_field($query, $i);
        echo '<th>' . $field->name . '</th>';
        echo '<div class="col-md-4 portfolio-item">';
        echo '<a href="#">';
        echo '<img src="http://139.162.55.216:8000/open_news/thumbnails_full/?thumbnail='. $field->thumbnail .'" width="350" height="200"  alt="">';
        echo '</a>';
        echo '<h5>';
        echo '<a href="'. $field->url .'">'. $field->title .'</a><br>';
        echo '</h5>';
        echo '<h6>'. $field->date_str .'</h6>';
        echo ''. $field->description .' <br>';
        echo '</div>';
/*
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 portfolio-item">';
        echo '<a href="#">';
        echo '<img src="http://139.162.55.216:8000/open_news/thumbnails_full/?thumbnail='.$row['thumbnail'].'" width="350" height="200"  alt="">';
        echo '</a>';
        echo '<h5>';
        echo '<a href="'.$row['url'].'">'.$row['title'].'</a><br>';
        echo '</h5>';
        echo '<h6>'.$row['date_str'].'</h6>';
        echo ''.$row['description'].' <br>';
        echo '</div>';
*/
    }
    echo '</div>';
    echo '<hr style="color:black;" />';
} else {
    echo "0 results";
}
$conn->close();
?>
