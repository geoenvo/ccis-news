<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>CWD Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Consecutive Wet Days Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[7]);
    map.addLayer(layer[6]);
    map.addLayer(layer[5]);
    map.addLayer(layer[4]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
