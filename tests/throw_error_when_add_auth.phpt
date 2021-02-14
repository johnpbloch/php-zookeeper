--TEST--
Should throw error when add auth
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
echo $client->addAuth(array());
--EXPECTF--
Warning: Zookeeper::addAuth() expects at least %d parameters, %d given in %s on line %d
