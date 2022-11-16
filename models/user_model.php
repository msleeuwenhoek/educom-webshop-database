<?php

require_once 'page_model.php';

class User extends PageModel
{

    public $title = '';
    public $titleErr = '';
    public $phonenumber = '';
    public $phonenumberErr = '';
    public $communication_channel = '';
    public $communication_channelErr = '';
    public $message = '';

    public $name = "";
    public $nameErr = '';
    public $email = '';
    public $emailErr = '';
    public $password = '';
    public $passwordErr = '';
    public $confirm_password = '';
    public $confirm_passwordErr = '';
    public $valid = false;
    public $user = "";
    public $userId = '';

    public function __construct($userCrud)
    {
        $this->userCrud = $userCrud;
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function  validateRegistration()
    {   // validating form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = $this->test_input($_POST["name"]);
            }

            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["password"])) {
                $this->passwordErr = "Password is required";
            } else {
                $this->password = $this->test_input($_POST["password"]);
            }

            if (empty($_POST["confirm_password"])) {
                $this->confirm_passwordErr = "Please confirm your password";
            } else {
                $this->confirm_password = $this->test_input($_POST["confirm_password"]);
                if ($_POST["confirm_password"] !== $_POST["password"]) {
                    $this->confirm_passwordErr = "Passwords don't match";
                }
            }
        }

        // checking if all data is valid
        if ($this->name !== "" && $this->email !== "" && $this->password !== "" && $this->confirm_password !== "" && $this->nameErr === "" && $this->emailErr === "" && $this->passwordErr === "" && $this->confirm_passwordErr === "") {
            if ($this->userCrud->findUser($this->email)->num_rows > 0) {
                $this->emailErr = "Email is already taken";
            }

            if ($this->emailErr === "") {
                $this->valid = true;
            }
        }
    }

    public function validateLogin()
    {   // validating form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = $this->test_input($_POST["email"]);
            }

            if (empty($_POST["password"])) {
                $this->passwordErr = "Password is required";
            } else {
                $this->password = $this->test_input($_POST["password"]);
            }
        }
        // checking if all data matched database and was valid
        if ($this->email !== "" && $this->password !== ""  && $this->emailErr === "" && $this->passwordErr === "") {
            $this->user = $this->userCrud->findUser($this->email)->fetch_assoc();
            if (empty($this->user)) {
                $this->emailErr = "Couldn't find an account with this email";
            } elseif ($this->user['password'] !== $this->password) {
                $this->passwordErr = "Incorrect password";
            } else {
                $this->email = $this->user['email'];
                $this->name = $this->user['name'];
                $this->userId = $this->user['id'];
                $this->valid = true;
            }
        }
    }

    public function validateContact()
    {
        // validating form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["title"])) {
                $this->titleErr = "Please indicate a title";
            } else {
                $this->title = $this->test_input($_POST["title"]);
            }

            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = $this->test_input($_POST["name"]);
            }

            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["phonenumber"])) {
                $this->phonenumberErr = "Phone number is required";
            } else {
                $this->phonenumber = $this->test_input($_POST["phonenumber"]);
            }

            if (empty($_POST["communication_channel"])) {
                $this->communication_channelErr = "Please indicate your preferred communication channel";
            } else {
                $this->communication_channel = $this->test_input($_POST["communication_channel"]);
            }

            if (empty($_POST["message"])) {
                $this->message = "";
            } else {
                $this->message = $this->test_input($_POST["message"]);
            }
        }
        // checking if all data is valid
        if ($this->title !== "" && $this->name !== "" && $this->email !== "" && $this->phonenumber !== "" && $this->communication_channel !== "" && $this->titleErr === "" &&  $this->nameErr === "" && $this->emailErr === "" && $this->phonenumberErr === "" && $this->communication_channelErr === "") {
            $this->valid = true;
        }
    }

    public function storeUser()
    {
        $this->userCrud->createUser($this->name, $this->email, $this->password);
    }
}
