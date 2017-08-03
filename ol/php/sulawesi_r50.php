<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>r50 Sulawesi</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Frekuensi Hujan Lebat Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(layer[47]);
    map.addLayer(layer[46]);
    map.addLayer(layer[45]);
    map.addLayer(layer[44]);
    </script>
  </body>
</html>
