<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_data");
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["transaksi"] = $this->M_data->getTransaksi();
        
		$this->load->view('index.php',$data);
    }
    
    public function add(){
        $data_ = $this->M_data;
        $data_->addTransaksi();
        
        return redirect(base_url());
    }

    public function del($id=null){
        if (!isset($id)) show_404();
        
        if ($this->M_data->delete($id)) {
            redirect(site_url());
        }
    }
}
