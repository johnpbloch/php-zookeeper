<?php
$client = new Zookeeper('127.0.0.1:2181');
echo $client->delete(array());
