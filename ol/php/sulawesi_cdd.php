<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>CDD Sulawesi</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Consecutive Dry Days Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(layer[27]);
    map.addLayer(layer[26]);
    map.addLayer(layer[25]);
    map.addLayer(layer[24]);
    map.addLayer(boundarySulawesi);
    </script>
  </body>
</html>
