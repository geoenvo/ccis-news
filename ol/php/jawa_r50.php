<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>r50 Jawa</title>
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
