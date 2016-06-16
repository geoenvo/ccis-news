(function() {
	var lon  = 110.5
	var lat  = -7.3
	var zoom = 6.5

    var source_boundary = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'bf_cityreg_091213', 'TILED': true},
      serverType: 'geoserver'
    });
    var boundary = new ol.layer.Tile({
           source: source_boundary,
           title: 'Boundary',
    });

    var source_l1 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cdd_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l1 = new ol.layer.Tile({
           source: source_l1,
           title: 'DJF',
           type: 'base',
    });

    var source_l2 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cdd_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l2 = new ol.layer.Tile({
           source: source_l2,
           title: 'MAM',
           type: 'base',
    });

    var source_l3 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cdd_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l3 = new ol.layer.Tile({
           source: source_l3,
           title: 'JJA',
           type: 'base',
    });

    var source_l4 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cdd_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l4 = new ol.layer.Tile({
           source: source_l4,
           title: 'SON',
           type: 'base',
    });

    var source_l5 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cwd_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l5 = new ol.layer.Tile({
           source: source_l5,
           title: 'DJF',
           type: 'base',
    });

    var source_l6 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cwd_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l6 = new ol.layer.Tile({
           source: source_l6,
           title: 'MAM',
           type: 'base',
    });

    var source_l7 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cwd_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l7 = new ol.layer.Tile({
           source: source_l7,
           title: 'JJA',
           type: 'base',
    });

    var source_l8 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'cwd_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l8 = new ol.layer.Tile({
           source: source_l8,
           title: 'SON',
           type: 'base',
    });

    var map  = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Group({
                title: 'Base Map',
                displayInLayerSwitcher: false,
                layers: [
                    new ol.layer.Tile({
                    	source: new ol.source.OSM(),
                        title: 'OSM',
                        visible: true,
                    }),
                ]
            }),
            new ol.layer.Group({
                'title': 'Consecutive Dry Days',
                layers: [l4, l3, l2, l1]
            }),
            new ol.layer.Group({
                'title': 'Consecutive Wet Days',
                layers: [l8, l7, l6, l5]
            }),
            new ol.layer.Group({
                'title': 'Boundary',
                layers: [boundary]
            }),
        ],
        view: new ol.View({
            center: ol.proj.transform([lon, lat], 'EPSG:4326', 'EPSG:3857'),
            zoom: zoom
        })
    });

    var layerSwitcher = new ol.control.LayerSwitcher({
        tipLabel: 'Legend' // Optional label for button
    });
    map.addControl(layerSwitcher);

})();