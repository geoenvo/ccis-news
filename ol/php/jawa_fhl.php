<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>FHL Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Fraksi Hujan Lebat Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[11]);
    map.addLayer(layer[10]);
    map.addLayer(layer[9]);
    map.addLayer(layer[8]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
