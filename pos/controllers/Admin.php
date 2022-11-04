<?php
class Admin extends Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    
    public function index()
    {   
        $data['title']= "Panel administrativo";
        $data['script'] = 'index.js';
        $this->views->getView("admin","home",$data);
    }

  

}
