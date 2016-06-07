<?php
/**
 * Created by PhpStorm.
 * User: aldrin.gau
 * Date: 3/18/2016
 * Time: 2:06 PM
 */

namespace App\Http\Controllers;
use League\Flysystem\Exception;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatController implements MessageComponentInterface {

    protected $clients;
    private $subscriptions;
    private $users;

    function __construct()
    {
        $this->clients = new \SplObjectStorage;
//        $this->subscriptions = [];
//        $this->users = [];
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo 'someone connected', PHP_EOL;
//        $this->users[$conn->resourceId] = $conn;
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = $this->clients->count() - 1;

        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $key => $client) {

            if ($from !== $client) {
//                 The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        echo 'someone has disconnected' . PHP_EOL;
//        unset($this->users[$conn->resourceId]);
//        unset($this->subscriptions[$conn->resourceId]);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";
        $conn->close();
    }
}