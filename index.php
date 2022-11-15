<?php
require_once './controllers/page_controller.php';
require_once './models/page_model.php';

$PageModel = new PageModel();
$controller = new PageController($PageModel);

$controller->handleRequest();
