<?php

require_once "./models/page_model.php";

class PageController
{
    private $model;
    public function __construct($PageModel)
    {
        $this->model = $PageModel;
    }

    private function getRequest()
    {
        $this->model->getRequestedPage();
    }


    private function processRequest()
    {
        switch ($this->model->page) {
            case 'contact':
                require_once "./models/user_model.php";
                $this->model = new User();
                $this->model->validateContact();

                $page = 'contact';
                if ($this->model->valid) {
                    $page = 'thanks';
                } else {
                    $page = 'contact';
                }

                break;
            case 'register':
                require_once "./models/user_model.php";
                $this->model = new User();
                $this->model->validateRegistration();
                if ($this->model->valid) {
                    $page = 'login';
                } else {
                    $page = 'register';
                }
                break;
            case 'login':
                require_once "./models/user_model.php";

                $this->model = new User();
                $this->model->validateLogin();

                if ($this->model->valid) {
                    logUserIn($this->model->name);
                    $page = 'home';
                } else {
                    $page = 'login';
                }
                break;
            case 'about':
                $page = 'about';
                break;
            case 'home':
                $page = 'home';
                break;
            case 'logout':
                logUserOut();
                $page = 'home';
                break;
            default:
                $page = 'unknown';
        }
        $this->model->setPage($page);
    }

    private function showResponsePage()
    {
        $this->model->createMenu();
        switch ($this->model->page) {
            case 'home':
                include_once "./views/home_doc.php";
                $view = new HomeDoc($this->model);
                break;
            case 'about':
                include_once "./views/about_doc.php";
                $view = new AboutDoc($this->model);
                break;
            case 'contact':
                include_once "./views/contact_form.php";
                $view = new ContactForm($this->model);
                break;
            case 'thanks':
                include_once "./views/contact_thanks_doc.php";
                $view = new ContactThanks($this->model);
                break;
            case 'login':
                include_once "./views/login_form.php";
                $view = new LoginForm($this->model);
                break;
            case 'register':
                include_once "./views/registration_form.php";
                $view = new RegistrationForm($this->model);
                break;
            case 'unknown':
                include_once "./views/basic_doc.php";
                $view = new BasicDoc($this->model);
                break;
        }
        $view->show();
    }




    public function handleRequest()
    {
        $this->getRequest();
        $this->processRequest();
        $this->showResponsePage();
    }
}
