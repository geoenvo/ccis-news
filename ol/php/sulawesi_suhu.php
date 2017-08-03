<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>Suhu Sulawesi</title>
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
