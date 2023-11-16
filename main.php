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


// Delete a message from the queue
foreach($messages as $message) {
    $client->deleteMessage(['QueueUrl' => $message, 'ReceiptHandle' => $message['ReceiptHandle']]);
}

// Delete batch message from the queue
$entries = [];
foreach ($messages as $message) {
    $entries[] = [
        'Id' => $message['MessageId'], // A unique identifier
        'ReceiptHandle' => $message['ReceiptHandle'] // The receipt handle
    ];
}

$client->deleteMessageBatch(['QueueUrl' => $messages, 'Entries' => $entries]);

