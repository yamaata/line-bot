<?php

namespace Library\Helper;

require_once __DIR__ . '/../../../vendor/autoload.php';

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

/**
 * Class LINEAPIHelper
 *
 * @package line-bot
 * @author Yuto Yamada
 */
class LINEAPIHelper
{
    /**
     * @var LINEBot
     */
    private $bot;

    /**
     * @var string
     */
    const ACCESS_TOKEN = 'Your Access Token';

    /**
     * @var string
     */
    const CHANNEL_SECRET = 'Your Channel Secret';

    /**
     * LINEAPIHelper constructor.
     */
    public function __construct()
    {
        $this->bot = $this->createBOT();
    }

    /**
     * create BOT.
     *
     * @return LINEBot
     */
    private function createBOT() : LINEBot
    {
        $httpClient = new CurlHTTPClient(self::ACCESS_TOKEN);
        return new LINEBot($httpClient, ['channelSecret' => self::CHANNEL_SECRET]);
    }

    /**
     * reply message.
     *
     * @param string $message
     * @param string $replyToken
     */
    public function reply(string $message, string $replyToken) : void
    {
        $messageBuilder = new TextMessageBuilder($message);
        $this->bot->replyMessage($replyToken, $messageBuilder);
    }

}