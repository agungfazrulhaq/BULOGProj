<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model
{
    private $_tableaset = "tb_aset";
    private $_tablekategori = "tb_kategori";

    public function getAset(){
        return $this->db->get($this->_tableaset)->result();
    }

    public function getKategori(){
        return $this->db->get($this->_tablekategori)->result();
    }
}