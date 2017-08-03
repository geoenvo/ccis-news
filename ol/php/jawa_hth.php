<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>HTH Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Hari Tanpa Hujan Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(layer[15]);
    map.addLayer(layer[14]);
    map.addLayer(layer[13]);
    map.addLayer(layer[12]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
