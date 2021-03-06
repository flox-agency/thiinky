<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('thiinky');
		echo $this->Html->css('jquery.pnotify.default');
		echo $this->Html->css('http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css');
		echo $this->Html->script('thiinky');
		echo $this->Html->script('jquery.pnotify');
		echo $this->Html->script('jquery.timeago');
		echo $this->Html->script('jquery.timeago.fr');
		echo $this->Html->script('jquery.joverlay');
		echo $this->Html->script('jquery.cluetip');
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	
</head>
<body>
	<div id="doc" class="route-profile">
		<div class="topbar">
			<div class="global-nav">
				<div class="container">
					<ul class="nav">
						<li class="home">
							<a class="nav-logo-link" href="/">
								<i class="bird-topbar-blue"></i>
							</a>
						</li>
						<li class="profile" data-global-action="profile">
	                      <a class="" href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index',AuthComponent::user('username'))) ?>" data-component-term="profile_nav" data-nav="profile" title="Moi">
	                        <span class="new-wrapper">
	                        	<i class="nav-me"></i>
	                        	<i class="nav-new"></i>
	                        </span>
	                        <span class="text">Moi</span>
	                      </a>
	                    </li>
					</ul>
					<div class="pull-right">
						<form class="form-search" action="/search" id="global-nav-search">
							<input class="search-input" type="text" id="search-query" placeholder="Rechercher" name="q" autocomplete="off" spellcheck="false" data-focus="false">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="page-outer">
			<div id="page-container" class="wrapper wrapper-profile white">
				<div class="dashboard">
					<div class="component">
						<div class="module profile-nav">
							<ul>
								<li class="active">
									<a class="list-link" href="" >
										Thiinkies<i class="chev-right"></i>
									</a>
								</li>
								<li class="">
						         	<a class="list-link" href="" >
						         		Amis<i class="chev-right"></i>
						         	</a>
						        </li>
						        <li class="">
						         	<a class="list-link" href="" >
						         		Listes<i class="chev-right"></i>
						         	</a>
						        </li>
							</ul>
						</div>
					</div>
				</div>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
<!-- 
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div> 
	<?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
