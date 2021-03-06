<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $flash_tambah = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_data");
        $this->load->library('form_validation');
        $this->load->library(array('datatables','pdf'));
        $this->load->helper(array('url','download'));
        $this->load->model("M_user");
        if($this->M_user->isNotLogin()) redirect(site_url('Login/'));
    }

	public function index()
	{
        $data["datatahun"] = $this->M_data->getYears();
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["transaksi"] = $this->M_data->getTransaksi();
        $data["files"] = $this->M_data->getFiles();
        $data["allcategory"] = $this->M_data->getAllCat();
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

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function del(){
        $data_ = $this->M_data;
        if ($data_->delete()) {
            $this->session->set_flashdata('successdel', 'Berhasil menghapus data');
            
        }
        else{
            $this->session->set_flashdata('faildel', 'Berhasil menghapus data');
            
        }
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deletechecked(){
        $data__ = $this->M_data;
        $data__->delcheck();

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
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
        $data["allcategory"] = $this->M_data->getAllCat();
        $data["transaksi"] = $this->M_data->getAset_Transaksi_filter($id_aset,$monthdate,$yeardate);
        $data["json_url"] = "getTransaksiJsonFiltered/".$id_aset."/".$monthdate."/".$yeardate."/";
        $data["dataModel"] = $this->load->model("M_data");
        $data["katforjurnal"] = $this->M_data->getJurnalCat($id_aset);
        $data["datajurnal"] = $this->M_data->getJurnal($id_aset,$monthdate,$yeardate);
        $data["datatransaksijurnal"] = $this->M_data->getJurnalTransaksi($id_aset,$monthdate,$yeardate);
        $data["saldoawalbulan"] = $this->M_data->getSaldoAwalMonth($id_aset,$monthdate,$yeardate);

		$this->load->view('index.php',$data);
    }

    public function addaset(){
        $data_ = $this->M_data;
        $data_->addAset();
        
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
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

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function getTransaksiJson(){
        header('Content-Type: application/json');
        echo $this->M_data->getall_Transaksi();
    }

    public function getTransaksiJsonFiltered($id_aset,$monthdate,$yeardate){
        header('Content-Type: application/json');
        echo $this->M_data->getAset_Transaksi($id_aset,$monthdate,$yeardate);
    }

    public function pdfmutasirender($curr_aset=null,$curr_month=null,$curr_year=null){
        $data["datatahun"] = $this->M_data->getYears();
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["saldoawal"] = $this->M_data->getSaldoAwalMonth($curr_aset,$curr_month,$curr_year);
        if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){
            $data["transaksi"] = $this->M_data->getAset_Transaksi_filter($curr_aset,$curr_month,$curr_year);
            $data["curr_aset"] = $curr_aset;
            $data["curr_month"] = $curr_month;
            $data["curr_year"] = $curr_year; 
        }
        else{
            $data["transaksi"] = $this->M_data->getTransaksitoPdf();
        }
        
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-mutasi".$curr_month.".pdf";
        $this->pdf->load_view('previewmutasipdf',$data);
    }

    public function pdflabarender(){
        $data['allcat'] = $this->M_data->getAllCat();
        $data['kategori'] = $this->M_data->getKategori();
        $data['aset'] = $this->M_data->getAset();
        $data['rpincat'] = $this->M_data->getLRTransaksi();
        // foreach($data['kategori'] as $row_kat){
        //     foreach($data['aset'] as $row_aset){

        //     }
        //     $data_row = "''"
        // }
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan-labarugi.pdf";
        $this->pdf->load_view('pdflabarender',$data);
    
    }

    public function previewmutasipdf($curr_aset=null,$curr_month=null,$curr_year=null){
        $data["datatahun"] = $this->M_data->getYears();
        $data["aset"] = $this->M_data->getAset();
        $data["kategori"] = $this->M_data->getKategori();
        $data["saldoawal"] = $this->M_data->getSaldoAwalMonth($curr_aset,$curr_month,$curr_year);
        if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){
            $data["transaksi"] = $this->M_data->getAset_Transaksi_filter_toPdf($curr_aset,$curr_month,$curr_year);
            $data["curr_aset"] = $curr_aset;
            $data["curr_month"] = $curr_month;
            $data["curr_year"] = $curr_year; 
        }
        else{
            $data["transaksi"] = $this->M_data->getTransaksitoPdf();
        }
        $data["files"] = $this->M_data->getFiles();
        $data["dataModel"] = $this->load->model("M_data");
        
        $this->load->view('previewmutasipdf.php',$data);
    }

    public function previewjurnalpdf($curr_aset=null,$curr_month=null,$curr_year=null){
        $data["aset"] =$this->M_data->getAsetbyId($curr_aset);
        $data["month"] = $curr_month;
        $data["year"] = $curr_year;
        $data["jurnal"] = $this->M_data->getDataJurnal($curr_aset,$curr_month,$curr_year);
        $data["jurnaljt"] = $this->M_data->getDataJurnalTransaksi($curr_aset,$curr_month,$curr_year);
        $data["saldoawalbulan"] = $this->M_data->getSaldoAwalMonth($curr_aset,$curr_month,$curr_year);

        $this->load->view('pdfjurnalpreview.php',$data);
    }

    public function previewlabapdf(){
        $data['allcat'] = $this->M_data->getAllCat();
        $data['kategori'] = $this->M_data->getKategori();
        $data['aset'] = $this->M_data->getAset();
        $data['rpincat'] = $this->M_data->getLRTransaksi();
        $data['periode'] = $this->uri->segment(3);
        // foreach($data['kategori'] as $row_kat){
        //     foreach($data['aset'] as $row_aset){

        //     }
        //     $data_row = "''"
        // }

        $this->load->view("pdflabapreview.php",$data);
    }

    public function upload(){
        $data_ = $this->M_data;
        if($data_->uploadFile()){
            $this->session->set_flashdata('successupload', 'Data berhasil disimpan');
        }
        else{
            $this->session->set_flashdata('failupload', 'Data berhasil disimpan');
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function asetdel(){
        $data__ = $this->M_data;
        $data__->deleteAset();

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function katadd(){
        $data__ = $this->M_data;
        if($data__->addCategory()){
            $this->session->set_flashdata('successaddcat', 'Berhasil menambahkan kategori');
            redirect(base_url());
        }

    }

    public function delcat(){
        $data__ = $this->M_data;
        $data__->deleteCat();

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function delcat_lr(){
        $data__ = $this->M_data;
        $data__->deleteCat_lr();

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function download_file($id_transaksi=null){
        $getfile = $this->db->query("SELECT * FROM files WHERE file_id_transaksi=".$id_transaksi);
        $getfile_ = $getfile->row();
        if($getfile->num_rows()==1){
            force_download($_SERVER['DOCUMENT_ROOT']."/OpasetBulog/upload/".$getfile_->nama_file,NULL);
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function delfile($id_transaksi=null){
        $data__ = $this->M_data;

        if($data__->delFile($id_transaksi)){
            $this->session->set_flashdata('successdelfile', 'Berhasil Menghapus data');
        }
        else{
            $this->session->set_flashdata('faildelfile', 'Gagal Menghapus data');
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function generatesaldoawal(){
        $data_ = $this->M_data;

        if($data_->genSaldoawal()){
            $this->session->set_flashdata('successsaldo', 'Berhasil Generate saldo awal');
        }
        else{
            $this->session->set_flashdata('failedsaldo', 'Gagal Generate saldo awal');
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function addjurnal(){
        $data_ = $this->M_data;
        
        $id_aset = $this->uri->segment(3);
        $monthdate = $this->uri->segment(4);
        $yeardate = $this->uri->segment(5);

        if($data_->addJurnal()){
            $this->session->set_flashdata('successjurnal','Berhasil menambahkan jurnal');
        }
        
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function addjt(){
        $data_ = $this->M_data;
        if($data_->addTransaksiJurnal()){
            $this->session->set_flashdata('successjurnaltransaksi','Berhasil menambahkan jurnal');
        }
        
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deljurnaltransaksi($id){
        $data_ = $this->M_data;
        if($data_->delJurnalTransaksi($id)){
            $this->session->set_flashdata('successdeljt','Berhasil menghapus data');
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deljurnal($id){
        $data_ = $this->M_data;
        if($data_->delJurnal($id)){
            $this->session->set_flashdata('successdeljurnal','Berhasil menghapus data');
        }
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function updatejurnal(){
        $data_ = $this->M_data;
        if($data_->updateJurnal()){
            $this->session->set_flashdata('successupdatejurnal','Berhasil update data');
        }
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
