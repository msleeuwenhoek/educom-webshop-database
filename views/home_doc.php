<?php
require_once "basic_doc.php";

class HomeDoc extends BasicDoc
{
    protected function showTabTitle()
    {
        echo 'Home';
    }
    protected function showHeader()
    {
        echo "<h1>This is the home page</h1>";
    }

    protected function showContent()
    {
        echo '<div class="content">
            <p>This is a welcome text. Welcome to this simple website?</p>
         </div>';
    }
}
