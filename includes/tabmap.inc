<div class="panel-body">

  <script type="text/javascript">
    function openTab(evt, variable) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(variable).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

  <ul class="tab" style="cursor:pointer">
    <li><a class="tablinks active" onclick="openTab(event, 'jawa')">Jawa</a></li>
    <li><a class="tablinks" onclick="openTab(event, 'sulawesi')">Sulawesi</a></li>
  </ul>

  <div id="jawa" class="" style="display: block;">
    <ul class="tab" style="cursor:pointer">
      <li><a class="tablinks active" onclick="openTab(event, 'suhu')">Suhu</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'hujan')">Hujan</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'cdd')">CDD</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'cwd')">CWD</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'fhl')">FHL</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'hth')">HTH</a></li>
      <li><a class="tablinks" onclick="openTab(event, 'r50')">r50</a></li>
    </ul>
    <div id="suhu" class="tabcontent" style="display: block;">
      <div class="row">
        <div class="col-md-9">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/hujan_sulawesi.php"></iframe>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row" style="padding-right: 5px">
            <div class="panel panel-info">
              <div class="panel-heading text-center text-info">Legenda
              </div>
              <div class="panel-body">
                <div class="row">
                  <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=suhu_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <span>
        <br>
        <label>Akses via GeoPortal:</label>
        <select id="selectsuhu">
          <option value="http://139.162.55.216/layers/geonode%3Asuhu_jawa">Rata-rata</option>
          <option value="http://139.162.55.216/layers/geonode%3Asuhumin_jawa">Minimum</option>
          <option value="http://139.162.55.216/layers/geonode%3Asuhumax_jawa">Maximum</option>
          <option value="http://139.162.55.216/layers/geonode%3Adiurnal_jawa">Diurnal</option>
        </select>
        <input type="button" class="btn btn-info" value="Go" onclick="Gosuhu()" />
        <script type="text/javascript">
        function Gosuhu(){
        var geoportal = document.getElementById("selectsuhu");
        var selectedVal = geoportal.options[geoportal.selectedIndex].value;
        window.open(selectedVal)
        }
        </script>
      </span>
    </div>
    <?php 
    $climate = array("hujan", "cdd", "cwd", "fhl", "hth", "r50"); 
    foreach ($climate as $value) {
    echo "<div id=$value ";
    echo 'class="tabcontent" style="display: none;">';
    echo '<div class="row">';
    echo '<div class="col-md-9">';
    echo '<div class="embed-responsive embed-responsive-16by9">';
    echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/';
    echo "$value";
    echo '.php"></iframe>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-md-3">';
    echo '<div class="row" style="padding-right: 5px">';
    echo '<div class="panel panel-info">';
    echo '<div class="panel-heading text-center text-info">';
    echo 'Legenda';
    echo '</div>';
    echo '<div class="panel-body">';
    echo '<div class="row">';
    echo '<img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=';
    echo "$value";
    echo '_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">';
    echo '                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span>
        <br>
    <label>Akses via GeoPortal:</label>
    <select id="select';
    echo "$value";
    echo '">';
    echo '<option value="http://139.162.55.216/layers/geonode%3A';
    echo "$value";
    echo '_djf_jawa">Des-Jan-Feb</option>';
    echo '<option value="http://139.162.55.216/layers/geonode%3A';
    echo "$value";
    echo '_mam_jawa">Mar-Apr-Mei</option>';
    echo '<option value="http://139.162.55.216/layers/geonode%3A';
    echo "$value";
    echo '_jja_jawa">Jun-Jul-Agu</option>';
    echo '<option value="http://139.162.55.216/layers/geonode%3A';
    echo "$value";
    echo '_son_jawa">Sep-Okt-Nov</option>';
    echo '</select>
    <input type="button" class="btn btn-info" value="Go" onclick="Go';
    echo "$value";
    echo '()" />
        <script type="text/javascript">
        function Go';
    echo "$value";
    echo '(){';
    echo '
            var geoportal = document.getElementById("select';
    echo "$value";
    echo '");';
    echo '
            var selectedVal = geoportal.options[geoportal.selectedIndex].value;
        window.open(selectedVal)
        }
        </script>
        </span>
    </div>';
    }
    ?>
  </div>

  <div id="sulawesi" class="" style="display: block;">
  </div>

</div>