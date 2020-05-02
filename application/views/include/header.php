<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo config_item('images'); ?>favicon.ico">

    <title><?php echo config_item('web_title'); ?></title>
  
	<!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="<?php echo config_item('vendor_comp'); ?>/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="<?php echo config_item('vendor_comp'); ?>bootstrap/dist/css/bootstrap.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?php echo config_item('css'); ?>bootstrap-extend.css">	
	
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo config_item('css'); ?>master_style.css">

	<!-- SoftPro admin skins -->
	<link rel="stylesheet" href="<?php echo config_item('css'); ?>skins/_all-skins.css">	
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="<?php echo config_item('vendor_comp'); ?>morris.js/morris.css"> 	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="<?php echo config_item('js'); ?>jquery.min.js"></script>
		<script>
		var habiscuy;
		$(document).on({
			ajaxStart: function() { 
				habiscuy = setTimeout(function(){
					$("#LoadingDulu").html("<div id='LoadingContent'><i class='fa fa-spinner fa-spin'></i> Mohon tunggu ....</div>");
					$("#LoadingDulu").show();
				}, 500);
			},
			ajaxStop: function() { 
				clearTimeout(habiscuy);
				$("#LoadingDulu").hide(); 
			}
		});
		</script>
	</head>
	<body>
		<div id='LoadingDulu'></div>