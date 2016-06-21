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
    <style>
      .map:-moz-full-screen {
        width: 100%;
        height: 100%;
      }
      .map:-webkit-full-screen {
        width: 100%;
        height: 100%;
      }
      .map:-ms-fullscreen {
        width: 100%;
        height: 100%;
      }

      .map:fullscreen {
        width: 100%;
        height: 100%;
      }

      .ol-rotate {
        top: 3em;
      }

      .map {
        width: 100%;
        height: 100%;
      }

      .sidepanel-title {
        position: absolute;
        bottom: 10%;
        left: 2%;
        z-index: 1;
        text-align: left;
        font-size: 1.3em;
        color: #000;
      }
    </style>
  </head>
  <body>
      <div id="map" class="map">
        <div class="sidepanel-title">Proyeksi Perubahan Fraksi Hujan Lebat Periode 2032-2040 terhadap 2006-2014 Pulau Jawa</div>
      </div>

    <script>
      var map = new ol.Map({
          target: 'map',
          layers: [
            new ol.layer.Group({
                layers: [osm]
            }),
            new ol.layer.Group({
                'title': 'Fraksi Hujan Lebat',
                layers: [l12, l11, l10, l9]
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