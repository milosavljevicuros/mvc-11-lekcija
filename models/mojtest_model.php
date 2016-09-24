<?php

class Mojtest_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function blah() {
        return 10 + 10;
    }
    public function koJeUlogovan($userid) {
        //echo Session::get('userid');
        $ulogovan = $this->db->select('SELECT login FROM user WHERE userid = :userid', array(':userid' => $userid));
        //var_dump($ulogovan[0]);
        //echo $ulogovan[0]['login'];
        return $ulogovan[0]['login'];
    }

}