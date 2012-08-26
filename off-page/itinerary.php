<?php
session_start();
if(isset($_REQUEST['request']) && $_REQUEST['request']=='removeall'){
	unset($_SESSION['myItinerary']);
	exit();
}
if(isset($_REQUEST['data']) && $_REQUEST['data'] != ""){
	$dataCount = count($_SESSION['myItinerary']);
	$tmpData = $_REQUEST['data'];
	$tmpData = explode("|",$tmpData);
	$dataArray = array("location_title"=>$tmpData[1],
					   "location_address"=>$tmpData[0]);
	$itineraryHash = sha1($tmpData[1]);
	$_SESSION['myItinerary'][$itineraryHash] = $dataArray;
	$newDataCount = count($_SESSION['myItinerary']);
	if($dataCount != $newDataCount){
		?>
		<li>
			<span class="xicon">&times;</span>
			<a href=""><?php echo $tmpData[1]; ?></a>
			<span>
				<?php echo $tmpData[0]; ?>
			</span>
		</li>
		<?php
	}	
}
?>
