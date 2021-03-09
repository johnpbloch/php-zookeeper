--TEST--
Should set watcher
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');

function callback() {

}

echo gettype($client->setWatcher('callback'));
--EXPECTF--
boolean
