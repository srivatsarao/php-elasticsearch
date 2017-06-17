<?php
class Upload_file extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }

    function index()
    {
        $this->load->view('upload_file');
    }

    function upload_file_data()
    {
        $upload_data=$this->File_model->upload_file();
        redirect('Upload_file');
    }
}
?>