<?php
require_once "basic_doc.php";

abstract class FormsDoc extends BasicDoc
{
    protected function showContent()
    {

        echo '<div class="content">
        <form  method="post" action="index.php">';
        $this->showform();
        echo
        '</form>
        </div>';
    }


    abstract protected function showForm();
}
