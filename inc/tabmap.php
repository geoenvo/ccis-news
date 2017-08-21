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
  function openTabClimJawa(evt, variable) {
    var i, tabcontentClimJawa, tablinkClimJawa;
    tabcontentClimJawa = document.getElementsByClassName("tabcontentClimJawa");
    for (i = 0; i < tabcontentClimJawa.length; i++) {
        tabcontentClimJawa[i].style.display = "none";
    }
    tablinkClimJawa = document.getElementsByClassName("tablinkClimJawa");
    for (i = 0; i < tablinkClimJawa.length; i++) {
        tablinkClimJawa[i].className = tablinkClimJawa[i].className.replace(" active", "");
    }
    document.getElementById(variable).style.display = "block";
    evt.currentTarget.className += " active";
  }
  function openTabClimSul(evt, variable) {
    var i, tabcontentClimSul, tablinkClimSul;
    tabcontentClimSul = document.getElementsByClassName("tabcontentClimSul");
    for (i = 0; i < tabcontentClimSul.length; i++) {
        tabcontentClimSul[i].style.display = "none";
    }
    tablinkClimSul = document.getElementsByClassName("tablinkClimSul");
    for (i = 0; i < tablinkClimSul.length; i++) {
        tablinkClimSul[i].className = tablinkClimSul[i].className.replace(" active", "");
    }
    document.getElementById(variable).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

<ul class="tab" style="cursor:pointer; float: right; margin-top:12px"">
  <li><a class="tablinkProv active" onclick="openTabProv(event, 'jawa')">Jawa</a></li>
  <li><a class="tablinkProv" onclick="openTabProv(event, 'sulawesi')">Sulawesi</a></li>
</ul>

<div id="jawa" class="tabcontentProv" style="display: block;">
  <ul class="tab" style="cursor:pointer">
    <li><a class="tablinkClimJawa active" onclick="openTabClimJawa(event, 'suhuJawa')">Suhu</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'hujanJawa')">Hujan</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'cddJawa')">CDD</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'cwdJawa')">CWD</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'fhlJawa')">FHL</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'hthJawa')">HTH</a></li>
    <li><a class="tablinkClimJawa" onclick="openTabClimJawa(event, 'r50Jawa')">r50</a></li>
  </ul>
  <div id="suhuJawa" class="tabcontentClimJawa" style="display: block;">
    <div class="row">
      <div class="col-md-9">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/php/jawa_suhu.php"></iframe>
        </div>
      </div>
      <div class="col-md-3">
        <div class="row" style="padding-right: 5px">
          <div class="panel panel-info">
            <div class="panel-heading text-center text-info">Legenda
            </div>
            <div class="panel-body">
              <div class="row">
                <img src=<?php echo "$site_URL:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=suhu_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180" ?>>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <span>
      <br>
      <input type="button" class="btn btn-info" value="Download PDF" onclick="Gosuhu()" />
      <select id="selectsuhu">
          <option value=<?php echo "$site_URL/files/pdf/jawa-cdd.zip" ?>>Jawa - CDD</option>
          <option value=<?php echo "$site_URL/files/pdf/jawa-cwd.zip" ?>>Jawa - CWD</option>
          <option value=<?php echo "$site_URL/files/pdf/jawa-fhl.zip" ?>>Jawa - FHL</option>
          <option value=<?php echo "$site_URL/files/pdf/jawa-hth.zip" ?>>Jawa - HTH</option>
          <option value=<?php echo "$site_URL/files/pdf/jawa-hujan.zip" ?>>Jawa - Hujan</option>
          <option value=<?php echo "$site_URL/files/pdf/jawa-r50.zip" ?>>Jawa - R50</option>
          <option selected="selected" value=<?php echo "$site_URL:8001/files/pdf/jawa-suhu.zip" ?>>Jawa - Suhu</option>
      </select>
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
  echo "<div id=$value";
  echo 'Jawa class="tabcontentClimJawa" style="display: none;">';
  echo '<div class="row">';
  echo '<div class="col-md-9">';
  echo '<div class="embed-responsive embed-responsive-16by9">';
  echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/php/';
  echo 'jawa_';    
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
  echo '<img src="'.$site_URL.':8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=';
  echo "$value";
  echo '_djf_jawa&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">';
  echo '                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <span>
      <br>';
  echo '<input type="button" class="btn btn-info" value="Download PDF" onclick="Go';
  echo "$value";
  echo '()" />';
  echo '<select id="select';
  echo "$value";
  echo '">';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-cdd.zip">Jawa - CDD</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-cwd.zip">Jawa - CWD</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-fhl.zip">Jawa - FHL</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-hth.zip">Jawa - HTH</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-hujan.zip">Jawa - Hujan</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-r50.zip">Jawa - R50</option>';
  echo '<option value="'.$site_URL.'/files/pdf/jawa-suhu.zip">Jawa - Suhu</option>';
  echo '</select>';
  echo '<script type="text/javascript">
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

