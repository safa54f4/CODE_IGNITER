<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{

    //fungsi yang akan dijalankan saat class diintansiasinya
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent(ci_controller)
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');

        //validasi level
        if($this->session->userdata('level')!="admin"){
            redirect('login','refresh');
        }
    }

    public function index()
    {

        // modul untuk load database
        // $this->load->database();
        $data['title'] = 'List Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getAllmahasiswa();
        if ($this->input->post('keyword')) {
            # code ...
            $data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('template/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Mahasiswa';
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
        $data['jeniskelamin'] = ['Laki-laki', 'Perempuan'];

        //$this->form->validation->set_rules('fieldname', 'fieldlabel', trim|required|min_length[5]max_length[12]');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('template/footer');
        } else {
            #code...
            $image = $_FILES['foto']['name'];
            if($image){
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'jpeg|jpg|png|gif|svg|JPG';
                // $config['max_size']             = '5000';
                $config['remove_space'] = TRUE;

                $this->upload->initialize($config);
                if($this->upload->do_upload('foto')){
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('foto',$gambar);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->mahasiswa_model->tambahdatamhs();
            //untuk flashdata mempunyai parameter (nama flashdata/alias,isi dari flashdatanya)
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('mahasiswa', 'refresh');
        }
    }
    public function hapus($id)
    {
        $this->mahasiswa_model->hapusdatamhs($id);

        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('mahasiswa', 'refresh');
    }

    public function detail($id)
    {

        $data['title'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getmahasiswaByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {

        $data['title'] = 'Form Edit Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getmahasiswaByID($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
        $data['jeniskelamin'] = ['Laki-laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code ...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('template/footer');
        } else {
            #code ...
            $image = $_FILES['foto']['name'];
            if($image){
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'jpeg|jpg|png|gif|svg|JPG';
                // $config['max_size']             = '5000';
                $config['remove_space'] = TRUE;

                $this->upload->initialize($config);
                if($this->upload->do_upload('foto')){
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('foto',$gambar);
                }else{
                    echo $this->upload->display_errors();
                }
            }
            $this->mahasiswa_model->ubahdatamhs();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('mahasiswa', 'refresh');
        }
    }
}
/* End of file Controllername.php */