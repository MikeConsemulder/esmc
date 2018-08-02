<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 30-Nov-16
 * Time: 14:00
 */

function getIncludes($includeArray){

	foreach($includeArray as $wanted){
		switch($wanted){
			case 'needed':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/index/js/skel.min.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/index/js/util.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/jquery/js/jquery.dropotron.min.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/jquery/js/jquery.scrolly.min.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/index/js/main.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/cookies/js/cookies.js"></script>
				<?
				break;
			case 'index':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/jquery/js/jquery.scrollex.min.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/index/js/index-script.js"></script>
				<?
				break;
			case 'jquery':
				?>
				<!-- -->
				<?
				break;
			case 'fotos':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/fotos/js/fotos-script.js"></script>
				<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/includes/fotos/css/style.css" />
				<?
				break;
			case 'maps':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/googleMaps/js/jquery.classymap.js"></script>
				<?
				break;
			case 'inschrijvingen':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/inschrijvingen/js/inschrijvingen-script.js"></script>
				<?
				break;
			case 'organisator':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/organisator/organisator-script.js"></script>
				<?
				break;
			case 'activiteit':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/single-activiteiten/single-activiteiten-script.js"></script>
				<?
				break;
			case 'analytics':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/analytics/js/analytics-script.js"></script>
				<?
				break;
			case 'menu':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/jquery/js/jquery.dropotron.min.js"></script>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/index/js/responsive-menu-script.js"></script>
				<?
				break;
			case 'leden':
				?>
				<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/includes/leden/css/style.css" />
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/leden/js/member-script.js"></script>
				<?
				break;
			case 'tracking':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/tracking/js/tracking.js"></script>
				<?
				break;
			case 'reg_popup':
				?>
				<script type="text/javascript"
				        src="<?php bloginfo('template_url'); ?>/assets/includes/registration_popup/js/registration_popup.js"></script>
				<?
				break;
		}
	}
}
?>
