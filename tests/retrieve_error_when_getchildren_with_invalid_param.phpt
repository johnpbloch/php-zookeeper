--TEST--
Should retrieve error when get children with invalid param
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->getChildren(array());
--EXPECTF--
Warning: Zookeeper::getChildren() expects parameter %d to be string, array given in %s on line %d
