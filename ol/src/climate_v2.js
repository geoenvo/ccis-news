var view = new ol.View({
  center: ol.proj.transform([110.5, -7.3], 'EPSG:4326', 'EPSG:3857'),
  zoom: 6.5
});

var viewSulawesi = new ol.View({
  center: ol.proj.transform([121.5, -1.5], 'EPSG:4326', 'EPSG:3857'),
  zoom: 5.7
});

var osm = new ol.layer.Tile({
  source: new ol.source.OSM({layer: 'osm'})
});

var source_boundary = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'bf_cityreg_091213', 'TILED': true},
  serverType: 'geoserver'
});
var boundary = new ol.layer.Tile({
       source: source_boundary,
});

var province = ['jawa', 'sulawesi'];
var climVar = ['cdd', 'cwd', 'fhl', 'hth', 'hujan', 'r50'];
var season = ['djf', 'mam', 'jja', 'son'];
var layer = [];

for (var i = 0; i < province.length; i++) {
  for (var j = 0; j < climVar.length; j++) {
    for (var k = 0; k < season.length; k++) {
      var layerName = climVar[j] + "_" + season[k] + "_" + province[i];
      var layerSource = new ol.source.TileWMS({
      	url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
        params: {'LAYERS': layerName, 'TILED': true},
        serverType: 'geoserver'
        });
	  var layerTitle = "";
      if (season[k] == 'djf') { layerTitle = 'Des-Jan-Feb'}
      else if (season[k] == 'mam') { layerTitle ='Mar-Apr-Mei'}
      else if (season[k] == 'jja') { layerTitle = 'Jun-Jul-Agu'}
      else if (season[k] == 'son') { layerTitle = 'Sep-Okt-Nov'}
      else { layerTitle = 'Layer Title'};
  
      var layerIndex = new ol.layer.Tile({
        source: layerSource,
        title: layerTitle,
        type: 'base',
      });
      layer.push(layerIndex);
    }
  }
};

var source_layer_s1 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhu_jawa', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s1 = new ol.layer.Tile({
  source: source_layer_s1,
  title: 'suhu rata-rata',
  type: 'base',
});

var source_layer_s2 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhumin_jawa', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s2 = new ol.layer.Tile({
  source: source_layer_s2,
  title: 'suhu minimum',
  type: 'base',
});

var source_layer_s3 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhumax_jawa', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s3 = new ol.layer.Tile({
  source: source_layer_s3,
  title: 'suhu maximum',
  type: 'base',
});

var source_layer_s4 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'diurnal_jawa', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s4 = new ol.layer.Tile({
  source: source_layer_s4,
  title: 'diurnal',
  type: 'base',
});

var source_layer_s5 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhu_sulawesi', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s5 = new ol.layer.Tile({
  source: source_layer_s5,
  title: 'suhu rata-rata',
  type: 'base',
});

var source_layer_s6 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhumin_sulawesi', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s6 = new ol.layer.Tile({
  source: source_layer_s6,
  title: 'suhu minimum',
  type: 'base',
});

var source_layer_s7 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'suhumax_sulawesi', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s7 = new ol.layer.Tile({
  source: source_layer_s7,
  title: 'suhu maximum',
  type: 'base',
});

var source_layer_s8 = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'diurnal_sulawesi', 'TILED': true},
  serverType: 'geoserver'
});
var layer_s4 = new ol.layer.Tile({
  source: source_layer_s8,
  title: 'diurnal',
  type: 'base',
});