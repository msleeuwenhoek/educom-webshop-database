<?php
require_once "forms_doc.php";

class ContactForm extends FormsDoc
{
  protected function showHeader()
  {
    echo "<h1>This is the contact page</h1>";
  }

  protected function showForm()
  {
    echo '
    <label for="name">Name:</label>
      <select id="title" name="title">
        <option value="" selected>Title</option>
        <option value="mr"';
    if (isset($this->model->title) && $this->model->title  == "mr") echo "selected";
    echo '>Mr</option>
        <option value="mrs"';
    if (isset($this->model->title) && $this->model->title == "mrs") echo "selected";
    echo '>Mrs</option>
      </select>
      <input class="form-field" type="text" id="name" name="name" value="' . $this->model->name . '" />
      <span class="error">* ' . $this->model->titleErr . '</span>
      <span class="error"> ' . $this->model->nameErr . '</span>

      <br />
      <label for="email">Email:</label>
      <input class="form-field" type="text" id="email" name="email" value="' . $this->model->email . '" />
      <span class="error">* ' . $this->model->emailErr . '</span>

      <br />
      <label for="phonenumber">Phone number:</label>
      <input class="form-field" type="text" id="phonenumber" name="phonenumber" value="' . $this->model->phonenumber . '" />
      <span class="error">* ' . $this->model->phonenumberErr . '</span>

      <br />
      <span>Preferred communication channel:</span>
      <input type="radio" id="email_channel" name="communication_channel" value="email"';
    if (isset($this->model->communication_channel) && $this->model->communication_channel == "email") echo "checked";
    echo ' />
      <label for="email_channel">Email</label>
      <input type="radio" id="phone_channel" name="communication_channel" value="phone"';
    if (isset($this->model->communication_channel) && $this->model->communication_channel == "phone") echo "checked";
    echo ' />
      <label for="phone_channel">Phone</label>
      <span class="error">* ' . $this->model->communication_channelErr . '</span>

      <br />
      <label for="message">Message:</label>
      <textarea class="form-field" name="message" id="message">' . $this->model->message . '</textarea>
      <br />
      <input type="hidden" name="page" value="contact">
      <input type="submit" name="submit" value="Submit" id="submit">';
  }
}
