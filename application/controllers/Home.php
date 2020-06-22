<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $flash_tambah = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_data");
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

	public function index()
	{
        $data["datatahun"] = $this->M_data->getYears();
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["transaksi"] = $this->M_data->getTransaksi();
        $data["files"] = $this->M_data->getFiles();
        $data["dataModel"] = $this->load->model("M_data");
        
		$this->load->view('index.php',$data);
    }
    
    public function add(){
        $data_ = $this->M_data;
        $validation = $this->form_validation;
        $validation->set_rules($data_->rulesadd());

        if($validation->run()){
            $data_->addTransaksi();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }
        else{
            $this->session->set_flashdata('failed', 'Input Data Gagal');
        }
        return redirect(base_url());
    }

    public function del(){
        if ($this->M_data->delete()) {
            $this->session->set_flashdata('successdel', 'Berhasil menghapus data');
            redirect(site_url());
        }
        else{
            $this->session->set_flashdata('faildel', 'Berhasil menghapus data');
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
        $data["transaksi"] = $this->M_data->getAset_Transaksi_filter($id_aset,$monthdate,$yeardate);
        $data["json_url"] = "getTransaksiJsonFiltered/".$id_aset."/".$monthdate."/".$yeardate."/";
        $data["dataModel"] = $this->load->model("M_data");

		$this->load->view('index.php',$data);
    }

    public function addaset(){
        $data_ = $this->M_data;
        $data_->addAset();
        
        return redirect(base_url());
    }

    public function update(){
        $data_ = $this->M_data;
        $validation = $this->form_validation;
        $validation->set_rules($data_->rulesadd());

        if($validation->run()){
            $data_->updateTransaksi();
            $this->session->set_flashdata('successupdate', 'Berhasil Disimpan');
        }
        else{
            $this->session->set_flashdata('failedupdate', 'Input Data Gagal');
        }

        return redirect(base_url());
    }

    public function getTransaksiJson(){
        header('Content-Type: application/json');
        echo $this->M_data->getall_Transaksi();
    }

    public function getTransaksiJsonFiltered($id_aset,$monthdate,$yeardate){
        header('Content-Type: application/json');
        echo $this->M_data->getAset_Transaksi($id_aset,$monthdate,$yeardate);
    }

    public function pdfrender(){
        $this->load->view('pdfrender.php');

        return redirect(base_url());
    }

    public function upload(){
        $data_ = $this->M_data;
        $data_->uploadFile();

        return redirect(base_url());
    }

    public function asetdel(){
        $data__ = $this->M_data;
        $data__->deleteAset();

        return redirect(base_url());
    }

    public function katadd(){
        $data__ = $this->M_data;
        if($data__->addCategory()){
            $this->session->set_flashdata('successaddcat', 'Berhasil menambahkan kategori');
            redirect(base_url());
        }

    }

}
