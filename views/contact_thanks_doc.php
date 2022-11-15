<?php
require_once "forms_doc.php";

class ContactThanks extends BasicDoc
{
    protected function showHeader()
    {
        echo "";
    }
    protected function showContent()
    {
        echo
        '<div class="content">
    <p>Thank you for your message, ' . $this->model->name . '!</p>
    </div>';
    }
}
