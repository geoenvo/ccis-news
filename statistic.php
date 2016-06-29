<!DOCTYPE html>
<html lang="en">
<head>
    <title>Knowledge Management PIKU</title>
    <link rel="icon" href="img/logo_BMKG_square.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="jqwidgets/jqwidgets/styles/jqx.base.css">
    <script type="text/javascript" src="jqwidgets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="jqwidgets/jqwidgets/jqxdata.js"></script>
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

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div id='monthlystatistic' style="width: 100%; height: 300px;">
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-md-6">
                    <div id='yearlystatistic' style="width: 100%; height: 400px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div id='mediashare' style="width: 100%; height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="padding-top: 10px;">
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

<div style='width:auto;height:auto;'><!-- You may use this wrapping div to restrict the height or width -->
    <script type='text/javascript' charset='utf-8'  src='http://worditout.com/word-cloud/1726496/private/063432a0edd36c23f6c6680f0f9e9094/embed.js'></script>
    <noscript><p style='text-align:center;font-size:xx-small;overflow:auto;height:100%;'><a href='http://worditout.com/word-cloud/1726496/private/063432a0edd36c23f6c6680f0f9e9094' title='Click to go to this word&nbsp;cloud on WordItOut.com'>Untitled word&nbsp;cloud</a><br />Click on the link above to see this word&nbsp;cloud at <a href='http://worditout.com' title='Transform your text into word&nbsp;clouds!'>WordItOut</a>. You may also view it on this website if you enable JavaScript (see your web browser settings).</p></noscript>

</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-info">
                    Air Quality Trending Topic
                </div>
                <div class="panel-body">

<div style='width:auto;height:auto;'><!-- You may use this wrapping div to restrict the height or width -->
    <script type='text/javascript' charset='utf-8'  src='http://worditout.com/word-cloud/1726502/private/13cc7a36c80b0540f9796d4bc896f656/embed.js'></script>
    <noscript><p style='text-align:center;font-size:xx-small;overflow:auto;height:100%;'><a href='http://worditout.com/word-cloud/1726502/private/13cc7a36c80b0540f9796d4bc896f656' title='Click to go to this word&nbsp;cloud on WordItOut.com'>Untitled word&nbsp;cloud</a><br />Click on the link above to see this word&nbsp;cloud at <a href='http://worditout.com' title='Transform your text into word&nbsp;clouds!'>WordItOut</a>. You may also view it on this website if you enable JavaScript (see your web browser settings).</p></noscript>
</div>

                </div>
            </div>
        </div>
    </div>
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