<?php
// require ""
class Index extends Controller  
{
    function __construct()
    {
        parent::__construct();
        // echo "we are index file";
        // $this->view->render('index/index');
        echo json_encode(array(array(
        	'id'=>-1,
        	'status'=>400
        )));
    }
    /*
        API developed by modkhalid
        https://github.com/modkhalid
        API FOR COMMON PAGE
    */
}
