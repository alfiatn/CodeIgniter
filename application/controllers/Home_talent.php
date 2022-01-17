<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_talent extends CI_Controller {
  public function index()
  {
    if($this->session->userdata('login_status') == TRUE){
        $data['content_view'] = 'dashboard_talent'; //content_view harus konsisten di function2 laen

        $this->load->view('template_talent', $data);
    } else {
      redirect('login_talent');
    }
  }
}
