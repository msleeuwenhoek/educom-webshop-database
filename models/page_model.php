<?php
require_once './session_manager.php';
class PageModel
{
    public $page;
    public $pages;

    public function getRequestedPage()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->page = $_POST['page'];
        } else {
            $this->page = (isset($_GET["page"]) ? $_GET["page"] : 'home');
        }
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function createMenu()
    {
        $this->pages = ['home' => 'Home', 'about' => 'About', 'contact' => 'Contact'];
        if (isUserLoggedIn()) {
            $this->pages['logout'] = "Log out " . getLoggedInUsername();
        } else {
            $this->pages['login'] = 'Login';
            $this->pages['register'] = 'Register';
        }
    }
}
