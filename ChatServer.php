<?php
/**
 * Created by PhpStorm.
 * User: aldrin.gau
 * Date: 3/18/2016
 * Time: 2:25 PM
 */

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\ChatController;

require 'vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatController()
        )
    ),
    8080
);

$server->run();