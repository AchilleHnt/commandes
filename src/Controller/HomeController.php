<?php 

namespace CmdApi\Controller;

class HomeController
{
    public function home()
    {
        require BASE_VIEW_PATH ."home.php";
    }
}