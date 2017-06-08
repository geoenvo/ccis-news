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

var t_climVar = ['suhu', 'suhumin', 'suhumax', 'diurnal'];
var t_layer = [];

for (var i = 0; i < province.length; i++) {
  for (var j = 0; j < t_climVar.length; j++) {
      var layerName = t_climVar[j] + "_" + province[i];
      var layerSource = new ol.source.TileWMS({
      	url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
        params: {'LAYERS': layerName, 'TILED': true},
        serverType: 'geoserver'
        });
	  var layerTitle = "";
      if (t_climVar[j] == 'suhu') { layerTitle = 'Suhu Rata-rata'}
      else if (t_climVar[j] == 'suhumin') { layerTitle ='Suhu Minimum'}
      else if (t_climVar[j] == 'suhumax') { layerTitle = 'Suhu Maksimum'}
      else if (t_climVar[j] == 'diurnal') { layerTitle = 'Diurnal'}
      else { layerTitle = 'Layer Title'};  
      var layerIndex = new ol.layer.Tile({
        source: layerSource,
        title: layerTitle,
        type: 'base',
      });
      t_layer.push(layerIndex);
  }
};
