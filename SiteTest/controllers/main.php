<?php

require_once(MODELS . '/news.php');
require_once(CONTROLLERS . '/helper.php');
require_once(VIEWS . '/view.php');


/**
 *  This controller will be responsible for rendering news stories and ads
 */
class Main {
    function __construct() {
       $this->renderNews();
    }

    function renderNews() {
        //  get news from model
        $news = new News();
        $newsArr = $news->getNews();
        $HTMLstr = Helper::toHTMLStr($newsArr);
        View::draw($HTMLstr);
    }
}

?>