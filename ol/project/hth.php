<!DOCTYPE html>
<html>
  <head>
    <title>CDD</title>
    <link rel="stylesheet" href="http://openlayers.org/en/v3.15.1/css/ol.css" type="text/css">
    <link rel="stylesheet" href="../src/ol3-layerswitcher.css" />
    <link rel="stylesheet" href="layerswitcher.css" />
    <script src="http://openlayers.org/en/v3.15.1/build/ol.js"></script>
    <script src="../src/ol3-layerswitcher.js"></script>
    <script src="climate.js"></script>
  </head>
  <body>
      <div id="map" class="map">
        <div class="sidepanel-title">Proyeksi Peubahan Hari Tanpa Hujan Musiman Periode 2032-2040 terhadap 2006-2014 Pulau Jawa</div>
      </div>

    <script>
      var map = new ol.Map({
          target: 'map',
          layers: [
            new ol.layer.Group({
                layers: [osm]
            }),
            new ol.layer.Group({
                'title': 'Hari Tanpa Hujan Musiman',
                layers: [l16, l5, l4, l13]
            }),
            new ol.layer.Group({
                layers: [boundary]
            }),
          ],
          view: view,
          controls: ol.control.defaults().extend([
            new ol.control.FullScreen()
          ]),
      });

      var layerSwitcher = new ol.control.LayerSwitcher();
      map.addControl(layerSwitcher);
    </script>
  </body>
</html>