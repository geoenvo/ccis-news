<?php
include('mysql.php');

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT title, url, thumbnail, date_str, description, categories, published FROM open_news_article WHERE published = 1 ORDER BY date_str LIMIT $start_from, $limit";
$rs_result = mysqli_query($conn, $sql); 
?>

<?php
  while ($row = $rs_result->fetch_assoc()) {
    echo '<div class="col-md-4 portfolio-item">';
    echo '<a href="'.$row['url'].'" target="_blank">';
    echo '<img src="'.$site_URL.':8000/open_news/thumbnails_full/?thumbnail='.$row['thumbnail'].'" width="350" height="200"  alt=""></a>';
    echo '<h5><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a><br></h5>';
    echo '<h6>'.$row['date_str'].'</h6>';
    echo '<div>'.$row['description'].'</div>';
    echo '</div>';
  };
?>
