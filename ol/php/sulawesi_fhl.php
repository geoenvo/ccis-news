<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>FHL Sulawesi</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Fraksi Hujan Lebat Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(layer[35]);
    map.addLayer(layer[34]);
    map.addLayer(layer[33]);
    map.addLayer(layer[32]);
    </script>
  </body>
</html>
