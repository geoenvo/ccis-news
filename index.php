<?php
include('inc/mysql.php');

//for total count data
$countSql = "SELECT COUNT(id) FROM open_news_article WHERE published = 1";  
$tot_result = mysqli_query($conn, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$sql = "SELECT title, url, thumbnail, date_str, description, categories, published FROM open_news_article WHERE published = 1 ORDER BY date_str LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql); 

$site_URL = "http://192.168.1.200";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="img/logo_BMKG_square.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/simplePagination.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Knowledge Management Pusat Informasi Perubahan Iklim</title>
</head>

<body>
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
                    <a class="navbar-brand" href=<?php echo $site_URL ?>>CCIS BMKG</a>
                </div>

                <div class="collapse navbar-collapse" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <li><a href=<?php echo $site_URL ?>>Home</a> </li>
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
                        <li><a href=<?php echo "$site_URL:8001/" ?>>Geoportal</a> </li>
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
                              <?php include('inc/tabmap.inc'); ?>
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
                            </div>
                            <div class="panel-body">
			        		<div class="row" id="target-content">
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
							</div>
                                <nav><ul class="pagination">
								<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
								            if($i == 1):?>
								            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
								            <?php else:?>
								            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
								        <?php endif;?>          
								<?php endfor;endif;?>
                                </ul></nav>
                            </div>
                        </div>
                    </section>
                </div> <!-- THE END OF THE SECOND ROW OF THE MAIN CONTENT-->

                <div class="row">
                    <section id="tweetaggregator">
                        <div class="panel panel-info">
                            <div class="panel-heading text-left">Tweet Aggregator</div>
                            <div class="panel-body">
                            <?php require('inc/tweet.php'); ?>
                            </div>
                        </div>
                    </section>
                </div> <!-- THE END OF THE SECOND ROW OF THE MAIN CONTENT-->
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

    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.simplePagination.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
	    currentPage : 1,
	    onPageClick : function(pageNumber) {
	        jQuery("#target-content").html('<img src="img/loading.gif" >');
	        jQuery("#target-content").load("inc/pagination.php?page=" + pageNumber);
	    }
    });
    });
    </script>
</body>
</html>
