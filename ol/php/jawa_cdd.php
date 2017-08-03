<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>CDD Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Consecutive Dry Days Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[3]);
    map.addLayer(layer[2]);
    map.addLayer(layer[1]);
    map.addLayer(layer[0]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
