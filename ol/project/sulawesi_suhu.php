<!DOCTYPE html>
<html>
  <head>
    <title>Suhu Sulawesi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/ol.css" />
    <link rel="stylesheet" href="../css/layerswitcher.css" />
    <link rel="stylesheet" href="../css/climate.css" />
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../js/ol.js"></script>
    <script type="text/javascript" src="../js/layerswitcher.js"></script>
    <script type="text/javascript" src="../js/graticule.js"></script>
    <script type="text/javascript" src="../js/compass.js"></script>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Suhu Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(t_layer[4]);
    </script>
  </body>
</html>
