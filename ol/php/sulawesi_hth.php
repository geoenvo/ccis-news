<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>HTH Sulawesi</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Hari Tanpa Hujan Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(layer[39]);
    map.addLayer(layer[38]);
    map.addLayer(layer[37]);
    map.addLayer(layer[36]);
    </script>
  </body>
</html>
