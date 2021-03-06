
<?php
    require ('../steamauth/steamauth.php');
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Introducing Gaming Analyst">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
      <title>Gaming Analyst</title>
      <link rel="stylesheet" type="text/css"  href="http://bootswatch.com/darkly/bootstrap.min.css" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
      <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
      <script src='https://code.jquery.com/jquery-2.2.3.min.js'></script>
      <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js'></script>     
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
      <link rel="stylesheet" href="../styles.css">

      <style>
      #view-source {
        position: fixed;
        display: block;
        right: 0;
        bottom: 0;
        margin-right: 40px;
        margin-bottom: 40px;
        z-index: 900;
      }

          .table {
              table-layout: fixed;
              word-wrap: break-word;
          }
          
          .bg{
              background: rgba(10,20,30,.1);
              position: absolute;
              margin-top: 90px;
              width: 1600px;
              height: 250px;
              border-radius: 2px;
          }

          .imgs{
              display: inline-block;
              margin-left: 5px;
              margin-right: auto;
              margin-top: 10px;
              margin-bottom: auto;
              height: 230px;
              border-radius: 1px;
              
          }
          
          .team_logos{
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            width: 50px;
          }

          .personname{
             font-size: 18px;
              font-family: sans-serif;
              color: #79d340;
          }
          
          .table-dark{
            color: gray;
                 margin-left:auto; 
                 margin-right:auto;
                margin-bottom: 20px;
          }

          
          body{
           background-color: white;
          }


      </style>
    </head>
  <body>
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo.png">
          </span>

          <div class="android-header-spacer mdl-layout-spacer"></div>
          <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field">
            </div>
          </div>
            
          <!-- Navigation -->
          <div name= "top" class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../csgo.php">CS:GO</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../dota2.php">DOTA 2</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase"><?php
                if(!isset($_SESSION['steamid'])) {
                echo loginbutton("small");
                 
         }  else {
                include ('../steamauth/userInfo.php');
             
                  echo "Welcome, " . $steamprofile['personaname']
               ?>     
    <?php
    }    
    ?></a>
                
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo-white.png">
          </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Settings</li>
          </ul>
        </div>
      </div>

        <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="../images/android-logo.png">
        </span>
        <nav class="mdl-navigation">
            <span class="mdl-navigation__link">
            <?php
                if(!isset($_SESSION['steamid'])) {

                    echo "<center>Welcome Guest. Please Login!</center><br>";
                    echo loginbutton("small"); //login button

                }  else {
                    include ('../steamauth/userInfo.php');

                    //Protected content
               
                    echo '<img class="img_profile" href="'.$steamprofile['profileurl'].'" src="'.$steamprofile['avatarfull'].'"/><br>';
                   echo '<a class="personname"><center>' . $steamprofile['personaname']. '</center></a>';

                }    
            ?>
            </span>
            <div class="android-drawer-separator"></div>
             <a href="../index.php" class="mdl-navigation__link" >Home</a>
            <a href="../dota2.php" class="mdl-navigation__link" >DOTA 2</a>
            <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link">CS: GO</span>
          <a class="mdl-navigation__link" href="">All Matches</a>
          <a class="mdl-navigation__link" href="">My Matches</a>
          <a class="mdl-navigation__link" href="live-matches.php">Live</a>
          <a class="mdl-navigation__link" href="">Tournaments</a>
          <a class="mdl-navigation__link" href="">Team Ranking</a>      
          <div class="android-drawer-separator"></div>
           <a class="mdl-navigation__link" href="">Settings</a>
          <a class="mdl-navigation__link" href="">About</a>
            <a class="mdl-navigation__link">
              <?php
                if(!isset($_SESSION['steamid'])) {

                }  else {
                    include ('../steamauth/userInfo.php');

                   echo '<a class="personname"><center>' . logoutbutton() . '</center></a>';

                }    
            ?></a>
        </nav>
      </div>
       <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
          <div class="logo-font android-slogan">DOTA2</div>
          <br>
          <br>
       <!-- ========================= GosuGamers Tab ========================= -->
        <div class="tab-pane alignborder" id="gg_acc_matches">
          <ul class="nav nav-tabs">
            <li class="active"><a class="submenu sub-tabs-top ph-tabstop ph-tableft" data-toggle="tab" href="#tb-ggummatch">Upcoming Matches &nbsp;<span title="Go to: http://www.gosugamers.net/dota2/gosubet" data-link="http://www.gosugamers.net/dota2/gosubet" href="#" class="permalink"><i class="icon-share"></i></span></a></li>
            <li><a class="submenu sub-tabs-top ph-tabstop" data-toggle="tab" href="#tb-ggrrmatch">Recent Results</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tb-ggummatch">
              <table id="gg_matchList" class="mdl-data-table table-dark mdl-js-data-table mdl-shadow--2dp">
                <tbody class="listload" id="tbody_ggUpMatches">
                  <tr class="gif"></tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="tb-ggrrmatch">
              <table id="gg_finishedList" class="mdl-data-table table-dark mdl-js-data-table mdl-shadow--2dp">
                <tbody class="listload" id="tbody_ggReMatches">
                </tbody>
              </table>
            </div>
          </div>
        </div>

    <!-- ========================= Streams/VODs Tab ========================= -->
    <div class="tab-pane alignborder" id="streams_vods">
      <ul class="nav nav-tabs">
        <li class="active"><a class="submenu sub-tabs-top ph-tabstop ph-tableft" data-toggle="tab" href="#streams">Live Streams &nbsp;<span title="Go to: http://www.twitch.tv/directory/game/Dota%202" data-link="http://www.twitch.tv/directory/game/Dota%202" href="#" class="permalink"><i class="icon-share"></i></span></a></li>
        <li><a class="submenu sub-tabs-top ph-tabstop" data-toggle="tab" href="#dota2vods">VODs &nbsp;<span title="Go to: http://www.dotacinema.com/vods" data-link="http://www.dotacinema.com/vods" href="#" class="permalink"><i class="icon-share"></i></span></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="streams">
          <table id="streamList" class="mdl-data-table table-dark mdl-js-data-table mdl-shadow--2dp">
            <tbody class="listload" id="tbody_streams">
              <tr class="gif"></tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane" id="dota2vods">
          <table id="d2vodsList" class="mdl-data-table table-dark mdl-js-data-table mdl-shadow--2dp">
            <tbody class="listload" id="tbody_d2vods">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  <script src="js/vendor/jquery-2.0.3.min.js"></script>
  <script src="js/vendor/bootstrap.js"></script>
  <script src="js/vendor/date.format.js"></script>
  <script src="js/match.js"></script>
</body>
</html>
