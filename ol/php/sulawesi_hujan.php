<!DOCTYPE html>
<html>
  <head>
    <?php require('../inc/header.inc'); ?>
    <title>Hujan Sulawesi</title>
  </head>
  <body>
    <div id="map" class="map">
      <div class="map-title">Proyeksi Perubahan Curah Hujan Periode 2032-2040 terhadap Periode 2006-2014<br>
      Pulau Sulawesi
      </div>
    </div>
    <script src="../js/climate.js"></script>
    <script>
    map.setView(viewSulawesi);
    map.addLayer(layer[43]);
    map.addLayer(layer[42]);
    map.addLayer(layer[41]);
    map.addLayer(layer[40]);
    map.addLayer(boundarySulawesi);
    </script>
  </body>
</html>
