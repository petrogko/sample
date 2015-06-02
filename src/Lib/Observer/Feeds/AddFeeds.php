<?php

namespace App\Lib\Observer\Feeds;

use App\Model\Entity\Article;
use Cake\Core\Exception\Exception;
use Cake\ORM\TableRegistry;

class AddFeeds {

    // TODO - optimize
    public function addFeed($data) {

        if(!empty($data)) {
            $tableToInsert = isset($data['table']) ? $data['table'] : '';
            $query = TableRegistry::get($tableToInsert)->query();

            // TODO - set default
            $mediumId = isset($data['params']['medium']) ? $data['params']['medium'] : 1;

            foreach ($data['params'] as $d) {
                $query->insert(['medium_id', 'title', 'author','created_on'])
                    ->values([
                        'medium_id' => $mediumId,
                        'title' => $d->text,
                        'author' => $d->user->name,
                        'created_on' => 'now()'
                    ]);

                try {
                    $query->execute();
                }catch (Exception $e) {
                    print_r($e->getMessage());
                }
            }
        }

    }

}