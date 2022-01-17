<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_talent extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Usertalent_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){
    $data['content_view']="usertalent_view";
    $this->load->model('Usertalent_model');
    $data['arr']=$this->Usertalent_model->get_user();
      $this->load->view('template_talent', $data, FALSE);
  } else {
    redirect('login_talent');
  }
}

  public function delete_user()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_user = $this->uri->segment(3);

      if($this->Usertalent_model->hapus_user($id_user)){
        $this->session->set_flashdata('pesan', 'Hapus user berhasil! :)');
        redirect('user_talent');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus user gagal! :(');
        redirect('user_talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function json_user_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_user = $this->uri->segment(3);

      $data = $this->Usertalent_model->get_data_user_by_id($id_user);
      echo json_encode($data);
    } else {
      redirect('login_talent');
    }
  }

  public function update_user()
  {
    if($this->session->userdata('login_status') == TRUE){
      $this->form_validation->set_rules('id_user_edit', 'ID user', 'trim|required');
      $this->form_validation->set_rules('nama_user_edit', 'Nama user', 'trim|required');
      $this->form_validation->set_rules('username_edit', 'Username', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->Usertalent_model->edit() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah user berhasil! :)');
          redirect('user_talent');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah user gagal! :(');
          redirect('user_talent');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('user_talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function add_user()
  {
    $this->form_validation->set_rules('nama_user', 'Nama user', 'trim|required',
    array('required' => 'Nama user harus diisi'));
    $this->form_validation->set_rules('username', 'Username', 'trim|required',
    array('required' => 'Username harus diisi'));
    $this->form_validation->set_rules('password', 'Password', 'trim|required', 'trim|required|min_length[8]',
    array('required' => 'Password harus diisi'));

    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('Usertalent_model', 'bar');
      $masuk=$this->bar->add_user();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah user berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah user gagal! :(');
      }
      redirect(base_url('index.php/user_talent'), 'refresh');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect(base_url('index.php/user_talent'), 'refresh');
    }
  }
}
