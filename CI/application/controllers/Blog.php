<?php
class Blog extends  CI_Controller{



    public function index(){
        $this->load->view('blog_view');
        $this->load->model('authenticate','fb');
        $data= $this->fb->authenticate();
        print_r($data);
    }

    public function test(){
        echo "Add new Function";
    }

}


?>