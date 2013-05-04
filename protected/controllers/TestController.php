<?php

class TestController extends Controller {
    public function actions() {
        return array(
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionIndex(){
        $this->render('index', array());
    }

    public function actionChosen(){
        if(isset($_POST['country'])){
            print_r($_POST);
            die();
        }
        $this->render('choosen_form',array());
    }

    public function actionHighchart(){
        $this->render('highchart',array());
    }

    public function actionGroupGridView(){
        $dp1 = new CActiveDataProvider('User', array(
            'sort'=>array(
                'attributes'=>array(
                      'created_at',
                 ),
                 'defaultOrder' => 'created_at',
            ),
            'pagination' => array(
              'pagesize' => 10,
            ),
        ));
        $this->render('groupGridView',array('dp1'=>$dp1));
    }
}
