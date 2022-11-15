<?php
require_once "forms_doc.php";

class LoginForm extends FormsDoc
{

    protected function showHeader()
    {
        echo "<h1>This is the login page</h1>";
    }

    protected function showForm()
    {
        echo '<label for="email">Email:</label>
            <input class="form-field" type="text" id="email" name="email" value="' . $this->model->email . '" />
            <span class="error">* ' . $this->model->emailErr . '</span>

            <br />
            <label for="password">Password:</label>
            <input class="form-field" type="text" id="password" name="password" value="' . $this->model->password . '" />
            <span class="error">*' . $this->model->passwordErr . ' </span>

            <br />

            <input type="hidden" name="page" value="login">
            <input type="submit" name="login" value="Login" id="login">';
    }
}
