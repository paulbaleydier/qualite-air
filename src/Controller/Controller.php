<?php
namespace Controller;

class Controller {


    public static $dataLoaded;
  

    public function actionDefault(){
    }


    public function getView(){
        return isset($_GET["view"]) ? $_GET["view"] : null;
    }

}

?>