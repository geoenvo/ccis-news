<div class="panel-body">

  <script type="text/javascript">
    function openTabProv(evt, variable) {
      var i, tabcontentProv, tablinkProv;
      tabcontentProv = document.getElementsByClassName("tabcontentProv");
      for (i = 0; i < tabcontentProv.length; i++) {
          tabcontentProv[i].style.display = "none";
      }
      tablinkProv = document.getElementsByClassName("tablinkProv");
      for (i = 0; i < tablinkProv.length; i++) {
          tablinkProv[i].className = tablinkProv[i].className.replace(" active", "");
      }
      document.getElementById(variable).style.display = "block";
      evt.currentTarget.className += " active";
    }
    function openTabClim(evt, variable) {
      var i, tabcontentClim, tablinkClim;
      tabcontentClim = document.getElementsByClassName("tabcontentClim");
      for (i = 0; i < tabcontentClim.length; i++) {
          tabcontentClim[i].style.display = "none";
      }
      tablinkClim = document.getElementsByClassName("tablinkClim");
      for (i = 0; i < tablinkClim.length; i++) {
          tablinkClim[i].className = tablinkClim[i].className.replace(" active", "");
      }
      document.getElementById(variable).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

  <ul class="tab" style="cursor:pointer">
    <li><a class="tablinkProv active" onclick="openTabProv(event, 'jawa')">Jawa</a></li>
    <li><a class="tablinkProv" onclick="openTabProv(event, 'sulawesi')">Sulawesi</a></li>
  </ul>

  <div id="jawa" class="tabcontentProv" style="display: block;">
    <ul class="tab" style="cursor:pointer">
      <li><a class="tablinkClim active" onclick="openTabClim(event, 'suhuJawa')">Suhu</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'hujanJawa')">Hujan</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'cddJawa')">CDD</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'cwdJawa')">CWD</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'fhlJawa')">FHL</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'hthJawa')">HTH</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'r50Jawa')">r50</a></li>
    </ul>
    <div id="suhuJawa" class="tabcontentClim" style="display: block;">
      <div class="row">
        <div class="col-md-9">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/suhu_jawa.php"></iframe>
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
      <!--
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
      -->
    </div>
    <?php 
    $climate = array("hujan", "cdd", "cwd", "fhl", "hth", "r50"); 
    foreach ($climate as $value) {
    echo "<div id=$value";
    echo 'Jawa class="tabcontentClim" style="display: none;">';
    echo '<div class="row">';
    echo '<div class="col-md-9">';
    echo '<div class="embed-responsive embed-responsive-16by9">';
    echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/';
    echo "$value";
    echo '_jawa.php"></iframe>';
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
        <!--
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
        -->
    </div>';
    }
    ?>
  </div>

  <div id="sulawesi" class="tabcontentProv" style="display: none">
    <ul class="tab" style="cursor:pointer">
      <li><a class="tablinkClim active" onclick="openTabClim(event, 'suhuSulawesi')">Suhu</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'hujanSulawesi')">Hujan</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'cddSulawesi')">CDD</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'cwdSulawesi')">CWD</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'fhlSulawesi')">FHL</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'hthSulawesi')">HTH</a></li>
      <li><a class="tablinkClim" onclick="openTabClim(event, 'r50Sulawesi')">r50</a></li>
    </ul>
    <div id="suhuSulawesi" class="tabcontentClim" style="display: block;">
      <div class="row">
        <div class="col-md-9">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/suhu_sulawesi.php"></iframe>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row" style="padding-right: 5px">
            <div class="panel panel-info">
              <div class="panel-heading text-center text-info">Legenda
              </div>
              <div class="panel-body">
                <div class="row">
                  <img src="http://139.162.55.216:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=suhu_sulawesi&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
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
      -->
    </div>
    <?php 
    $climate = array("hujan", "cdd", "cwd", "fhl", "hth", "r50"); 
    foreach ($climate as $value) {
    echo "<div id=$value";
    echo 'Sulawesi class="tabcontentClim" style="display: none;">';
    echo '<div class="row">';
    echo '<div class="col-md-9">';
    echo '<div class="embed-responsive embed-responsive-16by9">';
    echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/project/';
    echo "$value";
    echo '_sulawesi.php"></iframe>';
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
    echo '_djf_sulawesi&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">';
    echo '                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
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
        -->
    </div>';
    }
    ?>
  </div>

</div>