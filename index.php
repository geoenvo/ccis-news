<!DOCTYPE html>
<html lang="en">
<head>
    <title>Knowledge Management Pusat Informasi Perubahan Iklim</title>
    <link rel="icon" href="img/logo_BMKG_square.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="jqwidgets/jqwidgets/styles/jqx.base.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php

    require 'datastorage.php';
    $count = 0;

    $page = 1;

    if ((!isset($_GET) || empty($_GET)) && (!isset($_POST) || empty($_POST)))
{
    $page = 1;
    $offset = 0;
    $topikid = "all";
    //$bahasa = 1;
    $url = 'dummy2.json';
    $media_data = new MediaData($url);
    $temp = $media_data->getMediaData();
    $number_of_data = $media_data->getNumberOfData();
}else {


    if(isset($_GET['page']))
    {
        $topikid = "all";
        $page = $_GET['page'];
        $offset = ($page-1)*6;
        $url = 'dummy2.json';
        $media_data = new MediaData($url);
        $temp = $media_data->getMediaData();
        $number_of_data = $media_data->getNumberOfData();
    }


    if(isset($_POST['topik']) && isset($_POST['bahasa']))
    {

        $topik = $_POST['topik'];
        $bahasa = $_POST['bahasa'];
        $page = $_POST['page'];
        //$offset = ($page-1)*6;


        if($bahasa == 1)
        {
            $kodebahasa = "id";

        }elseif($bahasa == 2)
        {
            $kodebahasa = "en";

        }
        else
        {
            $kodebahasa="all";
        }

        if($topik == 1)
        {
            $topikid = "10750";
            //$url = 'https://api.ebdesk.com/bmkg/news/10750?language='.$kodebahasa.'&limit=6&offset='.$offset;

        }elseif($topik == 2)
        {
            $topikid = "11097";
            //$url ='https://api.ebdesk.com/bmkg/news/11097?limit=5&offset=6&languange='.$kodebahasa;

        }
        else
        {
            $topikid="all";
        }

        $news = new News("cache.json");
        $temp = $news->getMediaData($topikid, $kodebahasa);

    }

}

$statistic = new StatisticChart();
$statistic->getStatisticJsonData('https://api.ebdesk.com/bmkg/statistic?year=2016&month=06');
$tempdata = $statistic->getStatisticData("statistik_monthly.txt","monthly");
$statistic->getStatisticJsonData('https://api.ebdesk.com/bmkg/statistic?year=2016');
$tempdata = $statistic->getStatisticData("statistik_yearly.txt","yearly");
$statistic->getRelatedOrganizationJsonData('https://api.ebdesk.com/bmkg/organization');
$temp_data_organization = $statistic->getRelatedOrganizationData();
$statistic->getMediaShareJsonData('https://api.ebdesk.com/bmkg/media_share');
$temp_media_share = $statistic->getMediaShareData("mediashare.txt");

?>

<header>
    <div class="container";>
        <div class="topbar topbar-default topbar-fixed-top" role="navigation">
            <div class="container ft12">
                <div class="topbar-collapse collapse"></div>
            </div>
        </div>
        <div class="page-header hidden-xs">
            <div>
                <div class="row">
                    <div class="col-md-1" style="padding-top: 1%">
                        <a href=""><img src="img/logo_BMKG.png" alt="BMKG" title="" width="55"></a>
                    </div>
                    <div class="col-md-10" style="padding-right: 0px">
                        <h2 class="hidden-xs" style="color: #fff; font-size: 16px">BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA</h2>
                        <h1 style="color: #fff; font-size: 16px" class="visible-xs">BMKG</h1>
                        <strong style="color: #fff; font-size: 30px">Knowledge Management Pusat Informasi Perubahan Iklim</strong>

                    </div>


                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="navbar navbar-default" style="background-color: window">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://139.162.55.216:8001/">CCIS BMKG</a>
                </div>

                <div class="collapse navbar-collapse" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <li><a href="http://139.162.55.216:8001/">Home</a> </li>
                        <li><a href="http://ccis.klimat.bmkg.go.id/news">News</a> </li>
                        <li class="dropdown"><a href="http://ccis.klimat.bmkg.go.id/map" class="dropdown-toggle" data-toggle="dropdown">Map<b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <li><a href="http://ccis.klimat.bmkg.go.id/content/cdd-cwd-rainfall">CDD, CWD & Rainfall</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/content/normal-climate-value-calculation">Normal Climate Value Calculation</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/rainfall-prediction">Rainfall Prediction</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/temperature-differences">Temperature Differences</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="http://ccis.klimat.bmkg.go.id/dashboard" class="dropdown-toggle" data-toggle="dropdown">Dashboard<b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <li><a href="http://ccis.klimat.bmkg.go.id/content/climate-indices-definitions">Climate Indice Definition</a> </li>
                            </ul>
                        </li>
                        <li><a href="http://ccis.klimat.bmkg.go.id/about">About</a> </li>
                        <li><a href="http://139.162.55.216/">Geoportal</a> </li>
                    </ul>
                    <form class="navbar-form pull-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<div style="margin-top: 20px">
