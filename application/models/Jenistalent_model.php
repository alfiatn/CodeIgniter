<?php
class Jenistalent_model extends CI_model {

  public function get_jenis()
  {
    $arr=$this->db->get('tb_jenis')
                  ->result();
    return $arr;
  }

  public function add_jenis()
  {
    $arr['nama_jenis'] = $this->input->post('nama_jenis');
    $ql_masuk=$this->db->insert('tb_jenis', $arr);
    return $ql_masuk;
  }


  public function hapus_jenis($id_jenis)
  {
    $this->db->where('id_jenis', $id_jenis)
             ->delete('tb_jenis');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function edit()
  {
    $jenis = array(
      'nama_jenis'     => $this->input->post('nama_jenis_edit')
    );
    $this->db->where('id_jenis', $this->input->post('id_jenis_edit'))
             ->update('tb_jenis', $jenis);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function get_data_jenis_by_id($id_jenis)
  {
    return $this->db->where('id_jenis', $id_jenis)
                    ->get('tb_jenis')
                    ->row();
  }
}
