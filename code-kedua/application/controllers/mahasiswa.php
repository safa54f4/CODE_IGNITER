<?php
defined("BASEPATH")OR exit('No direct sript acces allowed');

class mahasiswa extends CI_Controller{
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mahasiswa_model');
   }
   public function index()
    {
        // $this->load->model('mahasiswa_model');
        $data['title']='List Mahasiswa';
        $data['mahasiswa']=$this->mahasiswa_model->getAllmahasiswa();
        if ($this->input->post('keyword')){
          $data['mahasiswa']=$this->mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('template/header',$data);
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('template/footer');
    }
    public function tambah(){
      $data['title']='Form Menambahkan Data Mahasiswa';
      $data['jurusan']=['Informatika','Kimia','Akuntansi','Mesin','elektro','sipil'];

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
      $this->form_validation->set_rules('email', 'email', 'required|valid_email');
      

      if ($this->form_validation->run() ==FALSE){
      $this->load->view('template/header', $data);
      $this->load->view('mahasiswa/tambah', $data); 
      $this->load->view('template/footer'); 
      }else{
        $this->mahasiswa_model->tambahdatamhs();
        $this->session->set_flashdata('flash-data','ditambahkan');
        redirect('mahasiswa','refresh');
      }
    }
    public function hapus($id) {
      $this->mahasiswa_model->hapusdatamhs($id);
      $this->session->set_flashdata('flash-data','dihapus');
      redirect('mahasiswa','refresh');
    }
    public function detail($id)
    {

      $data['title']='Detail Mahasiswa';
      $data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
      $this->load->view('template/header', $data);
      $this->load->view('mahasiswa/detail', $data);
      $this->load->view('template/footer');
      
    }
    public function edit($id)
    {

      $data['title']='Form Edit Mahasiswa';
      $data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
      $data['jurusan']=['Informatika','Kimia','Akuntansi','Mesin','elektro','sipil'];

      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() ==FALSE) {
        # code...
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/edit', $data);
        $this->load->view('template/footer');
      } else {
        # code...
        $this->mahasiswa_model->tambahdatamhs();
        $this->session->set_flashdata('flash-data','diedit');
        redirect('mahasiswa','refresh');
      }
      
    }
    public function ubahdatamhs() {
      $data=[
        "nama" => $this->input->post('nama',true),
        "nim" => $this->input->post('nim',true),
        "email" => $this->input->post('email',true),
        "jurusan" => $this->input->post('jurusan',true),
      ];
      $this->db->where('id' , $this->input->post('id'));
      $this->db->update('mahasiswa', $data);

    }
    
}

?>