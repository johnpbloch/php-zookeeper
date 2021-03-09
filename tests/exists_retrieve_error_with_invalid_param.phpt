--TEST--
Should retrieve error when set invalid parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
try {
    $client->exists(10);
} catch (ZookeeperException $ze) {
    printf("%s\n%d", $ze->getMessage(), $ze->getCode());
}
--EXPECTF--
bad arguments
-8