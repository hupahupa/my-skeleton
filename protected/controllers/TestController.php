<?php

class TestController extends Controller {
    public function actions() {
        return array(
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionChoosen(){
        if(isset($_POST['country'])){
            print_r($_POST);
            die();
        }
        $this->render('choosen_form',array());
    }
}
