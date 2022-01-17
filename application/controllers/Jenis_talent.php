<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_talent extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenistalent_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){
    $data['content_view']="jenistalent_view";
    $this->load->model('Jenistalent_model');
    $data['arr']=$this->Jenistalent_model->get_jenis();
      $this->load->view('template_talent', $data, FALSE);
  } else {
    redirect('login_talent');
  }
}

  public function delete_jenis()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_jenis = $this->uri->segment(3);

      if($this->jenistalent_model->hapus_jenis($id_jenis)) {
        $this->session->set_flashdata('pesan', 'Hapus jenis berhasil! :)');
        redirect('Jenis_talent');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus jenis gagal! :(');
        redirect('Jenis_talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function json_jenis_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_jenis = $this->uri->segment(3);

      $data = $this->jenistalent_model->get_data_jenis_by_id($id_jenis);
      echo json_encode($data);
    } else {
      redirect('login_talent');
    }
  }

  public function update_jenis()
  {
    if($this->session->userdata('login_status') == TRUE){
      $this->form_validation->set_rules('nama_jenis_edit', 'Nama Jenis', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->jenistalent_model->edit() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah jenis berhasil! :)');
          redirect('Jenis_talent');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah jenis gagal! :(');
          redirect('Jenis_talent');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('Jenis_talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function add_jenis()
  {
    $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required',
    array('required' => 'Nama jenis harus diisi'));

    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('Jenistalent_model', 'bar');
      $masuk=$this->bar->add_jenis();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah jenis berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah jenis gagal! :(');
      }
      redirect(base_url('index.php/Jenis_talent'), 'refresh');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect(base_url('index.php/Jenis_talent'), 'refresh');
    }
  }
}
