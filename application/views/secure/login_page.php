<?php $this->load->view('include/header'); ?>

<body class="hold-transition bg-gray-light">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-lg-5 col-md-8 col-12">
				<div class="content-top-agile bg-img" style="background-image: <?php echo config_item('images'); ?>gallery/full/6.jpg" data-overlay="4">
					<h1>Sistem Penjualan</h1>
					<h2>E-Nota</h2>
				</div>
				<div class="p-40 mt-10 bg-white content-bottom box-shadowed">
					<?php echo form_open('secure', array('id' => 'FormLogin')); ?>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-danger border-danger"><i class="ti-user"></i></span>
								</div>
								<?php 
							echo form_input(array(
								'name' => 'username', 
								'class' => 'form-control', 
								'autocomplete' => 'off', 
								'autofocus' => 'autofocus'
							)); 
							?>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-danger border-danger"><i class="ti-lock"></i></span>
								</div>
								<?php 
							echo form_password(array(
								'name' => 'password', 
								'class' => 'form-control', 
								'id' => 'InputPassword'
							)); 
							?>
							</div>
						</div>
						  <div class="row">
							
							<!-- /.col -->
							
							<!-- /.col -->
							<div class="col-12 text-center">
							  <button type="submit" class="btn btn-danger-outline btn-block mt-10 btn-rounded">Masukk Boss</button>
							</div>
							<!-- /.col -->
						  </div>
					</form>	
				</div>
				<br>
				<center><p class='footer'><?php echo config_item('web_footer'); ?> <img src="<?php echo config_item('images'); ?>propscode.png" height=20x alt="logo"></p></center>
			</div>
			<?php echo form_close(); ?>
			<div id='ResponseInput'></div>
			
		</div>
	</div>
</body>

<script>
$(function(){
	//------------------------Proses Login Ajax-------------------------//
	$('#FormLogin').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			type: "POST",
			cache: false,
			data: $(this).serialize(),
			dataType:'json',
			success: function(json){
				//response dari json_encode di controller

				if(json.status == 1){ window.location.href = json.url_home; }
				if(json.status == 0){ $('#ResponseInput').html(json.pesan); }
				if(json.status == 2){
					$('#ResponseInput').html(json.pesan);
					$('#InputPassword').val('');
				}
			}
		});
	});

	//-----------------------Ketika Tombol Reset Diklik-----------------//
	$('#ResetData').click(function(){
		$('#ResponseInput').html('');
	});
});
</script>