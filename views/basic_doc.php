<?php
require_once "html_doc.php";



class BasicDoc extends HtmlDoc
{
    protected $model;
    public function __construct($pageModel)
    {
        $this->model = $pageModel;
    }

    protected function showHeader()
    {
        echo "<h1>This is the header</h1>";
    }
    private function showMenu()
    {
        echo '<ul class="menu">';

        foreach ($this->model->pages as $page => $buttonText) {
            echo '<li>
            <a
            href="index.php?page=' . $page . '"
            >' . $buttonText . '</a>
            </li>';
        }

        echo "</ul>";
    }

    protected function showContent()
    {
        echo "<div>Sorry, couldn't find the page you were looking for</div>";
    }
    private function showFooter()
    {
        echo '<footer>
        <div>&copy; 2022 M. Sleeuwenhoek</div>
        </footer>';
    }

    protected function showBodyContent()
    {

        $this->showHeader();
        $this->showMenu();
        $this->showContent();
        $this->showFooter();
    }
}
