<?php

class Mojaoprema_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function xhrUnesi() 
    {
        $text = $_POST['nekiText'];
        
        $this->db->insert('oprema', array('ime' => $text));
        
        $data = array('ime' => $text, 'opremaid' => $this->db->lastInsertId());
        echo json_encode($data);
    }
    
    public function xhrPrikazi()
    {
        $result = $this->db->select("SELECT * FROM oprema ORDER BY opremaid");
        echo json_encode($result);
    }
    
    public function xhrObrisi()
    {
        $id = (int) $_POST['opremaid'];
        $this->db->delete('oprema', "opremaid = '$id'");
    }

}