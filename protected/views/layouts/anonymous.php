<?php

$this->beginContent('//layouts/main');
$this->beginContent('//layouts/navbar');

$action_id = (($this->getAction()) ? $this->getAction()->id : NULL);

$pageid = $this->id.'/'.$action_id;
	
?>

<!-- Nav Start -->
<div id="topBar">
	<a href="/" id="headerLogo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/headerLogo.png" alt="Stacks" /></a>
	<a class="mobile_handle"><span>Navigation</span></a>
</div>
<div id="nav">
	<ul>
		<li<?php echo (($pageid == 'user/signup') ? ' class="active"' : '')?>><a href="<?php echo $this->createUrl('/user/signup', $_GET); ?>">Sign up</a></li>
		<li<?php echo (($pageid == 'user/login') ? ' class="active"' : '')?>><a href="<?php echo $this->createUrl('/user/login', $_GET); ?>">Login</a></li>
	</ul>
</div>


<?php $this->endContent(); ?>
  
<!-- Main Content Start -->

	<?php echo $content; ?>

<!-- Footer Start -->

<?php $this->endContent(); ?>
