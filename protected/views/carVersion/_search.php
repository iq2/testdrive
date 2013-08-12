<?php
/* @var $this CarVersionController */
/* @var $model CarVersion */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'id'); ?>
            <?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
        </div>

                    <div class="row">
            <?php echo $form->label($model,'category'); ?>
            <?php echo $form->textField($model,'category',array('size'=>45,'maxlength'=>45)); ?>
        </div>

                    <div class="row">
            <?php echo $form->label($model,'hp'); ?>
            <?php echo $form->textField($model,'hp'); ?>
        </div>

                    <div class="row">
            <?php echo $form->label($model,'fuel_type'); ?>
            <?php echo $form->textField($model,'fuel_type',array('size'=>6,'maxlength'=>6)); ?>
        </div>

                    <div class="row">
            <?php echo $form->label($model,'gearshift_type'); ?>
            <?php echo $form->textField($model,'gearshift_type',array('size'=>9,'maxlength'=>9)); ?>
        </div>

                    <div class="row">
            <?php echo $form->label($model,'price'); ?>
            <?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
        </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->