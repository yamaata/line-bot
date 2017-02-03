<?php
namespace Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use Library\Helper\LINEAPIHelper;
use Library\Helper\DocomoAPIHelper;

$jsonString = file_get_contents('php://input');
file_put_contents('line.json', $jsonString);

$docomoHelper = new DocomoAPIHelper();
$response = $docomoHelper->chat('眠い');

$chatReply = json_decode($response->getBody());

$lineHelper = new LINEAPIHelper();
$lineHelper->reply($chatReply->utt, 'replyToken');
