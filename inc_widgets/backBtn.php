<!-- Go back button code starting here -->
<?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

	if (!empty($referer)) {
		
		echo '<button><a href="'. $referer .'" title="Return to the previous page"><i class="fa fa-arrow-left"></i> Back</a></button>';
		
	} else {
		
		echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page"><i class="fa fa-arrow-left"></i> Go back</a></p>';
		
	}
?>
<!-- Go back button code starting here -->