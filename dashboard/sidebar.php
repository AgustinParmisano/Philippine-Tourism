<?php
include("../wp-load.php");
?>
<h1 class="titleHeader">Dashboard <span>[ <?php echo $current_user->display_name; ?> ]</span></h1> 
<ul class="sidebaritems">
	<li><a href="/dashboard/"><span class="iconset iconFolder">&nbsp;</span>Home</a></li>
	<li><a href="articles.php"><span class="iconset iconFolder">&nbsp;</span>My Review Articles</a></li>
	<li><a href=""><span class="iconset iconProfile">&nbsp;</span>Profile Settings</a></li>
	<li><a href="<?php echo wp_logout_url( '/dashboard/login.php' ); ?>" title="Logout"><span class="iconLogout">&nbsp;</span>Logout</a></li>
</ul>