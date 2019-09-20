<!DOCTYPE html>
<html>
<head>
  <title>header_ribbon</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="css/modules.css" type="text/css">


  <link rel="stylesheet" href="css/user_ribbon.css" type="text/css">

<style type="text/css">
	/** The Magic **/
btn-breadcrumb>.btn.disabled {
    opacity: 1 !important;
    color: #999;
}

.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  /*z-index: 3;*/
}
.btn-breadcrumb .btn:not(:last-child):before {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid rgb(173, 173, 173);
  position: absolute;
  top: 50%;
  margin-top: -17px;
  margin-left: -1px;
  left: 100%;
  z-index: 3;
}

/** The Spacing **/
.btn-breadcrumb .btn {
  padding:6px 12px 6px 24px;
}
.btn-breadcrumb .btn:first-child {
  padding:6px 6px 6px 10px;
}
.btn-breadcrumb .btn:last-child {
  padding:6px 18px 6px 24px;
}

/** Info button **/
.btn-breadcrumb .btn.btn-info:not(:last-child):after {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-info:not(:last-child):before {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):after {
  border-left: 10px solid #d2d0d0;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):before {
  border-left: 10px solid #d2d0d0;
}
.breadCrumb_bar {
      width: 85%;
    position: absolute;
    right: 0;
    padding: 15px;
    top: 218px;
  
}
.breadCrumb_bar .btn-info {
    color: #031a40;
    background-color: transparent; !important;
    border-color: #eeeeee;
    border: none;
}
.btn-group.btn-breadcrumb a:hover {
    background: #d2d0d0;
    color: #031a40;
}
.breadCrumb_bar_iner{
  width: 100%;
  float: left;
  background: #fff;
  border: 1px solid #E2e2e2;
  border-radius: 5px;
}
</style>
</head>

<body>
	<div class="breadCrumb_bar">
		<div class="">
		 
		    <div class="breadCrumb_bar_iner">
		        <div class="btn-group btn-breadcrumb">
		            <a href="#" class="btn btn-info "><i class="glyphicon glyphicon-home"></i></a>
		            <a href="#" class="btn btn-info">Snippets</a>
		            <a href="#" class="btn btn-info">Breadcrumbs</a>
		            <a href="#" class="btn btn-info">Info</a>
		        </div>
			</div>
		 
			</div>
		</div>
	</div>
</body>
</html>