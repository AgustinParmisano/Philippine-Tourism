<?php
get_header();
global $globalCatType;
global $selectedCat;
?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/post.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/blue.css" rel="stylesheet" />

<div class="mainbodycontent" id="mainDocument">
	<div class="left" id="leftSidePanel">

		<div class="postBread">
			&nbsp;
		</div>
		<div class="postTitle greenbgnew">
			<h1 class="title"><?php
			$selectedCat = (single_cat_title( '', false ));
			printf( __( '%s', 'twentyeleven' ), '' . ucfirst(single_cat_title( '', false )) . '' );
			if(isset($_GET['cat']) && $_GET['cat'] != ""){
				echo ": ".ucwords($_GET['cat']);
			}
			?></h1>
			
		</div>
		<div class="homepageshadow">&nbsp;</div>
		
		<div>
			<?php			
			if ( have_posts() ) : 
			?>
			<div>
			<?php
				
				while (have_posts() ) : the_post(); 
				
				$postID = get_the_ID();
				$allCat = null;
			
				//Get Star Ratings
				$starComputeFinal = getPostRatings(get_the_ID());
				
				/*Get Special Info*/
				$otherInfoData = getOtherInfo(get_the_id());
				$imageListing = getImage(get_the_id(),"999");

			?>

				<div class="searchresultBox">
					<div class="searchResultTitle">
						<div style="float:left;">
							<a href="<?php the_permalink(); ?>" title="Visit <?php echo get_the_title(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="star" style="float:right; margin-top:5px;"><div class="star_w2" style="width:<?php echo $starComputeFinal->overAllRatings; ?>%;">&nbsp;</div></div>
						<br clear="all" />
					</div>
					<div class="locationaddress">
						 <?php if(isset($otherInfoData->location_address) && trim($otherInfoData->location_address) !== NULL){ ?>
							<span><?php echo $otherInfoData->location_address; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->contact_number) && $otherInfoData->contact_number != ""){?>
							<span><?php echo $otherInfoData->contact_number; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->email) && $otherInfoData->email != ""){?>
							<span><?php echo $otherInfoData->email; ?></span>
						 <?php } ?>
						 
						 <?php if(isset($otherInfoData->website) && $otherInfoData->website != ""){?>
							<span><a href="/external/<?php echo urldecode($otherInfoData->website); ?>"><?php echo $otherInfoData->website; ?></a></span>
						 <?php } ?>
					</div>
					<div>
						<span class="showreview arrow_go"><a href="<?php the_permalink(); ?>#reviews">Show Reviews</a></span><span class="showmap globe_go" addresslocation="<?php echo urlencode($otherInfoData->location_address); ?>"><a class="fancybox fancybox.iframe" href="http://www.pinoydestination.com/gmap.php?address=<?php echo urlencode($otherInfoData->location_address); ?>&zoom=13" rel="nofollow">Reveal in Map</a></span>
					</div>
					
					<div class="searchResultDetails">
						<?php
						$showmore=false;
						$x=1;
						foreach($imageListing as $img){
							if($x<=10){
						?>

						<a data-fancybox-group="gallery<?php echo get_the_ID(); ?>" href="/uploads/destinations/<?php echo $img->original; ?>" class="imageset fancybox">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/gray.jpg" data-original="/uploads/thumbs/<?php echo $img->original; ?>" border="0" />
							</a>
						
						<?php 
								$x++;
							}else{
								$showmore = true;
							} 
						}

						if($showmore){
						?>
						<a href="<?php the_permalink();?>?gallery=show" class="catviewgallery">View Gallery</a>
						<?php
						}

						?>
					</div>
					
					
					<?php
					$recentComment = getRecentComments(1, get_the_ID());
					if(count($recentComment) > 0){
						?>
						<div class="reviewcorner">
						<?php
						echo "<p><em class='em'>".$recentComment[0]->comment_content."</em></p><p class='textalignright'><strong>".$recentComment[0]->comment_author."</strong></p>";
						?>
						</div>
						<?php
					}
					?>
				</div>
			
				<?php 
				endwhile; 
				?>
			</div>
			<div class="navimargin">
				<?php
				PinoyPagination($the_query);
				?>
			</div>
			<?php else: ?>
				<div>
					<p>
						Sorry, no post found for this specific term.
					</p>
				</div>
			<?php endif; ?>					
		</div>
		
	</div>
					
	<?php
					
	/**
	 * Sidebar
	 */
	get_sidebar();
	
	?>
					
	<br clear="all" />
</div>
				
	<?php get_footer(); ?>
