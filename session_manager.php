<?php
function logUserIn($name)
{
    $_SESSION['username'] = $name;
}

function isUserLoggedIn()
{
    return isset($_SESSION['username']);
}
function getLoggedInUsername()
{
    return ($_SESSION['username']);
}
function logUserOut()
{
    session_unset();
}
