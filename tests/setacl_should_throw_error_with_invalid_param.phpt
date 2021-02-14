--TEST--
Set acl should throw erro with invalid param
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->setAcl(array());
--EXPECTF--
Warning: Zookeeper::setAcl() expects exactly %d parameters, %d given in %s on line %d
