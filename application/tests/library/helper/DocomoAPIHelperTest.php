<?php
namespace Library\Helper;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * Test Class for DocomoAPIHelper
 *
 * @package line-bot
 * @author Yuto Yamada
 * @see DocomoAPIHelper
 */
class DocomoAPIHelperTest extends TestCase
{
    /**
     * testing chat method communication enable.
     *
     * @see DocomoAPIHelper::chat()
     * @test
     */
    public function testChat()
    {
        $helper = new DocomoAPIHelper();
        $response = $helper->chat('おはよう');
        $result = json_decode($response->getBody());
        var_dump($result);
    }
}