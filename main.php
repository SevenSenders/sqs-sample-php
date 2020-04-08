<?php

require_once __DIR__.'/vendor/autoload.php';

$credentials = [
    'region' => 'eu-west-1',
    'version' => 'latest',
    'endpoint' => 'https://analytics-api.7senders.com/queue.xml',
    'credentials' => [
        'key'    => '<API-KEY>',
        'secret' => '',
   ]
];

$client = new \Aws\Sqs\SqsClient($credentials);

$result = $client->receiveMessage(['QueueUrl' => '', 'MaxNumberOfMessages' => 10]);

$messages = $result->get('Messages') ?: [];

echo sprintf("%d Messages have been retrieved\n", count($messages));

foreach($messages as $message) {
    echo $message['MessageId'] . "\n";
    echo $message['Body'] . "\n";
}

