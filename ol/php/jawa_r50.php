<!DOCTYPE html>
<html>
  <head>
    <title>r50 Jawa</title>
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
      <div class="map-title">Proyeksi Perubahan Frekuensi Hujan Lebat Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[23]);
    map.addLayer(layer[22]);
    map.addLayer(layer[21]);
    map.addLayer(layer[20]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
