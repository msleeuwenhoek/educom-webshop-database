<?php
class HtmlDoc
{
    protected function showTabTitle()
    {
        echo "Home";
    }
    private function showDocumentStart()
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>";
        $this->showTabTitle();

        echo "</title>
            <link rel='stylesheet' href='./CSS/index.css' />
        </head>
        ";
    }
    private function showBodyStart()
    {
        echo
        "<body>
        <div class='wrapper'>";
    }
    protected function showBodyContent()
    {
        echo '<p>Body<p>';
    }

    private function showBodyEnd()
    {
        "</div>
        </body>s";
    }


    private function showDocumentEnd()
    {
        echo "</html>";
    }
    public function show()
    {
        $this->showDocumentStart();
        $this->showBodyStart();
        $this->showBodyContent();
        $this->showBodyEnd();
        $this->showDocumentEnd();
    }
}
