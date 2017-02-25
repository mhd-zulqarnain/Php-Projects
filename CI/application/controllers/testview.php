<?php
class Testview extends CI_Controller{
    
    public function index(){
        
        $this->load->model('testmodel','td');
        $data=$this->td->getData();
        $this->load->view('testindex',['data'=>$data]);
    }
}



?>