<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>Suhu Jawa</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Suhu Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Jawa
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewJawa);
    map.addLayer(t_layer[0]);
    map.addLayer(boundaryJawa);
    </script>
  </body>
</html>
