<?php
class M_toko extends CI_Model
{   
	function get_all(){
		return $this->db
			->where('id_toko !=', 1)
			->order_by('level_akses', 'asc')
			->get('props_toko');
	}
	
	function fetch_data_toko($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT
				(@row:=@row+1) AS nomor,
				a.`id_toko`,
				a.`nama_toko`,
				a.`alamat`,
				a.`pemilik`
			FROM
				`props_toko` AS a
				, (SELECT @row := 0) r WHERE 1=1";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();
		
		if( ! empty($like_value))
		{
			$sql .= " AND ( ";
			$sql .= "
				a.`nama_toko` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`alamat` LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR a.`pemilik` LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}
		
			$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array(
			0 => 'nomor',
			1 => 'a.`nama_toko`',
			2 => 'a.`alamat`',
			3 => 'a.`pemilik`'
		);
		
		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	function hapus_toko($id_toko)
	{
		$dt['dihapus'] = 'ya';
		return $this->db
				->where('id_toko', $id_toko)
				->update('props_toko', $dt);
	}

	function tambah_toko($nama_toko, $alamat, $pemilik)
	{
		$dt = array(
			'nama_toko' => $nama_toko,
			'alamat' => $alamat,
			'pemilik' => $pemilik
		);
		return $this->db->insert('props_toko', $dt);
	}
	function get_baris($id_toko)
	{
		$sql = "
			SELECT
				a.`id_toko`,
				a.`nama_toko`,
				a.`alamat`,
				a.`pemilik`
			FROM
				`props_toko` a
			WHERE
				a.`id_toko` = '".$id_toko."'
			LIMIT 1
		";
		return $this->db->query($sql);
	}
	function update_toko($id_toko,$nama_toko, $alamat, $pemilik)
	{
		$dt['nama_toko'] = $nama_toko;
		$dt['alamat'] = $alamat;
		$dt['pemilik']	= $pemilik;
		
		return $this->db
			->where('id_toko', $id_toko)
			->update('props_toko', $dt);
	}
}