<!DOCTYPE html>
<html lang="en">
<head>
    <title>Knowledge Management PIKU</title>
    <link rel="icon" href="img/logo_BMKG_square.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" href="jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdata.js"></script>
    <link rel="stylesheet" href="css/openmap.css" type="text/css">
    <script src="js/openmap.js"></script>
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
    //$topik = 1;
    //$bahasa = 1;
    $url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset='.$offset;
}else {


    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        $offset = ($page-1)*6;
        $url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset='.$offset;
    }


    if(isset($_POST['topik']) && isset($_POST['bahasa']))
    {
        if($_POST['page'] == null)
        {
            $page = 1;
        }
        else{
            $page = $_POST['page'];
        }

        $topik = $_POST['topik'];
        $bahasa = $_POST['bahasa'];
        $offset = ($page-1)*6;


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

        if($kodebahasa == "all")
        {
            if($topikid == "all")
            {
                $url = 'https://api.ebdesk.com/bmkg/news/?limit=6&offset='.$offset;
            }
            else
            {
                $url = 'https://api.ebdesk.com/bmkg/news/'.$topikid.'?limit=6&offset='.$offset;
            }

        }
        elseif($topikid == "all")
        {
            if($kodebahasa == "all")
            {
                $url = 'https://api.ebdesk.com/bmkg/news/?limit=6&offset='.$offset;
            }
            else
            {
                $url = 'https://api.ebdesk.com/bmkg/news/?language='.$kodebahasa.'&limit=6&offset='.$offset;
            }
        }
        else
        {
            $url = 'https://api.ebdesk.com/bmkg/news/'.$topikid.'?language='.$kodebahasa.'&limit=6&offset='.$offset;
        }
    }

}

//$response = "bmkg.json";
//$media_data = new MediaData($response);
//$url = 'https://api.ebdesk.com/bmkg/news?limit=6&offset='.$offset;
$media_data = new MediaData($url);
$temp = $media_data->getMediaData();
$number_of_data = $media_data->getNumberOfData();

