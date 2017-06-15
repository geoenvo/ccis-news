<!DOCTYPE html>
<html>
  <head>
    <title>HTH Jawa</title>
    <link rel="stylesheet" href="http://openlayers.org/en/v3.16.0/css/ol.css" type="text/css">
    <link rel="stylesheet" href="../src/ol3-layerswitcher.css" />
    <link rel="stylesheet" href="../src/climate.css" />
    <script src="http://openlayers.org/en/v3.16.0/build/ol.js"></script>
    <script src="../src/ol3-layerswitcher.js"></script>
    <script src="../src/climate.js"></script>
  </head>
  <body>
      <div id="map" class="map">
        <div class="map-title">Proyeksi Perubahan Hari Tanpa Hujan Musiman Periode 2032-2040 terhadap Periode 2006-2014 Pulau Jawa</div>
      </div>

    <script>
      var map = new ol.Map({
          target: 'map',
          view: view,
          layers: [osm, l16, l5, l4, l13, boundary],
          controls: ol.control.defaults({attribution: false}).extend([
            new ol.control.FullScreen(), new ol.control.LayerSwitcher(), new ol.control.ScaleLine()
            ]),
      });
    </script>
  </body>
</html>
