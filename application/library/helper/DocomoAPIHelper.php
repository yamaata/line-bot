<?php
namespace Library\Helper;

require_once __DIR__ . '/../../../vendor/autoload.php';

/**
 * docomo API Helper
 *
 * @package line-bot
 * @author Yuto Yamada
 */
class DocomoAPIHelper
{
    const API_BASE_URL = 'https://api.apigw.smt.docomo.ne.jp/dialogue/v1/dialogue';

    /**
     * API Key
     * @var string
     */
    const API_KEY = 'Your API Key';

    /**
     * chat with bot
     *
     * @param string $message
     * @return \HTTP_Request2_Response
     */
    public function chat(string $message) : \HTTP_Request2_Response
    {
        $request = new \HTTP_Request2();
        $request->setUrl(self::API_BASE_URL . '?APIKEY=' . self::API_KEY);
        $request->setMethod(\HTTP_Request2::METHOD_POST);
        $request->setHeader('Content-Type', 'application/json');
        $params = [
            'utt' => $message,
            't' => '20',
        ];
        $request->setBody(json_encode($params));
        $response = $request->send();

        if ($response->getStatus() != 200) {
            throw new \RuntimeException($response->getBody());
        }

        return $response;
    }
}