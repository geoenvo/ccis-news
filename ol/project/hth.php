<!DOCTYPE html>
<html>
  <head>
    <title>HTH</title>
    <link rel="stylesheet" href="http://openlayers.org/en/v3.15.1/css/ol.css" type="text/css">
    <link rel="stylesheet" href="../src/ol3-layerswitcher.css" />
    <link rel="stylesheet" href="layerswitcher.css" />
    <script src="http://openlayers.org/en/v3.15.1/build/ol.js"></script>
    <script src="../src/ol3-layerswitcher.js"></script>
    <style>
      .map:-moz-full-screen {
        height: 100%; width: 100%;
      }
      .map:-webkit-full-screen {
        height: 100%; width: 100%;
      }
      .map:-ms-fullscreen {
        height: 100%; width: 100%;
      }
      .map:fullscreen {
        height: 100%; width: 100%;
      }
      .ol-rotate {
        top: 3em;
      }
    </style>
  </head>
  <body>
    <div id="map" class="map"></div>
    <script>

    var lon  = 110.5
    var lat  = -7.3
    var zoom = 6.5

    var osm = new ol.layer.Tile({
      source: new ol.source.MapQuest({layer: 'osm'})
    });

    var source_boundary = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'bf_cityreg_091213', 'TILED': true},
      serverType: 'geoserver'
    });
    var boundary = new ol.layer.Tile({
           source: source_boundary,
           title: 'Batas Kabupaten',
    });

    var source_l13 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hth_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l13 = new ol.layer.Tile({
           source: source_l13,
           title: 'DJF',
           type: 'base',
    });

    var source_l14 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hth_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l14 = new ol.layer.Tile({
           source: source_l14,
           title: 'MAM',
           type: 'base',
    });

    var source_l15 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hth_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l15 = new ol.layer.Tile({
           source: source_l15,
           title: 'JJA',
           type: 'base',
    });

    var source_l16 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hth_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l16 = new ol.layer.Tile({
           source: source_l16,
           title: 'SON',
           type: 'base',
    });

      var map = new ol.Map({
          target: 'map',
          layers: [
            new ol.layer.Group({
                displayInLayerSwitcher: false,
                layers: [osm]
            }),
            new ol.layer.Group({
                'title': 'Hari Tanpa Hujan',
                layers: [l16, l15, l14, l13]
            }),
            new ol.layer.Group({
                layers: [boundary]
            }),
        ],
        view: new ol.View({
            center: ol.proj.transform([lon, lat], 'EPSG:4326', 'EPSG:3857'),
            zoom: zoom
          }),
        controls: ol.control.defaults().extend([
            new ol.control.FullScreen()
          ]),
      });

      var layerSwitcher = new ol.control.LayerSwitcher({
        tipLabel: 'Legend' // Optional label for button
      });
      map.addControl(layerSwitcher);
    </script>
  </body>
</html>