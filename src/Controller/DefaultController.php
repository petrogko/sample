<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Entity\Medium;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;
use App\Lib\Twitter\Codebird;
use App\Lib\Observer\Feeds;

/**
 * DefaultController
 *

 */
class DefaultController extends AppController
{

    public function index() {

        $medium = $this->array_first(TableRegistry::get('Medium')->find()->select()->where(['web_id'=>'twitter'])->toArray());
        $mediumKeys = json_decode($medium['config']);

        Codebird::setConsumerKey($mediumKeys->api_key, $mediumKeys->api_secret);
        $twitter = Codebird::getInstance();
        $twitter->setToken($mediumKeys->access_token, $mediumKeys->access_token_level);

        $params = array('q'=>'#toronto');
        $reply = (array) $twitter->search_tweets($params);
        $data = (array) $reply['statuses'];
        $data['medium'] = $medium['id'];

        $this->addToRecords($data);

        $this->set('tweets', $data);
    }

    // TODO - set common functions file
    function array_first($array) {
        return isset($array[0]) ? $array[0] : null;
    }

    // TODO - optimize Observer
    public function addToRecords($data) {
        $observerParams = array(
            'table' => 'Article',
            'params' => $data
        );

        $feedsObserver = new Feeds\AddFeeds();
        $feedsObserver->addFeed($observerParams);
    }
}