$media_data->getStatisticJsonData('https://api.ebdesk.com/bmkg/statistic?year=2016&month=06');
$tempdata = $media_data->getStatisticData("statistik_monthly.txt","monthly");
$media_data->getStatisticJsonData('https://api.ebdesk.com/bmkg/statistic?year=2016');
$tempdata = $media_data->getStatisticData("statistik_yearly.txt","yearly");
$media_data->getRelatedOrganizationJsonData('https://api.ebdesk.com/bmkg/organization');
$temp_data_organization = $media_data->getRelatedOrganizationData();
$media_data->getMediaShareJsonData('https://api.ebdesk.com/bmkg/media_share');
$temp_media_share = $media_data->getMediaShareData("mediashare.txt");
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
                        <h2 class="hidden-xs" >BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA</h2>
                        <h1 class="visible-xs">BMKG</h1>
                        <strong>Knowledge Management Perubahan Iklim dan Kualitas Udara</strong>

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
                        <li><a href="http://ccis.klimat.bmkg.go.id/ccis/climate-change">Climate Change</a> </li>
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
                        <li><a href="http://ccis.klimat.bmkg.go.id/ccis/events">Events</a> </li>
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

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4">
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
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <?php
                        if($temp[0]->image != null)
                        {
                            echo '<img src="'.$temp[0]->image.'" alt="Chania" width="200" height="200">';
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
                                            if($temp[0]->title != null)
                                            {
                                                echo '<a href="'.$temp[0]->link.'"> <h5>'.$temp[0]->title.'</h5></a>';
                                            }
                                            ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($temp[1]->image != null)
                        {
                            echo '<img src="'.$temp[1]->image.'" alt="Chania" width="200" height="200">';
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
                                            if($temp[1]->title != null)
                                            {
                                                echo '<a href="'.$temp[1]->link.'">'.$temp[1]->title.'</a>';
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
                        if($temp[2]->image != null)
                        {
                            echo '<img src="'.$temp[2]->image.'" alt="Chania" width="200" height="200">';
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
                                            if($temp[2]->title != null)
                                            {
                                                echo '<a href="'.$temp[2]->link.'">'.$temp[2]->title.'</a>';
                                            }
                                            ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($temp[3]->image != null)
                        {
                            echo '<img src="'.$temp[3]->image.'" alt="Chania" width="200" height="200">';
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
                                            if($temp[3]->title != null)
                                            {
                                                echo '<a href="'.$temp[3]->link.'">'.$temp[3]->title.'</a>';
                                            }
                                            ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <?php
                        if($temp[4]->image != null)
                        {
                            echo '<img src="'.$temp[4]->image.'" alt="Chania" width="200" height="200">';
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
                                            if($temp[4]->title != null)
                                            {
                                                echo '<a href="'.$temp[4]->link.'">'.$temp[4]->title.'</a>';
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
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div id='monthlystatistic' style="width: 100%; height: 150px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id='yearlystatistic' style="width: 100%; height: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="padding-top: 10px">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-info">
                    Related Organization
                </div>
                <div class="panel-body">
                     <?php
                        $row_num = $media_data->getDataCount();
                        $media_data->displayOrganization($temp_data_organization);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-info">
                    Climate Change Trending Topic
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-info">
                    Air Quality Trending Topic
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 10px">
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
                                        <li><a class="tablinks active" onclick="OpenMap(event, 'Hujan')">Hujan</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'Suhu')">Suhu</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'CDD')">CDD</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'CWD')">CWD</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'FHL')">FHL</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'HTH')">HTH</a></li>
                                        <li><a class="tablinks" onclick="OpenMap(event, 'r50')">r50</a></li>
                                    </ul>

                                    <div id="Hujan" class="tabcontent" style="display: block;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/hujan.php"></iframe>
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
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=hujan_djf_jaw&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="hujan">
    <option value="http://139.162.55.216/layers/geonode%3Ahujan_djf_jaw">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahujan_mam_jaw">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahujan_jja_jaw">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahujan_son_jaw">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gohujan()" />
    <script type="text/javascript">
    function Gohujan(){
        var geoportal = document.getElementById("hujan");
        var selectedVal = geoportal.options[geoportal.selectedIndex].value;

        window.open(selectedVal)
    }
    </script>
    </span>
                                    </div>

                                    <div id="Suhu" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/suhu.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
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
<select id="suhu">
    <option value="http://139.162.55.216/layers/geonode%3Asuhu_jawa">Suhu Rata-rata</option>
    <option value="http://139.162.55.216/layers/geonode%3Asuhumin_jawa">Suhu Min</option>
    <option value="http://139.162.55.216/layers/geonode%3Asuhumax_jawa">Suhu Max</option>
</select>
<input type="button" value="Go!" onclick="Gosuhu()" />
    <script type="text/javascript">
    function Gosuhu(){
        var geoportal = document.getElementById("suhu");
        var selectedVal = geoportal.options[geoportal.selectedIndex].value;

        window.open(selectedVal)
    }
    </script>
    </span>
                                    </div>

                                    <div id="CDD" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/cdd.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=cdd_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="cdd">
    <option value="http://139.162.55.216/layers/geonode%3Acdd_djf_jawa">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Acdd_mam_jawa">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Acdd_jja_jawa">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Acdd_son_jawa">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gocdd()" />
<script type="text/javascript">
function Gocdd(){
    var geoportal = document.getElementById("cdd");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
}
</script>
    </span>
                                    </div>

                                    <div id="CWD" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/cwd.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=cwd_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="cwd">
    <option value="http://139.162.55.216/layers/geonode%3Acwd_djf_jawa">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Acwd_mam_jawa">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Acwd_jja_jawa">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Acwd_son_jawa">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gocwd()" />
<script type="text/javascript">
function Gocwd(){
    var geoportal = document.getElementById("cwd");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
}
</script>
    </span>
                                    </div>

                                    <div id="FHL" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/fhl.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=fhl_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="fhl">
    <option value="http://139.162.55.216/layers/geonode%3Afhl_djf_jawa">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Afhl_mam_jawa">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Afhl_jja_jawa">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Afhl_son_jawa">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gofhl()" />
<script type="text/javascript">
function Gofhl(){
    var geoportal = document.getElementById("fhl");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
}
</script>
    </span>
                                    </div>

                                    <div id="HTH" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/hth.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=hth_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="hth">
    <option value="http://139.162.55.216/layers/geonode%3Ahth_djf_jawa">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahth_mam_jawa">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahth_jja_jawa">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Ahth_son_jawa">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gohth()" />
<script type="text/javascript">
function Gohth(){
    var geoportal = document.getElementById("hth");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
}
</script>
    </span>
                                    </div>

                                    <div id="r50" class="tabcontent" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="ol/project/r50.php"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row" style="padding-right: 5px">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading text-center text-info">
                                                            Data Legend
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=r50_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <span>
    <br>
<label>Akses via GeoPortal:</label>
<select id="r">
    <option value="http://139.162.55.216/layers/geonode%3Ar50_djf_jawa">Des-Jan-Feb</option>
    <option value="http://139.162.55.216/layers/geonode%3Ar50_mam_jawa">Mar-Apr-Mei</option>
    <option value="http://139.162.55.216/layers/geonode%3Ar50_jja_jawa">Jun-Jul-Agu</option>
    <option value="http://139.162.55.216/layers/geonode%3Ar50_son_jawa">Sep-Okt-Nov</option>
</select>
<input type="button" value="Go!" onclick="Gor()" />
<script type="text/javascript">
function Gor(){
    var geoportal = document.getElementById("r");
    var selectedVal = geoportal.options[geoportal.selectedIndex].value;

    window.open(selectedVal)
}
</script>
    </span>
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

                                        <span class="pull-right">
                                            <form action="index.php#news" method="post">
                                                 Topik : <select name="topik">

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


                                                Bahasa : <select name="bahasa">

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
                                for($counter=1; $counter <= ($number_of_data/3); $counter++)
                                {
                                    $media_data->displayMediaData($counter*3,$temp);

                                    if($number_of_data%3 != 0)
                                    {

                                        $media_data->displayMediaData((intval($number_of_data/3)+1)*3,$temp);
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
    <script src="js/dashboard.js"></script>
    <script>
        jQuery(document).ready(function() {
            GenerateCharts.init();
        });
    </script>
</body>
</html>