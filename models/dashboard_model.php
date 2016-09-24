<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function xhrInsert() 
    {
        $text = $_POST['nekiText'];
        
        $this->db->insert('data', array('text' => $text));
        
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }
    
    public function xhrGetListings()
    {
        $result = $this->db->select("SELECT * FROM data ORDER BY dataid");
        echo json_encode($result);
    }
    
    public function xhrDeleteListing()
    {
        $id = (int) $_POST['dataid'];
        $this->db->delete('data', "dataid = '$id'");
    }

}