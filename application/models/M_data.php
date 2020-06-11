<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model
{
    private $_table = "tb_aset";
    public function getAset(){
        return $this->db->get($this->_table)->result();
    }
}