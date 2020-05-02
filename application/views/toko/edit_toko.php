<?php echo form_open('toko/edit_toko/'.$toko->id_toko, array('id' => 'FormEditToko')); ?>
<?php if($user->label !== 'admin') { ?>
<div class='form-group'>
	<label>Nama Lengkap</label>
	<?php 
	echo form_input(array(
		'name' => 'nama_toko',
		'class' => 'form-control',
		'value' => $toko->nama_toko
	));
	?>
</div>

<div class='form-group'>
	<label>Alamat</label>
	<?php 
	echo form_input(array(
		'name' => 'alamat',
		'class' => 'form-control',
		'value' => $toko->alamat
	));
	?>
</div>

<div class='form-group'>
	<label>Pemilik Toko</label>
	<?php 
	echo form_input(array(
		'name' => 'pemilik',
		'class' => 'form-control',
		'value' => $toko->pemilik
	));
	?>
</div>
<?php } ?>


<?php echo form_close(); ?>

<div id='ResponseInput'></div>

<script>
$(document).ready(function(){
	var Tombol = "<button type='button' class='btn btn-primary' id='SimpanEditToko'>Update Data</button>";
	Tombol += "<button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>";
	$('#ModalFooter').html(Tombol);

	$('#SimpanEditToko').click(function(){
		$.ajax({
			url: $('#FormEditToko').attr('action'),
			type: "POST",
			cache: false,
			data: $('#FormEditToko').serialize(),
			dataType:'json',
			success: function(json){
				if(json.status == 1){ 
					$('#ResponseInput').html(json.pesan);
					setTimeout(function(){ 
				   		$('#ResponseInput').html('');
				    }, 3000);
					$('#my-grid').DataTable().ajax.reload( null, false );
				}
				else {
					$('#ResponseInput').html(json.pesan);
				}
			}
		});
	});
});
</script>