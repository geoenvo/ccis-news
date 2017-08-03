<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>Hujan Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Curah Hujan Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[19]);
    map.addLayer(layer[18]);
    map.addLayer(layer[17]);
    map.addLayer(layer[16]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
