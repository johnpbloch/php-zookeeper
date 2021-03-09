--TEST--
Should get node with max size
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->create('/test1', 'something', array(
    array(
        'perms'  => Zookeeper::PERM_ALL,
        'scheme' => 'world',
        'id'     => 'anyone'
    )
));

$stat = '';
echo $client->get('/test1', null, $stat, 10);
echo "\n";
var_dump(gettype($stat));

$client->delete('/test1');
--EXPECT--
something
string(5) "array"
