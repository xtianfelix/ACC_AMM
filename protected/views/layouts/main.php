<?php /* @var $this Controller */ 

header('X-Frame-Options: SAMEORIGIN');
header('X-UA-Compatible: IE=edge,chrome=1');

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
        <meta charset="utf-8">
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        
	<!-- blueprint CSS framework -->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /-->
	<link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!--link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"-->    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-datepicker/datepicker.css" rel="stylesheet" media="screen">

    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.tablesorter.min.js"></script>
	<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div class="navbar navbar-fixed-top">
	  	<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse collapse">
		            <ul class="nav">
						<li id="home" <?php echo Yii::app()->urlManager->parseUrl(Yii::app()->request)==""?"class='active'":""; ?>>
							<a href="<?php echo $this->createUrl('/site/index'); ?>">Home</a>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						      Penjualan
						      <b class="caret"></b>
						    </a>
						    <ul class="dropdown-menu">
						        <li><a href="<?php echo $this->createUrl('/penjualan/create'); ?>">Tambah</a></li>
						        <li><a href="<?php echo $this->createUrl('/penjualan/admin'); ?>">Administrasi</a></li>
						    </ul>
					  	</li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						      Pembelian
						      <b class="caret"></b>
						    </a>
						    <ul class="dropdown-menu">
						        <li><a href="<?php echo $this->createUrl('/stock/create'); ?>">Tambah</a></li>
						        <li><a href="<?php echo $this->createUrl('/stock/select'); ?>">Daftar</a></li>
						    </ul>
					  	</li>
						<li class="divider-vertical"></li>
						<li id="maintenance" <?php echo strpos(Yii::app()->urlManager->parseUrl(Yii::app()->request),'maintenance')!==false?"class='active'":""; ?>>
							<a href="<?php echo $this->createUrl('/maintenance/create'); ?>">Maintenance</a>
						</li>
						<li class="divider-vertical"></li>
						<li id="report" <?php echo strpos(Yii::app()->urlManager->parseUrl(Yii::app()->request),'report')!==false?"class='active'":""; ?>>
							<a href="<?php echo $this->createUrl('/report'); ?>">Report</a>
						</li>
		    			<?php /*if($this->loggedInUser()){ ?>
							<li class="divider-vertical"></li>
							<li id="logout">
								<a href="<?php echo $this->createUrl('/site/logout'); ?>">Logout</a>
							</li>
		   				<?php }*/ ?>
		            </ul>
		            <!--ul class="nav pull-right">
		            	<a class="brand" href="#">Bootstrap</a>
		            </ul-->
				</div><!-- /.nav-collapse -->
			</div><!-- /container -->
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<!--div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div--><!-- header -->

	<!--div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div--><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<div class="footer-container">
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by ABADI MEGAH MOTOR.<br/>
			All Rights Reserved.<br/>
		</div><!-- footer -->
	</div>
</div><!-- page -->

<script type="text/javascript">
	jQuery.fn.exists = function(){return this.length>0;}
 	$(document).ready( function() {
 		if($('.table').exists())
 			$('.table').tablesorter();
 	});
</script>
</body>
</html>
