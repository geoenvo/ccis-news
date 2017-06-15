<!DOCTYPE html>
<html>
  <head>
    <title>Suhu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://openlayers.org/en/master/css/ol.css" />
    <link rel="stylesheet" href="../src/layerswitcher.css" />
    <link rel="stylesheet" href="../src/climate.css" />
    <script type="text/javascript" src="https://openlayers.org/en/master/build/ol.js"></script>
    <script type="text/javascript" src="../src/layerswitcher.js"></script>
    <script type="text/javascript" src="../src/graticule.js"></script>
  </head>
  <body>
      <div id="map" class="map">
        <div class="map-title">Proyeksi Perubahan Suhu Periode 2032-2040 terhadap Periode 2006-2014 Pulau Sulawesi</div>
      </div>
      <script src="../src/climate_v2.js"></script>
      <script>
      map.setView(viewSulawesi);
      map.addLayer(osm);
      map.addLayer(t_layer[4]);
      </script>
  </body>
</html>
