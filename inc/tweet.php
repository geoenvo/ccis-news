<?php
include 'inc/pgsql.php';
echo '<div class="row">';
echo '<div class="col-md-3">';
echo '<button class="twitter-hashtag-button">#PerubahanIklim</button>';
$x=0;
$y=5;
foreach ($connec->query($sql) as $row) {
    if ($row['categories'] == 'perubahan iklim') {
        echo '<blockquote class="twitter-tweet">';
        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
        echo '/status/'.$row['tweet_id'].'">';
        echo '</a></blockquote>';
        $x++;
        if ($x == $y) {break;}
    }
}
echo '</div>';
echo '<div class="col-md-3">';
echo '<button class="twitter-hashtag-button">#ClimateChange</button>';
$x=0;
foreach ($connec->query($sql) as $row) {
    if ($row['categories'] == 'climate change') {
        echo '<blockquote class="twitter-tweet">';
        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
        echo '/status/'.$row['tweet_id'].'">';
        echo '</a></blockquote>';
        $x++;
        if ($x == $y) {break;}                                        
    }
}
echo '</div>';
echo '<div class="col-md-3">';
echo '<button class="twitter-hashtag-button">#KualitasUdara</button>';
$x=0;
foreach ($connec->query($sql) as $row) {
    if ($row['categories'] == 'kualitas udara') {
        echo '<blockquote class="twitter-tweet">';
        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
        echo '/status/'.$row['tweet_id'].'">';
        echo '</a></blockquote>';
        $x++;
        if ($x == $y) {break;}   
    }
}
echo '</div>';
echo '<div class="col-md-3">';
echo '<button class="twitter-hashtag-button">#ClimateChangeAdaptation</button>';
$x=0;
foreach ($connec->query($sql) as $row) {
    if ($row['categories'] == 'climate change adaptation') {
        echo '<blockquote class="twitter-tweet">';
        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
        echo '/status/'.$row['tweet_id'].'">';
        echo '</a></blockquote>';
        $x++;
        if ($x == $y) {break;}   
    }
}
echo '</div>';
echo '<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
?>
