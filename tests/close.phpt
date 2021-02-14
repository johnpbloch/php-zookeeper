--TEST--
Should connect to the ZooKeeper and close it
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper();
$client->connect('127.0.0.1:2181');
echo gettype($client->close());
--EXPECT--
NULL
