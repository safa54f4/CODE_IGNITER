<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class home extends CI_Controller {
    
        public function index($name='')
        {
            $data['title'] = 'Home';
            $data['name'] = $name;
            // echo "Selamat Datang di Halaman Home";
            $this->load->view('template/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('template/footer');

        }
    
    }
    
    /* End of file home.php */
    
?>