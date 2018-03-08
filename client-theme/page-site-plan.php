<?php
/**
 * Template Name: Current Communities
 * @package client-theme
 */

/* INCLUDE PAGE SCRIPTS */

$dbhost = "db_host";
$dbname = "db_name";
$dbuser = "db_user";
$dbpass = "db_password";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$scriptsHeader = 'css/siteplan.css';
$scriptsFooter = 'js/contrib/tooltipster.js,js/siteplan.js';

get_header(); ?>

<section class="intro from-bottom">
	<div class="wrapper">
		<div class="threefourth tcenter center">
			<h2 class="tprimary"><?php the_field('intro_title'); ?></h2>
			<p><?php the_field('intro_copy'); ?></p>
		</div>
	</div>
</section>

<section id="sp" class="bgcinco">

	<div id="siteplan-outer">

    <div id="siteplan">

      <div id="select-res"><img src="<?= get_template_directory_uri(); ?>/images/site-plan/select.png" /></div>

	      <?php

	       $count = 0;
	        // get the info from the db
	       $sql = "SELECT * FROM siteplan";
	       $result = mysqli_query($con,$sql);

	      while ($lot = mysqli_fetch_assoc($result)) {

					$residence = $lot["Residence"];
					// $rend = $lot["Elevation"];
					$floorPlan = $lot["FloorPlanType"];
					$description = $lot["Description1"];
					$sqft = $lot["Description2"];
					$status = $lot["Availability"];
					$price = $lot["Price"];
					$mid = $lot["MoveInDate"];
					$caption1 = $lot["Caption1"];
					$caption2 = $lot["Caption2"];
					if ($price != '') {
						$price = 'Price: '.$price.'<br />';
					}
					if ($mid != '') {
						$mid = 'Move-In-Date: '.$mid.'<br />';
					}

					$fpClean = substr($floorPlan, 0, 1);

					$rendering = $floorPlan; // If unit's floor plan has rendering pic

          if (substr($floorPlan,-1) == "R") { // if need to flip window rendering pic
            $flipWinowPic = ' class=&quot;reverse&quot;';
          } else {
            $flipWinowPic = '';
          }

					$planTxt = strtolower($fpClean);
					$fpLink = '<a href=&quot;'.get_template_directory_uri().'/floor-plans/?plan='.$fpClean.'.&quot;>View Floor Plan</a>';

					if ($status != 'Sold') {
						$imgCode = '<div class=&quot;detail-photo&quot;><img '.$flipWinowPic.' src=&quot;'.get_template_directory_uri().'/images/site-plan/'.$rendering.'.jpg&quot;></div>';
					} else {
						$imgCode = '';
					}
					if ($status != 'Sold') {
						if ($status == 'Available') { $unitsAvailable = true; }
						echo('<div class="invis" style="display:none;"><img src="'.get_template_directory_uri().'/images/site-plan/'.$residence.'.jpg"></div>'); // preload window pop images
						echo('<div class="res" id="u'.$residence.'"><a href="javascript:void(0);" class="tooltip" title="<div class=&quot;detailContent&quot;>'.$imgCode.'<h2>Residence '.$residence.'</h2><h4>'.$price.$mid.$description.'<br />Approx. '.$sqft.' Sq. Ft.</h4><p>'.$caption1.'<br /><span class=&quot;boldage&quot;>'.$caption2.'</span></p>'.$fpLink.'</div>"><img src="'.get_template_directory_uri().'/images/site-plan/'.$status.'.svg" /></a></div>');
					} else {
						echo('<div class="res" id="u'.$residence.'"><img src="'.get_template_directory_uri().'/images/site-plan/'.$status.'.svg" /></div>');
					}

				} // end while

			?>

      <div id="base"><img src="<?= get_template_directory_uri(); ?>/images/site-plan/community-name-site-plan.png"></div>

      </div> <!-- END siteplan -->

    </div> <!-- END siteplan-outer -->

    <div id="availability-list">

  <?php
		date_default_timezone_set("America/Los_Angeles");
	 	$today = date("F j, Y");
	 	if ($unitsAvailable) {
			echo('<h2 class="date">Availability as of '.$today.'.</h2>');
		} else {
			echo('<h2 class="tcenter padb1">For availability information call 650.461.4420</h2>');
		}

		$count = 0;
		 // get the info from the db
		$sql = "SELECT * FROM siteplan";
		$result = mysqli_query($con,$sql);

		while ($lot = mysqli_fetch_assoc($result)) {

		$residence = $lot["Residence"];
 		 $floorPlan = $lot["FloorPlanType"];
 		 $description = $lot["Description1"];
 		 $sqft = $lot["Description2"];
 		 $status = $lot["Availability"];
 		 $price = $lot["Price"];
 		 $mid = $lot["MoveInDate"];
 		 $caption1 = $lot["Caption1"];
 		 $caption2 = $lot["Caption2"];
 		 if ($price != '') {
 			 $price = 'Price: '.$price.'<br />';
 		 }
 		 if ($mid != '') {
 			 $mid = 'Move-In-Date: '.$mid.'<br />';
 		 }

		$fpClean = substr($floorPlan, 0, 1);

 		$rendering = $floorPlan; // If unit's floor plan has rendering pic

 		if (substr($floorPlan,-1) == "R") { // if need to flip window rendering pic
 			$flipWinowPic = ' class=&quot;reverse&quot;';
 		} else {
 			$flipWinowPic = '';
 		}

 		$planTxt = strtolower($fpClean);
 		$fpLink = '<a href=&quot;'.get_template_directory_uri().'/floor-plans/?plan='.$fpClean.'.&quot;>View Floor Plan</a>';

 		if ($status != 'Sold') {
 			$imgCode = '<div class=&quot;detail-photo&quot;><img '.$flipWinowPic.' src=&quot;'.get_template_directory_uri().'/images/site-plan/'.$rendering.'.jpg&quot;></div>';
 		} else {
 			$imgCode = '';
 		}

			if ($status == 'Available') {
				echo('<div class="availability-list-item">
					'.$imgCode.'
					<div class="list-item-text"><h2>Residence '.$residence.'</h2>
					<h4>'.$price.$mid.'
					'.$description.'<br />
					Approx. '.$sqft.' sq. ft.</h4>
					<p>'.$caption1.'<br /><span class="boldage">'.$caption2.'</span></p>
					'.$fpLink.'
					</div>
				</div>');
			}

		} // end while

		mysqli_close($con);

	?>

  </div>

</section>


<section class="current-community-carousel fade-slow">
	<h3 class="bgtertiary twhite">Gallery</h3>
<?php  $images = get_field('current_community_carousel'); if( $images ): ?>
	<div id="slider" class="cycle-slideshow" data-cycle-speed="1000" data-cycle-prev=".cycle-prev" data-cycle-next=".cycle-next" data-cycle-timeout="0" data-cycle-caption="#custom-caption" data-cycle-caption-template="{{cycleTitle}}" data-cycle-slides="> .slide">
		<?php foreach( $images as $image ): ?>
			<div data-cycle-title="<?php echo $image['caption'];?>" class="slide cover" style="background-image: url('<?= $image['url']; ?>');"></div>
		<?php endforeach; ?>
		<div class="cycle-caption" id="custom-caption"></div>

	</div>
	<div class="cycle-prev">
		<img src="<?php bloginfo('template_directory');?>/images/global/arrow-left.svg" alt="">
	</div>
    <div class="cycle-next">
		<img src="<?php bloginfo('template_directory');?>/images/global/arrow-right.svg" alt="">
	</div>
<?php endif; ?>
</section>

<?php get_footer(); ?>
