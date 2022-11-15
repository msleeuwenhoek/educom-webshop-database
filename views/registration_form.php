<?php
require_once "forms_doc.php";

class RegistrationForm extends FormsDoc
{
    protected function showHeader()
    {
        echo "<h1>This is the registration page</h1>";
    }

    protected function showForm()
    {
        echo '<label for="name">Name:</label>
            <input class="form-field" type="text" id="name" name="name" value="' . $this->model->name . '" />
            <span class="error">* ' . $this->model->nameErr . '</span>

            <br />

            <label for="email">Email:</label>
            <input class="form-field" type="text" id="email" name="email" value="' . $this->model->email . '" />
            <span class="error">*' . $this->model->emailErr . ' </span>

            <br />
            
            <label for="password">Password:</label>
            <input class="form-field" type="text" id="password" name="password" value="' . $this->model->password . '" />
            <span class="error">* ' . $this->model->passwordErr . '</span>

            <br />

            <label for="confirm_password">Confirm password:</label>
            <input class="form-field" type="text" id="confirm_password" name="confirm_password" value="' . $this->model->confirm_password . '" />
            <span class="error">* ' . $this->model->confirm_passwordErr . '</span>

            <br />

            <input type="hidden" name="page" value="register">
            <input type="submit" name="submit" value="Submit" id="submit">';
    }
}
