<?php
/**
 * Copyright (c) 2020 Alberto González
 */

namespace Minimalism\App\Controller;

use Minimalism\Core\Controller;

/**
 * Class Home
 * @package Minimalism\App\Controller
 */
class Home extends Controller
{
    /**
     *
     */
    public function indexAction()
    {

        $url = 'http://www.eldiario.es/rss/section/10838';
        /*$atom = \Feed::loadAtom($url);

        d($atom);*/

        //$rss = \Feed::loadRss($url);

        $rss = simplexml_load_file($url);

        d($rss);

        echo 'Title: ', $rss->title;
        echo 'Description: ', $rss->description;
        echo 'Link: ', $rss->link;

        foreach ($rss->item as $item) {
            echo 'Title: ', $item->title;
            echo 'Link: ', $item->link;
            echo 'Timestamp: ', $item->timestamp;
            echo 'Description ', $item->description;
            echo 'HTML encoded content: ', $item->{'content:encoded'};
        }

        $this->addTwigVars('helloWorld', 'Mi first page class -> '.$this->getContainer()->get('config')->val('app.STABLE_VERSION'));
        $this->render();
    }
}
