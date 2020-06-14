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
        $data["datatahun"] = $this->M_data->getYears();
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

    public function deletechecked(){
        $data__ = $this->M_data;
        $data__->delcheck();

        return redirect(base_url());
    }

    public function showaset(){
        $id_aset = $this->uri->segment(3);
        $monthdate = $this->uri->segment(4);
        $yeardate = $this->uri->segment(5);

        $data["curr_aset"] = $id_aset;
        $data["curr_month"] = $monthdate;
        $data["curr_year"] = $yeardate;

        $data["datatahun"] = $this->M_data->getYears();
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["transaksi"] = $this->M_data->getAset_Transaksi($id_aset,$monthdate,$yeardate);
        
		$this->load->view('index.php',$data);
    }
}
