<?php
$this->menu = array(
    array('label' => Yii::t('app', 'Chosen'), 'url' => array('/test/chosen')),
    array('label' => Yii::t('app', 'HighChart'), 'url' => array('/test/highchart')),
    array('label' => Yii::t('app', 'Group Grid View'), 'url' => array('/test/groupGridView')),
); ?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'Operations',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    ));
    $this->endWidget();
?>

