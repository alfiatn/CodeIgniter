<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function cari_talent()
	{
		$data_cart = $this->db->where('tb_talent.nama_talent', $this->input->post('nama_talent'))
							  ->join('tb_jenis', 'tb_jenis.id_jenis = tb_talent.id_jenis')
							  ->get('tb_talent')
							  ->row();
		if($data_cart != NULL){

			//cek stok
			if($data_cart->stok > 0){
				$cart_array = array(
								'cart_id'	    => $this->session->userdata('username'),
								'id_talent' 	=> $data_cart->id_talent
							);						
				$this->db->insert('tb_cart',$cart_array);

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function get_data_talent_by_id($id_cart)
	{
		return $this->db->where('id_talent', $id_cart)
						->get('tb_talent')
						->row();
	}

	public function get_cart()
	{
		return $this->db->where('tb_cart.cart_id', $this->session->userdata('username'))
					    ->join('tb_talent', 'tb_talent.id_talent = tb_cart.id_talent')
					    ->join('tb_jenis', 'tb_jenis.id_jenis = tb_talent.id_jenis')
					    ->get('tb_cart')
					    ->result();
	}

	public function hapus_item_cart()
	{
		$this->db->where('id_cart', $this->input->post('hapus_id'))
				 ->delete('tb_cart');

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah_jumlah_cart()
	{
		$data = array(
				'jumlah' => $this->input->post('jumlah')
			);

		//cek stok awal dulu untuk memastikan stok lebih dari jumlah yang dibeli
		$stok_awal = $this->get_data_talent_by_id($this->input->post('id_talent'))->stok;
		if($stok_awal >= $this->input->post('jumlah')){
			$this->db->where('id_cart', $this->input->post('id_cart'))
					 ->update('tb_cart', $data);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_total_belanja()
	{
		return $this->db->select('SUM(tb_talent.harga*tb_cart.jumlah) as total')
						->where('tb_cart.cart_id', $this->session->userdata('username'))
						->join('tb_talent', 'tb_talent.id_talent = tb_cart.id_talent')
						->get('tb_cart')
						->row()->total;
	}

	public function tambah_transaksi()
	{
		$data_transaksi = array(
				'id_manajer'		=> $this->session->userdata('username'),
				'nama_cust'     	=> $this->input->post('nama_cust')
			);
		$this->db->insert('tb_transaksi', $data_transaksi);
		$last_insert_id = $this->db->insert_id();
		//insert detil transksi
		for($i = 0; $i < count($this->get_cart()); $i++)
		{
			$data_detil_transaksi = array(
				'id_transaksi'	=> $last_insert_id,
				'id_talent'		=> $this->input->post('id_talent')[$i],
				'jumlah'		=> $this->input->post('jumlah')[$i]
			);

			//memasukan ke tabel detil transaksi
			$this->db->insert('tb_detil_transaksi', $data_detil_transaksi);

			//mengurangi stok talent
			$stok_awal = $this->get_data_talent_by_id($this->input->post('id_talent')[$i])->stok;
			$stok_akhir = $stok_awal-$this->input->post('jumlah')[$i];
			$stok = array('stok' => $stok_akhir);
			$this->db->where('id_talent', $this->input->post('id_talent')[$i])
					 ->update('tb_talent', $stok);

		}


		//mengkosongkan cart berdasarkan kasir yang melakukan transaksi
		$this->db->where('cart_id', $this->session->userdata('username'))
				 ->delete('tb_cart');

		return TRUE;

	}

	public function get_riwayat_transaksi()
	{
		return $this->db->select('tb_transaksi.id_transaksi, tb_transaksi.nama_cust, tb_transaksi.id_manajer, tb_transaksi.tgl_transaksi, (SELECT SUM(tb_detil_transaksi.jumlah*tb_talent.harga) FROM tb_detil_transaksi JOIN tb_talent ON tb_talent.id_talent = tb_detil_transaksi.id_talent WHERE id_transaksi = tb_transaksi.id_transaksi ) as total')
						->join('tb_detil_transaksi','tb_detil_transaksi.id_transaksi = tb_transaksi.id_transaksi')
						->join('tb_talent','tb_talent.id_talent = tb_detil_transaksi.id_talent')
						->group_by('id_transaksi')
						->get('tb_transaksi')
						->result();
	}

	public function get_transaksi_by_id($id_cart)
	{
		return $this->db->select('tb_talent.nama_talent, tb_jenis.nama_jenis, tb_talent.jenis_kelamin, tb_talent.genre, tb_talent.harga, tb_talent.stok, tb_detil_transaksi.jumlah')
						->where('id_transaksi', $id_cart)
						->join('tb_talent','tb_talent.id_talent = tb_detil_transaksi.id_talent')
						->join('tb_jenis','tb_jenis.id_jenis = tb_talent.id_jenis')
						->get('tb_detil_transaksi')
						->result();
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */