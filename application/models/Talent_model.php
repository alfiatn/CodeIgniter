<?php
class Talent_model extends CI_model {

  public function get_talent()
  {
    $arr=$this->db->join('tb_jenis','tb_jenis.id_jenis = tb_talent.id_jenis')
                  ->get('tb_talent')
                  ->result();
    return $arr;
  }

  public function get_jenis()
  {
    $arr=$this->db->get('tb_jenis')
                  ->result();
    return $arr;
  }

  public function get_data_talent_by_id($id_talent)
  {
    return $this->db->where('id_talent', $id_talent)
                    ->get('tb_talent')
                    ->row();
  }

  public function add_talent()
  {
    $arr['id_talent'] = $this->input->post('id_talent');
    $arr['nama_talent'] = $this->input->post('nama_talent');
    $arr['jenis_kelamin'] = $this->input->post('jenis_kelamin');
    $arr['genre'] = $this->input->post('genre');
    $arr['id_jenis'] = $this->input->post('tb_jenis');
    $arr['harga'] = $this->input->post('harga');
    $arr['stok'] = $this->input->post('stok');
    $ql_masuk=$this->db->insert('tb_talent', $arr);
    return $ql_masuk;
  }

  public function hapus_talent($id_talent)
  {
    $this->db->where('id_talent', $id_talent)
             ->delete('tb_talent');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function edit()
  {
    $talent = array(
      //nge array id_talent
      'nama_talent'   => $this->input->post('nama_talent_edit'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin_edit'),
      'genre'         => $this->input->post('genre_edit'),
      'id_jenis'      => $this->input->post('tb_jenis_edit'),
      'harga'         => $this->input->post('harga_edit'),
      'stok'          => $this->input->post('stok_edit')
    );
    $this->db->where('id_talent', $this->input->post('id_talent_edit'))
             ->update('tb_talent', $talent);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
