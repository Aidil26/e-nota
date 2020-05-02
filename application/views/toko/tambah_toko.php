<?php echo form_open('toko/add_toko', array('id' => 'FormTambahToko')); ?>
<div class='form-group'>
	<label>Nama Toko</label>
	<input type='text' name='nama_toko' class='form-control'>
</div>
<div class='form-group'>
	<label>Alamat</label>
	<input type='text' name='alamat' class='form-control'>
</div>
<div class='form-group'>
	<label>Pemilik</label>
	<input type='text' name='pemilik' class='form-control'>
</div>

<hr />

<?php echo form_close(); ?>

<div id='ResponseInput'></div>

<script>
function TambahToko()
{
	$.ajax({
		url: $('#FormTambahToko').attr('action'),
		type: "POST",
		cache: false,
		data: $('#FormTambahToko').serialize(),
		dataType:'json',
		success: function(json){
			if(json.status == 1){ 
				$('.modal-dialog').removeClass('modal-lg');
				$('.modal-dialog').addClass('modal-sm');
				$('#ModalHeader').html('Sukses !');
				$('#ModalContent').html(json.pesan);
				$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal'>Ok</button>");
				$('#ModalGue').modal('show');
				$('#my-grid').DataTable().ajax.reload( null, false );
			}
			else {
				$('#ResponseInput').html(json.pesan);
			}
		}
	});
}

$(document).ready(function(){
	var Tombol = "<button type='button' class='btn btn-primary' id='SimpanTambahToko'>Simpan Data</button>";
	Tombol += "<button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>";
	$('#ModalFooter').html(Tombol);

	$("#FormTambahToko").find('input[type=text],textarea,select').filter(':visible:first').focus();

	$('#SimpanTambahToko').click(function(e){
		e.preventDefault();
		TambahToko();
	});

	$('#FormTambahToko').submit(function(e){
		e.preventDefault();
		TambahToko();
	});
});
</script>