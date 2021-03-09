--TEST--
ZookeeperConfig::set() with no auth
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
if (!class_exists('ZookeeperConfig'))
    echo 'skip Class ZookeeperConfig is not defined';
?>
--FILE--
<?php
$client = new Zookeeper();
$client->connect('127.0.0.1:2181');
$zkConfig = $client->getConfig();
try {
    $zkConfig->set("server.1=127.0.0.1:2888:3888:participant;0.0.0.0:2181");
} catch (ZookeeperAuthenticationException $e) {
    fprintf(STDOUT, "%s\n%d", $e->getMessage(), $e->getCode());
}

--EXPECT--
not authenticated
-102
