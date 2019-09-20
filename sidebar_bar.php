<!DOCTYPE html>
<html>
<head>
	<title>Side Bar</title>
    <link rel="stylesheet" type="text/css" href="css/side_nav.css">
</head>
<body>

<?php include 'header.php';?>

<div class="side_bar">
	<div class="side_bar_list">
		<ul id="accrdion" >
			<li class="br_srch_li"><input type="text" name="" placeholder="Search"><i class="fa fa-search"></i></li>


			<li>
				<a href="#tsksli" data-toggle="collapse" data-parent="accrdion"><h4><i class="fa fa-fw fa-tasks"></i>Tasks<i class="fa fa-fw fa-angle-double-down"></i></h4></a>
				<ul id="tsksli" class="collapse">
					<li>
						
					</li>
				</ul>
			</li>

			<li>
				<a href="#tsksli" data-toggle="collapse" data-parent="accrdion"><h4><i class="fa fa-fw fa-tasks"></i>Tasks<i class="fa fa-fw fa-angle-double-down"></i></h4></a>
				<ul id="tsksli" class="collapse">
					<li></li>
				</ul>
			</li>

			<li>
				<a href="#tsksli" data-toggle="collapse" data-parent="accrdion"><h4><i class="fa fa-fw fa-tasks"></i>Tasks<i class="fa fa-fw fa-angle-double-down"></i></h4></a>
				<ul id="tsksli" class="collapse">
					<li></li>
				</ul>
			</li>
		</ul>
	</div>
</div>





</body>
</html>