<?php
$root = pathinfo(__file__, PATHINFO_DIRNAME) . '/../';
require($root . '/ypCore/helper/error.php');
require_once ($root . 'settings.php');

// Check if config.php exists
if (file_exists ($root . APP_CONFIG_FILE)) {
	//noticePage('ypCore already install!!', 'Stop install!');
}

$lang = 'en';

$stepAccept = array('configuration', 'end', 'installdatabase', 'introduction', 'requirements');
if(!isset($_GET['step']) OR !in_array($_GET['step'], $stepAccept)) 
    $step = 'introduction';
else {
    $step = basename($_GET['step']);
}


require_once ($root . 'install/language/' . $lang . '.php');
require_once ($root . 'install/steps/' . $step . '.php');
 

// -------------------------
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $language['title'] ?></title>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/screen.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">ypCore Installer</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#"><?php echo $step ?></a></li>
                <li><a href="#"></a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading"></h1>
            <p class="lead"> <?php getContent($step); ?> </p>
            <p class="lead">
              
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>ypCore Installer System (c) 2014</p>
            </div>
          </div>

        </div>

      </div>

    </div>
</body>
</html>

