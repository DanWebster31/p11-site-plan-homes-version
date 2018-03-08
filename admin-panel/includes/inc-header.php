<?php $loc = $_SERVER['REQUEST_URI']; ?>

<div id="headUnitHolder">
<div id="headUnit">
  <div id="headNav">
    <ul>
      <li><span class="logoutTop"><a href="<?php print $p11base ?>/app/logout.php">LOGOUT</a></span></li>
      <li><span class="livelink"><a href="/" target="_blank">GO TO LIVE SITE</a></span></li>
    </ul>
  </div>
	<div id="headLogo"><img src="<?php print $p11base ?>images/logo.png" alt="<?php print $p11pagename; ?>" border="0" /></div>
  <div id="navBox">
    <ul>
      <?php if ($_SESSION['userLevel'] == 1) { ?>
      <li><a href="<?php print $p11base ?>users/" <?php $pos = strpos($loc, "users"); if ($pos === false) { echo ' '; } else { echo 'class="navLit"'; } ?>>Edit Users</a></li>
	  <?php } ?>
      <li><a href="<?php print $p11base ?>site-plan/" <?php $pos = strpos($loc, "site-plan"); if ($pos === false) { echo ' '; } else { echo 'class="navLit"'; } ?>>Availability</a></li>
      <!-- <li><a href="<?php print $p11base ?>auto-response/" <?php $pos = strpos($loc, "auto-response"); if ($pos === false) { echo ' '; } else { echo 'class="navLit"'; } ?>>Auto-Response</a></li>
      <li><a href="<?php print $p11base ?>interest-list/" <?php $pos = strpos($loc, "interest-list"); if ($pos === false) { echo ' '; } else { echo 'class="navLit"'; } ?>>Interest List</a></li> -->
    </ul>
  </div>

</div>
</div>
