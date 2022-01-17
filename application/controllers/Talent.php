<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Talent_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){

    $data['content_view']="talent_view";

    $data['tb_talent']= $this->Talent_model->get_talent();
    $data['tb_jenis']= $this->Talent_model->get_jenis();

    $this->load->model('Talent_model');
    $data['arr']=$this->Talent_model->get_talent();
      $this->load->view('template_talent', $data, FALSE);
  } else {
    redirect('login_talent');
  }
}

  public function delete_talent()
  {
    if($this->session->userdata('login_status') == TRUE){
      $id_talent = $this->uri->segment(3);

      if($this->Talent_model->hapus_talent($id_talent)){
        $this->session->set_flashdata('pesan', 'Hapus talent berhasil! :)');
        redirect('Talent');
      } else {
        $this->session->set_flashdata('pesan', 'Hapus talent gagal! :(');
        redirect('Talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function json_talent_by_id(){
    if($this->session->userdata('login_status') == TRUE){
      $id_talent = $this->uri->segment(3);

      $data = $this->Talent_model->get_data_talent_by_id($id_talent);
      echo json_encode($data);
    } else {
      redirect('login_talent');
    }
  }

  public function update_talent()
  {
    if($this->session->userdata('login_status') == TRUE){
      $this->form_validation->set_rules('nama_talent_edit', 'Nama Talent', 'trim|required');
      $this->form_validation->set_rules('jenis_kelamin_edit', 'Jenis Kelamin', 'trim|required');
      $this->form_validation->set_rules('genre_edit', 'Genre', 'trim|required');
      $this->form_validation->set_rules('tb_jenis_edit', 'Jenis Talent', 'trim|required');
      $this->form_validation->set_rules('harga_edit', 'Harga', 'trim|required');
      $this->form_validation->set_rules('stok_edit', 'Stok', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->Talent_model->edit() == TRUE) {
          $this->session->set_flashdata('pesan', 'Ubah Talent berhasil! :)');
          redirect('Talent');
        } else {
          $this->session->set_flashdata('pesan', 'Ubah Talent gagal! :(');
          redirect('Talent');
        }
      } else {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect('Talent');
      }
    } else {
      redirect('login_talent');
    }
  }

  public function add_talent()
  {
    $this->form_validation->set_rules('id_talent', 'ID Talent', 'trim|required',
    array('required' => 'ID Talent harus diisi'));
    $this->form_validation->set_rules('nama_talent', 'Nama Talent', 'trim|required',
    array('required' => 'Nama Talent harus diisi'));
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required',
    array('required' => 'Jenis Kelamin harus diisi'));
    $this->form_validation->set_rules('genre', 'Genre', 'trim|required',
    array('required' => 'Genre harus diisi'));
    $this->form_validation->set_rules('tb_jenis', 'Jenis Talent', 'trim|required',
    array('required' => 'Jenis Talent harus diisi'));
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required',
    array('required' => 'Harga harus diisi'));
    $this->form_validation->set_rules('stok', 'Stok', 'trim|required',
    array('required' => 'Stok harus diisi'));

    if($this->form_validation->run() == TRUE)
    {
      $this->load->model('Talent_model', 'bar');
      $masuk=$this->bar->add_talent();
      if($masuk==true) {
        $this->session->set_flashdata('pesan', 'Tambah Talent berhasil! :)');
      } else {
        $this->session->set_flashdata('pesan', 'Tambah Talent gagal! :(');
      }
      redirect(base_url('index.php/Talent'), 'refresh');
    }
    else {
      $this->session->set_flashdata('pesan', validation_errors());
      redirect(base_url('index.php/Talent'), 'refresh');
    }
  }
}
