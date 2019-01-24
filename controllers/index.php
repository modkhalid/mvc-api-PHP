<?php
// require ""
class Index extends Controller  
{
    function __construct()
    {
        parent::__construct();
        // echo "we are index file";
        $this->view->render('index/index');
    }
}
