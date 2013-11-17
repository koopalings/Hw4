<?php

   require_once(CONTROLLERS . '/helper.php');
   require_once(VIEWS . '/view.php');

/**
 *  This controller is responsible for rendering the landing page; in will also
 *  be called for adding and deleting an ad
 */
class Main {

    function __construct() {
        if (isset($_POST['add'])) 
            $this->add();
        else if (isset($_GET['delete']))
            $this->delete($_GET['delete']);
        else if (isset($_GET['reset']))
            $this->reset();
        
        $this->init();  // do stuff for view here
    }

    /*
     *
     */
    function init() {
        $ads = Ad::getAllAds();
        $HTMLstr = Helper::toHTML($ads);
        $view = new View($HTMLstr);
        $view->draw();
    }

    /*
     *  delete an ad
     */
    function delete($id) {
        Ad::deleteAd($id);
        unset($_GET['delete']);
    }

    /*
     *  add an ad
     */
    function add() {
        Ad::addAd($_POST['title'], $_POST['url'], $_POST['description']);
        unset($_POST['title']);
        unset($_POST['url']);
        unset($_POST['description']);
    }

    /*
     *  reset counter of all ads
     */
    function reset() {
        Ad::resetCounter();
        unset($_GET['reset']);
    }
}
?>