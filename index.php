<?php
    namespace APIREST;

    require_once('assets/config/autoload.php');

    use assets\API;
 
    $api = new API();

    $api->routeConfig();