<div class="row">    
    <div class="container">
        <div class="col-md-12">                         
            <div class="row" >
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px">
                    <section id="petaproyeksi">
                        <div class="panel panel-info">
                            <div class="panel-heading text-left text-info">
                                Data Proyeksi Iklim 
                            </div>
                            <div class="panel-body">
                              <?php require('includes/tabmap.inc'); ?>
                                <div class="col-md-9">
                                  <div class="row" style="margin: 5px 10px">
                                    <div class="panel panel-info">
                                      <div class="panel-heading text-center text-info">Keterangan</div>
                                      <div class="panel-body">
                                        <div class="row">
                                          <p style="margin: 10px 20px; text-align:justify">Dalam proses pembuatan peta proyeksi iklim ini, digunakan metode Dynamical Downscaling menggunakan RCM (Regional Climate Model) Weather Research and Forecasting (WRF) v3.6. Skenario Emisi RCP(Representative Concentration Pathway) yang digunakan adalah RCP 4.5 (menengah-rendah). Data GCM berjenis MIROC5 yang bersumber dari Tokyo University, NIES dan JAMSTEC, digunakan sebagai initial dan boundary condition untuk simulasi proses downscaling.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!--div class="col-md-3">
    								  <input type="button" class="btn btn-info" value="Download PDF" onclick="Gosuhu()" />
    								  <select id="selectsuhu">
    								    <option value="http://139.162.55.216:8001/files/jawa/cdd.zip">cdd</option>
    								    <option selected="selected" value="http://139.162.55.216/layers/geonode%3Asuhumin_jawa">Minimum</option>
    								    <option value="http://139.162.55.216/layers/geonode%3Asuhumax_jawa">Maximum</option>
    								    <option value="http://139.162.55.216/layers/geonode%3Adiurnal_jawa">Diurnal</option>
    								  </select>
    								  <script type="text/javascript">
    								  function Gosuhu(){
    								  var geoportal = document.getElementById("selectsuhu");
    								  var selectedVal = geoportal.options[geoportal.selectedIndex].value;
    								  window.open(selectedVal)
    								  }
    								  </script>
                                  </div-->

                                </div>
                            </div> 
                        </div>
                    </section>
                </div>
            </div><!-- THE END OF THE FIRST ROW OF THE LEFT SIDE BAR-->
                <div class="row">
                    <section id="news">
                        <div class="panel panel-info">
                            <div class="panel-heading text-left">
                                Headline Hari Ini

                                		<!--
                                        <span class="pull-right">
                                            <form action="index.php#news" method="post">
                                                 Topik: <select name="topik">

                                                            <?php
                                                            /*
                                                            $topik = array("","Perubahan Iklim","Kualitas Udara");
                                                            for ($i = 0; $i < 3; $i++)
                                                            {
                                                                ?>
                                                                <option value="<?=$i ;?>" <? if ($topik == $i) { echo ' selected="selected"';}?><?= $topik[$i];?></option>

                                                                <?php
                                                            }
                                                            ?>

                                                        </select>


                                                Bahasa: <select name="bahasa">

                                                            <?php
                                                            $bahasa = array("","Indonesia","English");
                                                            for ($i = 0; $i < 3; $i++)
                                                            {
                                                                ?>
                                                                <option value="<?=$i ;?>" <? if ($bahasa == $i) { echo ' selected="selected"';}?><?= $bahasa[$i];?></option>

                                                                <?php
                                                            }
                                                            */
                                                            ?>

                                                        </select>
                                                        <input type="text" name="page" hidden="hidden" value= <?=$page ;?> >
                                                <input class="btn btn-info" type="submit" value="Go"/>
                                            </form>
                                        </span>
                                        -->


                            </div>
                            <div class="panel-body">

								<?php
                                require 'mysql.php';
								if ($result->num_rows > 0) {
								    echo '<div class="row">';
								    while($row = $result->fetch_assoc()) {
								    	if ($row['thumbnail']) {
								        	echo '<div class="col-md-4 portfolio-item">';
								        	echo '<a href="'.$row['url'].'" target="_blank">';
								        	echo '<img src="http://139.162.55.216:8000/open_news/thumbnails_full/?thumbnail='.$row['thumbnail'].'" width="350" height="200"  alt="">';
								        	echo '</a>';
								        	echo '<h5>';
								        	echo '<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a><br>';
								        	echo '</h5>';
								        	echo '<h6>'.$row['date_str'].'</h6>';
								        	echo ''.$row['description'].' <br>';
								        	echo '</div>';
								        }
								        else {
										}
								    }
								    echo '</div>';
								    echo '<hr style="color:black;" />';
								} else {
								    echo "0 results";
								}
								$conn->close();
								?>

                                <?php
                                /*
                                    if(isset($_POST['topik']))
                                {
                                    if($topikid == "10750")
                                    {
                                        $topik = "Perubahan Iklim";
                                    }
                                    else
                                    {
                                        $topik = "Kualitas Udara";
                                    }
                                    $number_of_data = $news->getNumberOfData($topikid,$kodebahasa);
                                    //$news->displayMediaData($temp, $topik,$number_of_data);
                                    if($number_of_data < 3)
                                    {
                                        for($counter =1; $counter <= $number_of_data; $counter++)
                                        {
                                            $news->displayMediaData($temp, $topik, $number_of_data, $counter*3);
                                        }
                                    }else{
                                        for($counter=1; $counter <= ($number_of_data/3); $counter++)
                                        {
                                            $news->displayMediaData($temp, $topik, $number_of_data, $counter*3);

                                            if($number_of_data%3 != 0)
                                            {

                                                $news->displayMediaData($temp, $topik,$number_of_data,(intval($number_of_data/3)+1)*3);
                                            }
                                        }
                                    }

                                }
                                else{
                                    for($counter=1; $counter <= ($number_of_data/3); $counter++)
                                    {
                                        $media_data->displayMediaData($counter*3,$temp);

                                        if($number_of_data%3 != 0)
                                        {

                                            $media_data->displayMediaData((intval($number_of_data/3)+1)*3,$temp);
                                        }
                                    }
                                }
                                */
                                ?>

                            </div>
                        </div>
                    </section>
                </div> <!-- THE END OF THE SECOND ROW OF THE MAIN CONTENT-->

                <div class="row">
                    <section id="tweetaggregator">
                        <div class="panel panel-info">
                            <div class="panel-heading text-left">Tweet Aggregator</div>
                            <div class="panel-body" style="align-items: justify">
                                <?php
                                require 'pgsql.php';
                                echo '<div class="row">';
                                echo '<div class="col-md-3">';
                                echo '<button class="twitter-hashtag-button">#PerubahanIklim</button>';
                                $row = $connec->query($sql);
                                for ($row = 0; $row <= 10; $row++) {
                                    if ($row['categories'] == 'perubahan iklim') {
                                        echo '<blockquote class="twitter-tweet">';
                                        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
                                        echo '/status/'.$row['tweet_id'].'';
                                        echo '"';
                                        echo 'width="220"';
                                        echo '>';
                                        echo '</a></blockquote>';
                                    }
                                }
                                echo '</div>';
                                echo '<div class="col-md-3">';
                                echo '<button class="twitter-hashtag-button">#ClimateChange</button>';
                                $row = $connec->query($sql);
                                for ($row = 0; $row <= 10; $row++) {
                                    if ($row['categories'] == 'climate change') {
                                        echo '<blockquote class="twitter-tweet">';
                                        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
                                        echo '/status/'.$row['tweet_id'].'';
                                        echo '"';
                                        echo 'width="220"';
                                        echo '>';
                                        echo '</a></blockquote>';
                                    }
                                }
                                echo '</div>';
                                echo '<div class="col-md-3">';
                                echo '<button class="twitter-hashtag-button">#KualitasUdara</button>';
                                $row = $connec->query($sql);
                                for ($row = 0; $row <= 10; $row++) {
                                    if ($row['categories'] == 'kualitas udara') {
                                        echo '<blockquote class="twitter-tweet">';
                                        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
                                        echo '/status/'.$row['tweet_id'].'';
                                        echo '"';
                                        echo 'width="220"';
                                        echo '>';
                                        echo '</a></blockquote>';
                                    }
                                }
                                echo '</div>';
                                echo '<div class="col-md-3">';
                                echo '<button class="twitter-hashtag-button">#ClimateChangeAdaptation</button>';
                                $row = $connec->query($sql);
                                for ($row = 0; $row <= 10; $row++) {
                                    if ($row['categories'] == 'climate change adaptation') {
                                        echo '<blockquote class="twitter-tweet">';
                                        echo '<a href="https://twitter.com/'.$row['user_screen_name'].'';
                                        echo '/status/'.$row['tweet_id'].'';
                                        echo '"';
                                        echo 'width="220"';
                                        echo '>';
                                        echo '</a></blockquote>';
                                    }
                                }
                                echo '</div>';
                                echo '<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
                                ?>
                                <!--
                                <a class="twitter-timeline"
                                href="https://twitter.com/TwitterDev"
                                data-width="300"
                                data-height="300"
                                data-tweet-limit="5">
                                #kualitasudara
                                </a>
                                -->
                            </div>
                        </div>
                    </section>
                </div> <!-- THE END OF THE SECOND ROW OF THE MAIN CONTENT-->

                <!--
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            <?php
                            /*
                            echo '<li>';
                            echo '<a href="http://139.162.55.216:8001/index.php?page='.($page-1).'#news">&laquo;</a>';
                            echo '</li>';


                            $maxindex = $page + 5;
                            for($index = $page; $index < $maxindex; $index++)
                            {
                                if($index == $page)
                                {
                                    echo '<li class="active">';
                                    echo '<a href="http://139.162.55.216:8001/index.php?page='.$index.'#news">'.$index.'</a>';
                                    echo '</li>';
                                }else{
                                    echo '<li>';
                                    echo '<a href="http://139.162.55.216:8001/index.php?page='.$index.'#news">'.$index.'</a>';
                                    echo '</li>';
                                }

                            }

                            echo '<li>';
                            echo '<a href="http://139.162.55.216:8001/index.php?page='.($page+1).'#news">&raquo;</a>';
                            echo '</li>';
                            */
                            ?>
                        </ul>
                    </div>
                </div>--> <!-- THE END OF THE SECOND ROW OF THE PAGINATION-->
            </div>
        </div>
    </div>  <!-- THE END OF THE FIRST ROW -->

</div>


<footer>
    <div class="panel panel-danger" >
        <div class="panel-heading text-center">
            <ul class="list-inline">
                <li><a href="https://www.facebook.com/pages/Climability/399667536823023" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.twitter.com/climability" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://plus.google.com/109431579820251565186/posts" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

    <script type="text/javascript" src="jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/mediashare.js"></script>
</body>
</html>
