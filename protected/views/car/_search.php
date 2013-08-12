<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
        )
    ); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'model'); ?>
        <?php echo $form->textField($model, 'model', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'color'); ?>
        <?php echo $form->textField($model, 'color', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'car_version_id'); ?>
        <?php echo $form->textField($model, 'car_version_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'car_option_id'); ?>
        <?php echo $form->textField($model, 'car_option_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->