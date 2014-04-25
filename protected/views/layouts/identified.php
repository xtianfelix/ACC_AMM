<?php

$this->beginContent('//layouts/main');	
$this->beginContent('//layouts/navbar');

$action_id = (($this->getAction()) ? $this->getAction()->id : NULL);

$pageid = $this->id.'/'.$action_id;

$any_user = $this->fullOrTmpUser();
$is_full_user = ($any_user == $this->loggedInUser());
$profile_page = (($is_full_user) ? '/user/profile' : '/welcome/profile');

?>

<div id="topBar">
	<a href="/" id="headerLogo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/headerLogo.png" alt="Stacks" /></a>
	<a class="mobile_handle"><span>Navigation</span></a>
</div>
<ul id="topNav" class="sf-menu">

	<?php if($any_user->is_designer>0)
	{
	?>
	<!-- Left Hand Navigation -->
	<li>
		<a href="<?php echo $this->createUrl($profile_page); ?>" id="yourProfileNav" class="leftNav<?php echo (($pageid == 'user/profile') ? ' active' : '')?>">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/profileNav.png" title="Profile" alt="Profile" />
			<span>My Profile</span>
		</a>
	</li>
	<li>
		<a href="<?php echo $this->createUrl('/clients'); ?>" id="clientsNav" class="leftNav<?php echo ((($pageid == 'clients/index')||(substr($pageid,0,7) == 'clients')) ? ' active' : '')?>">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/clientsNav.png" title="Clients" alt="Clients" />
			<span>My Clients</span>
		</a>
	</li>
	<?php
	}
	?>
	<li style="float:right; height:100%;" class="sf-with-ul">
		<a href="<?php echo $this->createUrl($profile_page); ?>" id="emailNav"
			<?php if($any_user->is_designer>0){
				echo "class=designer";
			}else{
				if($pageid == 'user/profile') echo "class='active'";
			}?>>
			<?php echo CHtml::encode($any_user->email); ?>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/nextPointer.png">
		</a>
		<ul class="submenu">
			<?php
			$menu_items = array();
			
			if($is_full_user)
				$menu_items['/user/account'] = 'Account';
			
			$menu_items['/help'] = 'Help';
			$menu_items['/contact'] = 'Contact';
			
			$current_route = '/'.$this->id.(($action_id == 'index') ? '' : '/'.$action_id);
			
			foreach($menu_items as $route => $title)
				echo '<li><a href="'.$this->createUrl($route).'" '.(($route == $current_route) ? 'class="active"' : '').'>'.$title.'</a></li>';
			?>
			
			<li><a href="<?php echo $this->createUrl('/user/logout', $_GET); ?>">Logout</a></li>
		</ul>
	</li>
	
</ul>

<div style="height:1px;width:100%;"></div>


<?php $this->endContent(); ?>
  
<!-- Main Content Start -->

	<?php echo $content; ?>

<!-- Footer Start -->

<?php $this->endContent(); ?>