<div id="sulawesi" class="tabcontentProv" style="display: none">
  <ul class="tab" style="cursor:pointer">
    <li><a class="tablinkClimSul active" onclick="openTabClimSul(event, 'suhuSulawesi')">Suhu</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'hujanSulawesi')">Hujan</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'cddSulawesi')">CDD</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'cwdSulawesi')">CWD</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'fhlSulawesi')">FHL</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'hthSulawesi')">HTH</a></li>
    <li><a class="tablinkClimSul" onclick="openTabClimSul(event, 'r50Sulawesi')">r50</a></li>
  </ul>
  <div id="suhuSulawesi" class="tabcontentClimSul" style="display: block;">
    <div class="row">
      <div class="col-md-9">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe allowfullscreen="true" class="embed-responsive-item" src="ol/php/sulawesi_suhu.php"></iframe>
        </div>
      </div>
      <div class="col-md-3">
        <div class="row" style="padding-right: 5px">
          <div class="panel panel-info">
            <div class="panel-heading text-center text-info">Legenda
            </div>
            <div class="panel-body">
              <div class="row">
                <img src=<?php echo "$site_URL:8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=suhu_sulawesi&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180" ?>>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <span>
      <br>
      <input type="button" class="btn btn-info" value="Download PDF" onclick="Gosuhu2()" />
      <select id="select2suhu">
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-cdd.zip" ?>>Sulawesi - CDD</option>
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-cwd.zip" ?>>Sulawesi - CWD</option>
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-fhl.zip" ?>>Sulawesi - FHL</option>
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-hth.zip" ?>>Sulawesi - HTH</option>
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-hujan.zip" ?>>Sulawesi - Hujan</option>
        <option value=<?php echo "$site_URL/files/pdf/sulawesi-r50.zip" ?>>Sulawesi - R50</option>
        <option selected="selected" value=<?php echo "$site_URL/files/pdf/sulawesi-suhu.zip" ?>>Sulawesi - Suhu</option>
      </select>
      <script type="text/javascript">
      function Gosuhu2(){
      var geoportal = document.getElementById("select2suhu");
      var selectedVal = geoportal.options[geoportal.selectedIndex].value;
      window.open(selectedVal)
      }
      </script>
    </span>

  </div>
  <?php 
  $climate = array("hujan", "cdd", "cwd", "fhl", "hth", "r50"); 
  foreach ($climate as $value) {
  echo "<div id=$value";
  echo 'Sulawesi class="tabcontentClimSul" style="display: none;">';
  echo '<div class="row">';
  echo '<div class="col-md-9">';
  echo '<div class="embed-responsive embed-responsive-16by9">';
  echo '<iframe allowfullscreen="true" class="embed-responsive-item" src="ol/php/';
  echo 'sulawesi_';    
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
  echo '<img src="'.$site_URL.':8080/geoserver/geonode/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=';
  echo "$value";
  echo '_djf_sulawesi&legend_options=fontName:Times%20New%20Roman;fontAntiAliasing:true;fontColor:0x000000;fontSize:6;bgColor:0xFFFFFF;dpi:180">';
  echo '                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <span>
      <br>';
  echo '<input type="button" class="btn btn-info" value="Download PDF" onclick="Go2';
  echo "$value";
  echo '()" />';
  echo '<select id="select2';
  echo "$value";
  echo '">';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-cdd.zip">Sulawesi - CDD</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-cwd.zip">Sulawesi - CWD</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-fhl.zip">Sulawesi - FHL</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-hth.zip">Sulawesi - HTH</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-hujan.zip">Sulawesi - Hujan</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-r50.zip">Sulawesi - R50</option>';
  echo '<option value="'.$site_URL.'/files/pdf/sulawesi-suhu.zip">Sulawesi - Suhu</option>';
  echo '</select>';
  echo '<script type="text/javascript">
      function Go2';
  echo "$value";
  echo '(){';
  echo '
          var geoportal = document.getElementById("select2';
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
