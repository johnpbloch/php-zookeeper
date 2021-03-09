--TEST--
Set null value and stats in node
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');

if ($client->exists('/tes')) {
    $client->delete('/tes');
}

$client->create('/tes', null, array(
    array(
        'perms'  => Zookeeper::PERM_ALL,
        'scheme' => 'world',
        'id'     => 'anyone'
    )
));

$stat = array('test' => 'zoo');
$client->set('/tes', null, -1, $stat);
echo gettype($client->get('/tes'));
$client->delete('/tes');
--EXPECT--
NULL
