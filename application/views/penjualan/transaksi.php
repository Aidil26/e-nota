<?php $this->load->view('include/header'); ?>
<style>
.panel-primary .form-group {
margin-bottom: 10px;
}
.form-control {
box-shadow: none;
}
.error_validasi {
margin-top: 0;
}
</style>
<?php
$level      = $this->session->userdata('ap_level');
$readonly   = '';
$disabled   = '';
if($level !== 'admin')
{
$readonly   = 'readonly';
$disabled   = 'disabled';
}
?>
<body class="hold-transition skin-purple-light sidebar-mini fixed sidebar-collapse">
    <div class="wrapper">
        <?php $this->load->view('include/navbar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Chart Penjualan</h4>
                                <div class="box-tools pull-right">
                                    <ul class="card-controls">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item active" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last week</a>
                                                <a class="dropdown-item" href="#">Last month</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a
                                                href=""
                                                class="link card-btn-reload"
                                                data-toggle="tooltip"
                                                title=""
                                                data-original-title="Refresh">
                                                <i class="fa fa-circle-thin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="flexbox">
                                    <div>
                                        <span class="font-size-50 fa fa-balance-scale text-danger">s</span>
                                        <h2 class="countnm mb-5">jh</h2>
                                    </div>
                                    <div id="barchart4"></div>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="box box-solid bg-gray">
                            <div class="box-header with-border">
                                <i class="fa fa-sticky-note fa-lg">  <h4 class="box-title"> Tab Nota</h4></i>
                                <div class="box-tools pull-right">
                                    <ul class="card-controls">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" href="#" class="text-white">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item active" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last week</a>
                                                <a class="dropdown-item" href="#">Last month</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                class="link card-btn-reload text-white"
                                                data-toggle="tooltip"
                                                title=""
                                                data-original-title="Refresh">
                                                <i class="fa fa-circle-thin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">No. Nota</label>
                                                    <div class="col-sm-8">
                                                        <input
                                                        type='text'
                                                        name='nomor_nota'
                                                        class='form-control input-sm'
                                                        id='nomor_nota'
                                                        value="<?php echo strtoupper(uniqid()).$this->session->userdata('ap_id_user'); ?>"
                                                        <?php echo $readonly; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Tgl Transaksi</label>
                                                    <div class="col-sm-8">
                                                        <input
                                                        type='text'
                                                        name='tanggal'
                                                        class='form-control input-sm'
                                                        id='tanggal'
                                                        value="<?php echo date('Y-m-d H:i:s'); ?>"
                                                        <?php echo $disabled; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Nama Kasir</label>
                                                    <div class="col-sm-8">
                                                        <select
                                                            name='id_kasir'
                                                            id='id_kasir'
                                                            class='form-control input-sm'
                                                            <?php echo $disabled; ?>>
                                                            <?php
                                                            if($kasirnya->num_rows() > 0)
                                                            {
                                                            foreach($kasirnya->result() as $k)
                                                            {
                                                            $selected = '';
                                                            if($k->id_user == $this->session->userdata('ap_id_user')){
                                                            $selected = 'selected';
                                                            }
                                                            echo "<option value='".$k->id_user."' ".$selected.">".$k->nama."</option>";
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="box box-solid bg-gray">
                            <div class="box-header with-border">
                                <i class="fa fa-user fa-lg"> <h4 class="box-title">Tab Pelanggan</h4></i>
                                <div class="box-tools pull-right">
                                    <ul class="card-controls">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" href="#" class="text-white">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item active" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last week</a>
                                                <a class="dropdown-item" href="#">Last month</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a
                                                href="<?php echo site_url('penjualan/tambah-pelanggan'); ?>"
                                                class="link card-btn-reload text-white"
                                                data-toggle="tooltip"
                                                id="TambahPelanggan"
                                                title=""
                                                data-original-title="Refresh">
                                                <i class="fa fa-plus-circle"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="panel panel-primary" id='PelangganArea'>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            
                                            <select
                                                name='id_pelanggan'
                                                id='id_pelanggan'
                                                class='form-control input-sm'
                                                style='cursor: pointer;'>
                                                <option value=''>-- Cust Lain --</option>
                                                <?php
                                                if($pelanggan->num_rows() > 0)
                                                {
                                                foreach($pelanggan->result() as $p)
                                                {
                                                echo "<option value='".$p->id_pelanggan."'>".$p->nama."</option>";
                                                }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-4 control-label">Telp / HP</label>
                                                    <div class="col-sm-8">
                                                        <div id='telp_pelanggan'>
                                                            <small>
                                                            <i>Tidak ada</i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm control-label">Alamat</label>
                                                    <div class="col-sm-8">
                                                        <div id='alamat_pelanggan'>
                                                            <small>
                                                            <i>Tidak ada</i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="box box-solid bg-gray">
                            <div class="box-header with-border">
                                <i class="fa fa-shopping-bag fa-lg"> <h4 class="box-title">Tab Transaksi</h4></i>
                                <div class="box-tools pull-right">
                                    <ul class="card-controls">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" href="#" class="text-white">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item active" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                <a class="dropdown-item" href="#">Last week</a>
                                                <a class="dropdown-item" href="#">Last month</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a
                                                href="<?php echo site_url('penjualan/transaksi'); ?>"
                                                class="link card-btn-reload text-white"
                                                data-toggle="tooltip"
                                                title=""
                                                data-original-title="Refresh">
                                                <i class="fa fa-refresh fa-fw"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class='col table-responsive'>
                                    <h5 class='judul-transaksi'>
                                    <i class='fa fa-shopping-cart fa-fw'></i>
                                    Penjualan
                                    <!-- <i class='fa fa-angle-right fa-fw'></i> -->
                                    <i class="fa fa-angle-double-right"></i>
                                    Transaksi
                                    
                                    </h5>
                                    <table class='table table-striped mb-0' id='TabelTransaksi'>
                                        <thead>
                                            <tr>
                                                <th style='width:35px;'>#</th>
                                                <th style='width:210px;'>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th style='width:120px;'>Harga</th>
                                                <th style='width:75px;'>Banyak</th>
                                                <th style='width:125px;'>Sub Total</th>
                                                <th style='width:40px;'>Act</th>
                                            </tr>
                                        </thead>
                                    <tbody></tbody>
                                </table>
                                
                                <div class="box-header bg-white mb-20 pull-up">
                                    
                                    <div class="media-body">
                                        <p>
                                            <h2><strong>Total Bayar : </strong>
                                            <h2 class="float-right" ><span id='TotalBayar'>Rp. 0</span></h2></h2>
                                            <input type="hidden" id='TotalBayarHidden'>
                                        </p>
                                        
                                        <button id='BarisBaru'
                                        type="button"
                                        class="btn btn-box-tool btn-lg float-left"
                                        data-toggle="tooltip"
                                        title=""
                                        data-original-title="Edit">
                                        <i class="fa fa-plus"> Baris Baru (F1)</i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class='row'>
                                    <div class='col-sm-7'>
                                        <textarea
                                        name='catatan'
                                        id='catatan'
                                        class='form-control'
                                        rows='2'
                                        placeholder="Catatan Transaksi (Optional)"
                                        onkeypress='return check_string(event)'
                                        style='resize: vertical; width:83%;'></textarea>
                                        <br/>
                                        <p>
                                            <i class='fa fa-keyboard-o fa-fw'></i>
                                            <b>Tombol Cepat :
                                            </b>
                                        </p>
                                        <div class='row'>
                                            <div class='col-sm-6'>F1 = Tambah baris baru</div>
                                            <div class='col-sm-6'>F2 = Fokus ke field bayar</div>
                                            <div class='col-sm-6'>F3 = Fokus KE Coloum Catatan</div>
                                            <div class='col-sm-6'>F4 = Cetak Struk</div>
                                            <div class='col-sm-6'>F11 = Full Screen</div>
                                            <div class='col-sm-6'>F12 = Simpan Transaksi</div>
                                        </div>
                                    </div>
                                    <div class='col-sm-5'>
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-6 control-label">Bayar (F3)</label>
                                                    <div class="col-sm-6">
                                                        <input
                                                        type='text'
                                                        name='cash'
                                                        id='UangCash'
                                                        class='form-control'
                                                        onkeypress='return check_int(event)'>
                                                    </div>
                                                    <p></p>
                                                    <label class="col-sm-6 control-label">Kembali</label>
                                                    <div class="col-sm-6">
                                                        <input type='text' id='UangKembali' class='form-control' disabled="disabled">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                            </div>
                                            <div class='row'>
                                                <div class='col-sm-6' style='padding-right: 0px;'>
                                                    <button type='button' class='btn btn-warning btn-block' id='CetakStruk'>
                                                    <i class='fa fa-print'></i>
                                                    Cetak (F4)
                                                    </button>
                                                </div>
                                                <div class='col-sm-6'>
                                                    <button type='button' class='btn btn-primary btn-block' id='Simpann'>
                                                    <i class='fa fa-floppy-o'></i>
                                                    Simpan (F12)
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.js"></script>
<script>
    $('#tanggal').datetimepicker({
lang:'en',
timepicker:true,
format:'Y-m-d H:i:s'
});
$(document).ready(function(){
for(B=1; B<=1; B++){
BarisBaru();
}
$('#id_pelanggan').change(function(){
if($(this).val() !== '')
{
$.ajax({
url: "<?php echo site_url('penjualan/ajax-pelanggan'); ?>",
type: "POST",
cache: false,
data: "id_pelanggan="+$(this).val(),
dataType:'json',
success: function(json){
$('#telp_pelanggan').html(json.telp);
$('#alamat_pelanggan').html(json.alamat);
}
});
}
else
{
$('#telp_pelanggan').html('<small><i>Tidak ada</i></small>');
$('#alamat_pelanggan').html('<small><i>Tidak ada</i></small>');
}
});
$('#BarisBaru').click(function(){
BarisBaru();
});
$("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();
});
function BarisBaru()
{
var Nomor = $('#TabelTransaksi tbody tr').length + 1;
var Baris = "<tr>";
    Baris += "<td>"+Nomor+"</td>";
    Baris += "<td>";
        Baris += "<input type='text' class='form-control' name='kode_barang[]' autocomplete_active id='pencarian_kode' placeholder='Ketik Kode / Nama Barang'>";
        Baris += "<div id='hasil_pencarian'></div>";
    Baris += "</td>";
    Baris += "<td></td>";
    Baris += "<td>";
        Baris += "<input type='hidden' name='harga_satuan[]'>";
        Baris += "<span></span>";
    Baris += "</td>";
    Baris += "<td><input type='text' class='form-control' id='jumlah_beli' name='jumlah_beli[]' onkeypress='return check_int(event)' disabled></td>";
    Baris += "<td>";
        Baris += "<input type='hidden' name='sub_total[]'>";
        Baris += "<span></span>";
    Baris += "</td>";
    Baris += "<td><button class='btn btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
Baris += "</tr>";
$('#TabelTransaksi tbody').append(Baris);
$('#TabelTransaksi tbody tr').each(function(){
$(this).find('td:nth-child(2) input').focus();
});
HitungTotalBayar();
}
$(document).on('click', '#HapusBaris', function(e){
e.preventDefault();
$(this).parent().parent().remove();
var Nomor = 1;
$('#TabelTransaksi tbody tr').each(function(){
$(this).find('td:nth-child(1)').html(Nomor);
Nomor++;
});
HitungTotalBayar();
});
function AutoCompleteGue(Lebar, KataKunci, Indexnya)
{
$('div#hasil_pencarian').hide();
var Lebar = Lebar + 25;
var Registered = '';
$('#TabelTransaksi tbody tr').each(function(){
if(Indexnya !== $(this).index())
{
if($(this).find('td:nth-child(2) input').val() !== '')
{
Registered += $(this).find('td:nth-child(2) input').val() + ',';
}
}
});
if(Registered !== ''){
Registered = Registered.replace(/,\s*$/,"");
}
$.ajax({
url: "<?php echo site_url('penjualan/ajax-kode'); ?>",
type: "POST",
cache: false,
data:'keyword=' + KataKunci + '&registered=' + Registered,
dataType:'json',
success: function(json){
if(json.status == 1)
{
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').css({ 'width' : Lebar+'px' });
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
}
if(json.status == 0)
{
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3)').html('');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val('');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html('');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').prop('disabled', true).val('');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(0);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html('');
}
}
});
HitungTotalBayar();
}
$(document).on('keyup', '#pencarian_kode', function(e){
if($(this).val() !== '')
{
var charCode = e.which || e.keyCode;
if(charCode == 40)
{
if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
{
var Selanjutnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');
Selanjutnya.addClass('autocomplete_active');
}
else
{
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
}
}
else if(charCode == 38)
{
if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
{
var Sebelumnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');
Sebelumnya.addClass('autocomplete_active');
}
else
{
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
}
}
else if(charCode == 13)
{
var Field = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)');
var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
var Barangnya = Field.find('div#hasil_pencarian li.autocomplete_active span#barangnya').html();
var Harganya = Field.find('div#hasil_pencarian li.autocomplete_active span#harganya').html();
Field.find('div#hasil_pencarian').hide();
Field.find('input').val(Kodenya);
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(3)').html(Barangnya);
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) input').val(Harganya);
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4) span').html(to_rupiah(Harganya));
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').removeAttr('disabled').val(1);
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) input').val(Harganya);
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) span').html(to_rupiah(Harganya));
var IndexIni = $(this).parent().parent().index() + 1;
var TotalIndex = $('#TabelTransaksi tbody tr').length;
if(IndexIni == TotalIndex){
BarisBaru();
$('html, body').animate({ scrollTop: $(document).height() }, 0);
}
else {
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').focus();
}
}
else
{
AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
}
}
else
{
$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian').hide();
}
HitungTotalBayar();
});
$(document).on('click', '#daftar-autocomplete li', function(){
$(this).parent().parent().parent().find('input').val($(this).find('span#kodenya').html());
var Indexnya = $(this).parent().parent().parent().parent().index();
var NamaBarang = $(this).find('span#barangnya').html();
var Harganya = $(this).find('span#harganya').html();
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').hide();
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3)').html(NamaBarang);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(Harganya);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(to_rupiah(Harganya));
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').removeAttr('disabled').val(1);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(Harganya);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(Harganya));
var IndexIni = Indexnya + 1;
var TotalIndex = $('#TabelTransaksi tbody tr').length;
if(IndexIni == TotalIndex){
BarisBaru();
$('html, body').animate({ scrollTop: $(document).height() }, 0);
}
else {
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').focus();
}
HitungTotalBayar();
});
$(document).on('keyup', '#jumlah_beli', function(){
var Indexnya = $(this).parent().parent().index();
var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val();
var JumlahBeli = $(this).val();
var KodeBarang = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2) input').val();
$.ajax({
url: "<?php echo site_url('barang/cek-stok'); ?>",
type: "POST",
cache: false,
data: "kode_barang="+encodeURI(KodeBarang)+"&stok="+JumlahBeli,
dataType:'json',
success: function(data){
if(data.status == 1)
{
var SubTotal = parseInt(Harga) * parseInt(JumlahBeli);
if(SubTotal > 0){
var SubTotalVal = SubTotal;
SubTotal = to_rupiah(SubTotal);
} else {
SubTotal = '';
var SubTotalVal = 0;
}
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(SubTotalVal);
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(SubTotal);
HitungTotalBayar();
}
if(data.status == 0)
{
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Oops !');
$('#ModalContent').html(data.pesan);
$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
$('#ModalGue').modal('show');
$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val('1');
}
}
});
});
$(document).on('keydown', '#jumlah_beli', function(e){
var charCode = e.which || e.keyCode;
if(charCode == 9){
var Indexnya = $(this).parent().parent().index() + 1;
var TotalIndex = $('#TabelTransaksi tbody tr').length;
if(Indexnya == TotalIndex){
BarisBaru();
return false;
}
}
HitungTotalBayar();
});
$(document).on('keyup', '#UangCash', function(){
HitungTotalKembalian();
});
function HitungTotalBayar()
{
var Total = 0;
$('#TabelTransaksi tbody tr').each(function(){
if($(this).find('td:nth-child(6) input').val() > 0)
{
var SubTotal = $(this).find('td:nth-child(6) input').val();
Total = parseInt(Total) + parseInt(SubTotal);
}
});
$('#TotalBayar').html(to_rupiah(Total));
$('#TotalBayarHidden').val(Total);
$('#UangCash').val('');
$('#UangKembali').val('');
}
function HitungTotalKembalian()
{
var Cash = $('#UangCash').val();
var TotalBayar = $('#TotalBayarHidden').val();
if(parseInt(Cash) >= parseInt(TotalBayar)){
var Selisih = parseInt(Cash) - parseInt(TotalBayar);
$('#UangKembali').val(to_rupiah(Selisih));
} else {
$('#UangKembali').val('');
}
}
function to_rupiah(angka){
var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
var rev2    = '';
for(var i = 0; i < rev.length; i++){
rev2  += rev[i];
if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
rev2 += '.';
}
}
return 'Rp. ' + rev2.split('').reverse().join('');
}
function check_int(evt) {
var charCode = ( evt.which ) ? evt.which : event.keyCode;
return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}
$(document).on('keydown', 'body', function(e){
var charCode = ( e.which ) ? e.which : event.keyCode;
if(charCode == 112) //F1
{
BarisBaru();
return false;
}
if(charCode == 113) //F2
{
$('#UangCash').focus();
return false;
}
if(charCode == 114) //F3
{
$('#catatan').focus();
return false;
}
if(charCode == 115) //F4
{
CetakStruk();
return false;
}
if(charCode == 123) //F12
{
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Konfirmasi');
$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
$('#ModalGue').modal('show');
setTimeout(function(){
$('button#SimpanTransaksi').focus();
}, 500);
return false;
}
});
$(document).on('click', '#Simpann', function(){
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Konfirmasi');
$('#ModalContent').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
$('#ModalGue').modal('show');
setTimeout(function(){
$('button#SimpanTransaksi').focus();
}, 500);
});
$(document).on('click', 'button#SimpanTransaksi', function(){
SimpanTransaksi();
});
$(document).on('click', 'button#CetakStruk', function(){
CetakStruk();
});
function SimpanTransaksi()
{
var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
FormData += "&tanggal="+encodeURI($('#tanggal').val());
FormData += "&id_kasir="+$('#id_kasir').val();
FormData += "&id_pelanggan="+$('#id_pelanggan').val();
FormData += "&" + $('#TabelTransaksi tbody input').serialize();
FormData += "&cash="+$('#UangCash').val();
FormData += "&catatan="+encodeURI($('#catatan').val());
FormData += "&grand_total="+$('#TotalBayarHidden').val();
$.ajax({
url: "<?php echo site_url('penjualan/transaksi'); ?>",
type: "POST",
cache: false,
data: FormData,
dataType:'json',
success: function(data){
if(data.status == 1)
{
alert(data.pesan);
window.location.href="<?php echo site_url('penjualan/transaksi'); ?>";
}
else
{
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Oops !');
$('#ModalContent').html(data.pesan);
$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
$('#ModalGue').modal('show');
}
}
});
}
$(document).on('click', '#TambahPelanggan', function(e){
e.preventDefault();
$('.modal-dialog').removeClass('modal-sm');
$('.modal-dialog').removeClass('modal-lg');
$('#ModalHeader').html('Tambah Pelanggan');
$('#ModalContent').load($(this).attr('href'));
$('#ModalGue').modal('show');
});
function CetakStruk()
{
if($('#TotalBayarHidden').val() > 0)
{
if($('#UangCash').val() !== '')
{
var FormData = "nomor_nota="+encodeURI($('#nomor_nota').val());
FormData += "&tanggal="+encodeURI($('#tanggal').val());
FormData += "&id_kasir="+$('#id_kasir').val();
FormData += "&id_pelanggan="+$('#id_pelanggan').val();
FormData += "&" + $('#TabelTransaksi tbody input').serialize();
FormData += "&cash="+$('#UangCash').val();
FormData += "&catatan="+encodeURI($('#catatan').val());
FormData += "&grand_total="+$('#TotalBayarHidden').val();
window.open("<?php echo site_url('penjualan/transaksi-cetak/?'); ?>" + FormData,'_blank');
}
else
{
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Oops !');
$('#ModalContent').html('Harap masukan Total Bayar');
$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
$('#ModalGue').modal('show');
}
}
else
{
$('.modal-dialog').removeClass('modal-lg');
$('.modal-dialog').addClass('modal-sm');
$('#ModalHeader').html('Oops !');
$('#ModalContent').html('Harap pilih barang terlebih dahulu');
$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
$('#ModalGue').modal('show');
}
}
</script>
