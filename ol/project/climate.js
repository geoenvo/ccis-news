    var view = new ol.View({
      center: ol.proj.transform([110.5, -7.3], 'EPSG:4326', 'EPSG:3857'),
      zoom: 6.5
    });

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

    var source_l9 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'fhl_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l9 = new ol.layer.Tile({
           source: source_l9,
           title: 'DJF',
           type: 'base',
    });

    var source_l10 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'fhl_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l10 = new ol.layer.Tile({
           source: source_l10,
           title: 'MAM',
           type: 'base',
    });

    var source_l11 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'fhl_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l11 = new ol.layer.Tile({
           source: source_l11,
           title: 'JJA',
           type: 'base',
    });

    var source_l12 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'fhl_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l12 = new ol.layer.Tile({
           source: source_l12,
           title: 'SON',
           type: 'base',
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

    var source_l17 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hujan_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l17 = new ol.layer.Tile({
           source: source_l17,
           title: 'DJF',
           type: 'base',
    });

    var source_l18 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hujan_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l18 = new ol.layer.Tile({
           source: source_l18,
           title: 'MAM',
           type: 'base',
    });

    var source_l19 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hujan_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l19 = new ol.layer.Tile({
           source: source_l19,
           title: 'JJA',
           type: 'base',
    });

    var source_l20 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'hujan_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l20 = new ol.layer.Tile({
           source: source_l20,
           title: 'SON',
           type: 'base',
    });

    var source_l21 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'r50_djf_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l21 = new ol.layer.Tile({
           source: source_l21,
           title: 'DJF',
           type: 'base',
    });

    var source_l22 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'r50_mam_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l22 = new ol.layer.Tile({
           source: source_l22,
           title: 'MAM',
           type: 'base',
    });

    var source_l23 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'r50_jja_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l23 = new ol.layer.Tile({
           source: source_l23,
           title: 'JJA',
           type: 'base',
    });

    var source_l24 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'r50_son_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l24 = new ol.layer.Tile({
           source: source_l24,
           title: 'SON',
           type: 'base',
    });

    var source_l25 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'suhu_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l25 = new ol.layer.Tile({
           source: source_l25,
           title: 'suhu rata-rata',
           type: 'base',
    });

    var source_l26 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'suhumin_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l26 = new ol.layer.Tile({
           source: source_l26,
           title: 'suhu minimum',
           type: 'base',
    });

    var source_l27 = new ol.source.TileWMS({
      url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
      params: {'LAYERS': 'suhumax_jawa', 'TILED': true},
      serverType: 'geoserver'
    });
    var l27 = new ol.layer.Tile({
           source: source_l27,
           title: 'suhu maximum',
           type: 'base',
    });