<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'category-form',
    'enableAjaxValidation'=>false,
)); ?>

<?= CHtml::label('Choose list demo', '', array())?>
<?/*
<?= CHtml::label('Standard Select:', '', array())?>
<?= CHtml::dropDownList('country','',
    MyHtml::getCountryOptions(),
    array(
        'data-placeholder'=>Yii::t('app','Choose a Country...'),
        'class'=>'country-list',
    )
) ?>
<?php $this->widget( 'application.extensions.EChosen.EChosen', array(
  'id'=> 'list-1',
  'target' => '.country-list',
  'options'=>array(),
)); ?>

*/?>
<?/*
<?= CHtml::label('Multiple Select:', '', array())?>
<?= CHtml::dropDownList('country','',
    MyHtml::getCountryOptions(),
    array(
        'data-placeholder'=>Yii::t('app','Choose a Country...'),
        'class'=>'country-list-mul',
        'multiple' => 'multiple',
    )
) ?>
<?php $this->widget( 'application.extensions.EChosen.EChosen', array(
  'id'=> 'list',
  'target' => '.country-list-mul',
  'options'=>array(),
)); ?>
 */?>


<?= CHtml::label('Select and deselect', '', array())?>
<?= CHtml::dropDownList('country','',
    MyHtml::getCountryOptions(),
    array(
        'empty'=> Yii::t('app',''),//Just work when first element is empty
        'data-placeholder'=>Yii::t('app','Choose a Country...'),
        'class'=>'country-list',
    )
) ?>
<?php $this->widget( 'application.extensions.EChosen.EChosen', array(
  'id'=> 'list-1',
  'target' => '.country-list',
  'options'=>array('allow_single_deselect'=> true),
)); ?>
<div class="submitBtn"><?= CHtml::htmlButton('Submit', array('type' => 'submit', 'class' => 'btn btn-info')) ?></div>
<?php $this->endWidget(); ?>

