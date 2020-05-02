<footer class="main-footer">
	<div class="row">
		<div class="col">
			<?php echo config_item('web_footer'); ?></div>
		<div class="col">
			<img src="<?php echo config_item('images'); ?>propscode.png" height=20x alt="logo" class="pull-right"></div>
		</div>
</footer>

	<!-- jQuery 3 -->
	<script src="<?php echo config_item('vendor_comp'); ?>jquery-3.3.1/jquery-3.3.1.js"></script>
	<script src="<?php echo config_item('plugin'); ?>bootstrap-3.3.6/js/bootstrap.min.js"></script>
	<!-- fullscreen -->
	<script src="<?php echo config_item('vendor_comp'); ?>screenfull/screenfull.js"></script>
	
	<!-- popper -->
	<script src="<?php echo config_item('vendor_comp'); ?>popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.1-->
	<script src="<?php echo config_item('vendor_comp'); ?>bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo config_item('vendor_comp'); ?>jquery-ui/jquery-ui.js"></script>
	
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button);
	</script>
	
	<!-- Bootstrap 4.0-->
	<script src="<?php echo config_item('vendor_comp'); ?>bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Slimscroll -->
	<script src="<?php echo config_item('vendor_comp'); ?>jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="<?php echo config_item('vendor_comp'); ?>fastclick/lib/fastclick.js"></script>
	
	<!-- Sparkline -->
	<script src="<?php echo config_item('vendor_comp'); ?>jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- peity -->
	<script src="<?php echo config_item('vendor_comp'); ?>jquery.peity/jquery.peity.js"></script>
	
	<!-- Morris.js charts -->
	<script src="<?php echo config_item('vendor_comp'); ?>raphael/raphael.min.js"></script>
	<script src="<?php echo config_item('vendor_comp'); ?>morris.js/morris.min.js"></script>
	
	<!-- eChart Plugins -->
	<script src="<?php echo config_item('vendor_comp'); ?>echarts/dist/echarts-en.min.js"></script>
	
	<!-- SoftPro admin App -->
	<script src="<?php echo config_item('js'); ?>template.js"></script>
	
	<!-- SoftPro admin dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo config_item('js'); ?>pages/dashboard.js"></script>
	<div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
					<h4 class="modal-title" id="ModalHeader"></h4>
				</div>
				<div class="modal-body" id="ModalContent"></div>
				<div class="modal-footer" id="ModalFooter"></div>
			</div>
		</div>
	</div>
	
	<script>
	$('#ModalGue').on('hide.bs.modal', function () {
	setTimeout(function(){
			$('#ModalHeader, #ModalContent, #ModalFooter').html('');
	}, 500);
	});
	</script>
</body>
</html>