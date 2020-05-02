<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar extends MY_Controller 
{
	public function index() {
		$this->load->model('m_toko');
		$dt['akses'] 	= $this->m_toko->get_all();
		return $this->load->view('include/navbar', $dt)
	}
}