<?php
class Userview extends  CI_Controller{

    public function index(){
        $this->load->model('usermodel','md');
        $data=$this->md->getUser();


        $this->load->view('users',['data' => $data]);
    }

}
?>