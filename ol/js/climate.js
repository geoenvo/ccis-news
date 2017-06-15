var map = new ol.Map({
  target: 'map',
  controls: ol.control.defaults({attribution: false})
});

var scaleLine = new ol.control.ScaleLine();

var fullScreen = new ol.control.FullScreen();

var layerSwitcher = new ol.control.LayerSwitcher();

var gratStyle = new ol.style.Style();
gratStyle.setText (new ol.style.Text({
  stroke: new ol.style.Stroke({color:"#fff", width:3}),
  fill: new ol.style.Fill({color:"#000"}),
  }));
var graticule = new ol.control.Graticule({
  step: 0.1, stepCoord: 5, margin:5, projection: 'EPSG:4326',
  formatCoord:function(c){ return c.toFixed(1)+"°" }
});
graticule.setStyle(gratStyle);

var compass = new ol.control.Compass({
  className: "bottom",
  src: "../img/compass.png"
});

var viewJawa = new ol.View({
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

var sourceBoundaryJawa = new ol.source.TileWMS({
  url: 'http://139.162.55.216:8080/geoserver/geonode/wms',
  params: {'LAYERS': 'bf_cityreg_091213', 'TILED': true},
  serverType: 'geoserver'
});
var boundary = new ol.layer.Tile({
       source: sourceBoundaryJawa,
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

var t_climVar = ['suhu', 'suhu_min', 'suhu_maks', 'diurnal'];
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
      else if (t_climVar[j] == 'suhu_min') { layerTitle ='Suhu Minimum'}
      else if (t_climVar[j] == 'suhu_maks') { layerTitle = 'Suhu Maksimum'}
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

map.addControl(scaleLine);
map.addControl(fullScreen);
map.addControl(layerSwitcher);
map.addControl(graticule);
map.addControl(compass);
map.addLayer(osm);
