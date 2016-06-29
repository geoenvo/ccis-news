<!DOCTYPE html>
<html lang="en">
<head>
    <title>Knowledge Management PIKU</title>
    <link rel="icon" href="img/logo_BMKG_square.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="jqwidgets/jqwidgets/styles/jqx.base.css">
    <link rel="stylesheet" type="text/css" href="css/openmap.css">
    <script type="text/javascript" src="jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="js/openmap.js"></script>
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
    $url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset='.$offset;
    $media_data = new MediaData($url);
    $temp = $media_data->getMediaData();
    $number_of_data = $media_data->getNumberOfData();
}else {


    if(isset($_GET['page']))
    {
        $topikid = "all";
        $page = $_GET['page'];
        $offset = ($page-1)*6;
        $url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset='.$offset;
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
                        <strong style="color: #fff; font-size: 30px">Knowledge Management Perubahan Iklim dan Kualitas Udara</strong>

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
                    <a class="navbar-brand" href="http://193.183.98.127:8002/">CCIS BMKG</a>
                </div>

                <div class="collapse navbar-collapse" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <li><a href="http://193.183.98.127:8002/">Home</a> </li>
                        <li><a href="http://ccis.klimat.bmkg.go.id/ccis/news">News</a> </li>
                        <li class="dropdown"><a href="http://ccis.klimat.bmkg.go.id/ccis/map" class="dropdown-toggle" data-toggle="dropdown">Map<b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <li><a href="http://ccis.klimat.bmkg.go.id/ccis/content/cdd-cwd-rainfall">CDD, CWD & Rainfall</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/ccis/content/normal-climate-value-calculation">Normal Climate Value Calculation</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/ccis/rainfall-prediction">Rainfall Prediction</a> </li>
                                <li><a href="http://ccis.klimat.bmkg.go.id/ccis/temperature-differences">Temperature Differences</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="http://ccis.klimat.bmkg.go.id/ccis/dashboard" class="dropdown-toggle" data-toggle="dropdown">Dashboard<b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <li><a href="http://ccis.klimat.bmkg.go.id/ccis/content/climate-indices-definitions">Climate Indice Definition</a> </li>
                            </ul>
                        </li>
                        <li><a href="http://ccis.klimat.bmkg.go.id/ccis/about">About</a> </li>
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
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <?php
                    $url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset=0';
                    $carousel_news = new CarouselData($url);
                    $news_carousel = $carousel_news->getMediaData();
                ?>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <?php
                        if($news_carousel[0]->image != null)
                        {
                            echo '<img src="'.$news_carousel[0]->image.'" alt="Chania" width="200" height="200">';
                        }
                        else
                        {
                            echo '<img src="img/slider-default.jpg" alt="Chania">';
                        }
                        ?>

                        <div class="carousel-dashboard">
                            <div class="row">
                                <div class="col-md-4" style="height: auto;width: 100%;padding-top: 2%">

                                    <?php
                                    if($news_carousel[0]->title != null)
                                    {
                                        echo '<a href="'.$news_carousel[0]->link.'"> <h5>'.$news_carousel[0]->title.'</h5></a>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($news_carousel[1]->image != null)
                        {
                            echo '<img src="'.$news_carousel[1]->image.'" alt="Chania" width="200" height="200">';
                        }
                        else
                        {
                            echo '<img src="img/slider-default.jpg" alt="Chania">';
                        }
                        ?>
                        <div class="carousel-dashboard">
                            <div class="row">
                                <div class="col-md-4" style="height: auto;width: 100%;padding-top: 2%">

                                    <?php
                                    if($news_carousel[1]->title != null)
                                    {
                                        echo '<a href="'.$news_carousel[1]->link.'">'.$news_carousel[1]->title.'</a>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption">
                            <div class="">
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($news_carousel[2]->image != null)
                        {
                            echo '<img src="'.$news_carousel[2]->image.'" alt="Chania" width="200" height="200">';
                        }
                        else
                        {
                            echo '<img src="img/slider-default.jpg" alt="Chania">';
                        }
                        ?>
                        <div class="carousel-caption">

                        </div>
                        <div class="carousel-dashboard">
                            <div class="row">
                                <div class="col-md-4" style="height: auto;width: 100%;padding-top: 2%">

                                    <?php
                                    if($news_carousel[2]->title != null)
                                    {
                                        echo '<a href="'.$news_carousel[2]->link.'">'.$news_carousel[2]->title.'</a>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($news_carousel[3]->image != null)
                        {
                            echo '<img src="'.$news_carousel[3]->image.'" alt="Chania" width="200" height="200">';
                        }
                        else
                        {
                            echo '<img src="img/slider-default.jpg" alt="Chania">';
                        }
                        ?>
                        <div class="carousel-caption">

                        </div>
                        <div class="carousel-dashboard">
                            <div class="row">
                                <div class="col-md-4" style="height: auto;width: 100%;padding-top: 2%">
                                    <?php
                                    if($news_carousel[3]->title != null)
                                    {
                                        echo '<a href="'.$news_carousel[3]->link.'">'.$news_carousel[3]->title.'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($news_carousel[4]->image != null)
                        {
                            echo '<img src="'.$news_carousel[4]->image.'" alt="Chania" width="200" height="200">';
                        }
                        else
                        {
                            echo '<img src="img/slider-default.jpg" alt="Chania">';
                        }
                        ?>
                        <div class="carousel-caption">

                        </div>
                        <div class="carousel-dashboard">
                            <div class="row">
                                <div class="col-md-4" style="height: auto;width: 100%;padding-top: 2%">
                                    <?php
                                    if($news_carousel[4]->title != null)
                                    {
                                        echo '<a href="'.$news_carousel[4]->link.'">'.$news_carousel[4]->title.'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous
                </a>
                <a class="carousel-control nextButton" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div id='mediashare' style="width: 100%; height: 297px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="margin-top: 10px; padding-right: 16px">
        <a href="statistic.php" class="btn btn-info pull-right">More Statistic</a>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-info">
                    Related Organization
                </div>
                <div class="panel-body">
                     <?php
                        $row_num = $statistic->getDataCount();
                         $statistic->displayOrganization($temp_data_organization);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

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
<ul class="tab" style="cursor:pointer">
  <li><a class="tablinks active" onclick="OpenMap(event, 'suhu')">Suhu</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'hujan')">Hujan</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'cdd')">CDD</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'cwd')">CWD</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'fhl')">FHL</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'hth')">HTH</a></li>
  <li><a class="tablinks" onclick="OpenMap(event, 'r50')">r50</a></li>
</ul>

<div id="suhu" class="tabcontent" style="display: block;">
    <div class="row">
        <div class="col-md-9">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/suhu.php"></iframe>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row" style="padding-right: 5px">
                <div class="panel panel-info">
                    <div class="panel-heading text-center text-info">
                        Legenda
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=suhu_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="selectsuhu">
    <option value="http://139.162.55.216/layers/geonode%3Asuhu_jawa">Rata-rata</option>
    <option value="http://139.162.55.216/layers/geonode%3Asuhumin_jawa">Minimum</option>
    <option value="http://139.162.55.216/layers/geonode%3Asuhumax_jawa">Maximum</option>
    <option value="http://139.162.55.216/layers/geonode%3Adiurnal_jawa">Diurnal</option>
</select>
<input type="button" class="btn btn-info" value="Go" onclick="Gosuhu()" />
    <script type="text/javascript">
    function Gosuhu(){
    var geoportal = document.getElementById("selectsuhu");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
    }
    </script>
    </span>
</div>

<?php 
$climate = array("hujan", "cdd", "cwd", "fhl", "hth", "r50"); 

foreach ($climate as $value) {

echo "<div id=$value ";
echo 'class="tabcontent" style="display: none;">';
echo '<div class="row">';
echo '<div class="col-md-9">';
echo '<div class="embed-responsive embed-responsive-16by9">';
echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/';
echo "$value";
echo '.php"></iframe>';
echo '</div>';
echo '</div>';
echo '<div class="col-md-3">';
echo '<div class="row" style="padding-right: 5px">';
echo '<div class="panel panel-info">';
echo '<div class="panel-heading text-center text-info">';
echo 'Legenda';
echo '</div>';
echo '<div class="panel-body">';
echo '<div class="row">';
echo '<img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=';
echo "$value";
echo '_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">';
echo '                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="select';
echo "$value";
echo '">';
echo '<option value="http://139.162.55.216/layers/geonode%3A';
echo "$value";
echo '_djf_jawa">Des-Jan-Feb</option>';
echo '<option value="http://139.162.55.216/layers/geonode%3A';
echo "$value";
echo '_mam_jawa">Mar-Apr-Mei</option>';
echo '<option value="http://139.162.55.216/layers/geonode%3A';
echo "$value";
echo '_jja_jawa">Jun-Jul-Agu</option>';
echo '<option value="http://139.162.55.216/layers/geonode%3A';
echo "$value";
echo '_son_jawa">Sep-Okt-Nov</option>';
echo '</select>
<input type="button" class="btn btn-info" value="Go" onclick="Go';
echo "$value";
echo '()" />
    <script type="text/javascript">
    function Go';
echo "$value";
echo '(){';
echo '
        var geoportal = document.getElementById("select';
echo "$value";
echo '");';
echo '
        var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
    }
    </script>
    </span>
</div>';

}
?>

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

                                        <span class="pull-right">
                                            <form action="index.php#news" method="post">
                                                 Topik: <select name="topik">

                                                            <?php
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
                                                            ?>

                                                        </select>
                                                        <input type="text" name="page" hidden="hidden" value= <?=$page ;?> >
                                                <input class="btn btn-info" type="submit" value="Go"/>
                                            </form>
                                        </span>


                            </div>
                            <div class="panel-body">

                                <?php
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
                                            $news->displayMediaData($temp, $topik,$number_of_data,$counter*3);
                                        }
                                    }else{
                                        for($counter=1; $counter <= ($number_of_data/3); $counter++)
                                        {
                                            $news->displayMediaData($temp, $topik,$number_of_data,$counter*3);

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
                                ?>

                            </div>
                        </div>
                    </section>
                </div> <!-- THE END OF THE SECOND ROW OF THE MAIN CONTENT-->

                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            <?php

                            echo '<li>';
                            echo '<a href="http://193.183.98.127:8002/index.php?page='.($page-1).'#news">&laquo;</a>';
                            echo '</li>';


                            $maxindex = $page + 5;
                            for($index = $page; $index < $maxindex; $index++)
                            {
                                if($index == $page)
                                {
                                    echo '<li class="active">';
                                    echo '<a href="http://193.183.98.127:8002/index.php?page='.$index.'#news">'.$index.'</a>';
                                    echo '</li>';
                                }else{
                                    echo '<li>';
                                    echo '<a href="http://193.183.98.127:8002/index.php?page='.$index.'#news">'.$index.'</a>';
                                    echo '</li>';
                                }

                            }

                            echo '<li>';
                            echo '<a href="http://193.183.98.127:8002/index.php?page='.($page+1).'#news">&raquo;</a>';
                            echo '</li>';

                            ?>
                        </ul>
                    </div>
                </div> <!-- THE END OF THE SECOND ROW OF THE PAGINATION-->
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

    <script src="js/bootstrap.js"></script>
    <script src="js/mediashare.js"></script>
    <script src="js/autorefresh.js"></script>
    <script>
        jQuery(document).ready(function() {
           MediaShareCharts.init();
           AutoRefresh.init();
        });
    </script>
</body>
</html>