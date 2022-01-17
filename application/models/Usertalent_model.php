<?php
class Usertalent_model extends CI_model {

  public function get_user()
  {
    $arr=$this->db->get('tb_user')
                  ->result();
    return $arr;
  }

  public function add_user()
  {
    $arr['nama_user'] = $this->input->post('nama_user');
    $arr['username'] = $this->input->post('username');
    $arr['password'] = md5($this->input->post('password'));
    $ql_masuk=$this->db->insert('tb_user', $arr);
    return $ql_masuk;
  }


  public function hapus_user($id_user)
  {
    $this->db->where('id_user', $id_user)
             ->delete('tb_user');

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function edit()
  {
    $user = array(
      'nama_user'     => $this->input->post('nama_user_edit'),
      'username'      => $this->input->post('username_edit'),
      'password'      => md5($this->input->post('password'))
    );
    $this->db->where('id_user', $this->input->post('id_user_edit'))
             ->update('tb_user', $user);

    if($this->db->affected_rows() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function get_data_user_by_id($id_user)
  {
    return $this->db->where('id_user', $id_user)
                    ->get('tb_user')
                    ->row();
  }
}
