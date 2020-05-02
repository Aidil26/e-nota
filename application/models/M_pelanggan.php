<?php
class M_pelanggan extends CI_Model
{
	function get_all()
	{
		return $this->db
			->select('id_pelanggan, nama, alamat, telp')
			->where('dihapus', 'tidak')
			->order_by('nama','asc')
			->get('props_pelanggan');
	}

	function get_baris($id_pelanggan)
	{
		return $this->db
			->select('id_pelanggan, nama, alamat, telp')
			->where('id_pelanggan', $id_pelanggan)
			->limit(1)
			->get('props_pelanggan');
	}

	function fetch_data_pelanggan($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "
			SELECT 
				(@row:=@row+1) AS nomor, 
				a.`id_pelanggan`, 
				a.`nama`, 
				a.`alamat`,
				a.`telp`,
				DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') AS waktu_input 
			FROM 
				`props_pelanggan` AS a 
				, (SELECT @row := 0) r WHERE 1=1 
				AND a.`dihapus` = 'tidak' 
		";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();
		
		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				a.`nama` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`alamat` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR a.`telp` LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR DATE_FORMAT(a.`waktu_input`, '%d %b %Y - %H:%i:%s') LIKE '%".$this->db->escape_like_str($like_value)."%' 
			";
			$sql .= " ) ";
		}
		
		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomor',
			1 => 'a.`nama`',
			2 => 'a.`alamat`',
			3 => 'a.`telp`',
			4 => 'a.`waktu_input`'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomor ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	function tambah_pelanggan($nama, $alamat, $telepon, $unique)
	{
		date_default_timezone_set("Asia/Jakarta");

		$dt = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telepon,
			'waktu_input' => date('Y-m-d H:i:s'),
			'dihapus' => 'tidak',
			'kode_unik' => $unique
		);

		return $this->db->insert('props_pelanggan', $dt);
	}

	function update_pelanggan($id_pelanggan, $nama, $alamat, $telepon)
	{
		$dt = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telepon,
		);

		return $this->db
			->where('id_pelanggan', $id_pelanggan)
			->update('props_pelanggan', $dt);
	}

	function hapus_pelanggan($id_pelanggan)
	{
		$dt = array(
			'dihapus' => 'ya'
		);

		return $this->db
			->where('id_pelanggan', $id_pelanggan)
			->update('props_pelanggan', $dt);
	}

	function get_dari_kode($kode_unik)
	{
		return $this->db
			->select('id_pelanggan')
			->where('kode_unik', $kode_unik)
			->limit(1)
			->get('props_pelanggan');
	}
}