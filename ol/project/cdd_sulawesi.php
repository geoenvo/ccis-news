<!DOCTYPE html>
<html>
  <head>
    <title>CDD Sulawesi</title>
    <link rel="stylesheet" href="http://openlayers.org/en/v3.16.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="../src/ol3-layerswitcher.css" />
    <link rel="stylesheet" href="../src/climate.css" />
    <script src="http://openlayers.org/en/v3.16.0/build/ol.js"></script>
    <script src="../src/ol3-layerswitcher.js"></script>
    <script src="../src/climate_v2.js"></script>
  </head>
  <body>
      <div id="map" class="map">
        <div class="map-title">Proyeksi Perubahan Consecutive Dry Days Periode 2032-2040 terhadap Periode 2006-2014 Pulau Sulawesi</div>
      </div>
    <script>
      var map = new ol.Map({
          target: 'map',
          view: viewSulawesi,
          layers: [osm, layer[27], layer[26], layer[25], layer[24]],
          controls: ol.control.defaults({attribution: false}).extend([
            new ol.control.FullScreen(), new ol.control.LayerSwitcher()
          ]),
      });
    </script>
  </body>
</html>