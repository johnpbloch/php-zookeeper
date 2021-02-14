--TEST--
Test should set debug level
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
echo $client->setDebugLevel(Zookeeper::LOG_LEVEL_WARN);
--EXPECT--
1
