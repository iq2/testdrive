<?php
/* @var $this CarVersionController */
/* @var $model CarVersion */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'car-version-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <div class="row">
            <?php echo $form->labelEx($model,'category'); ?>
            <?php echo $form->textField($model,'category',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'category'); ?>
        </div>

            <div class="row">
            <?php echo $form->labelEx($model,'hp'); ?>
            <?php echo $form->textField($model,'hp'); ?>
            <?php echo $form->error($model,'hp'); ?>
        </div>

            <div class="row">
            <?php echo $form->labelEx($model,'fuel_type'); ?>
            <?php echo $form->textField($model,'fuel_type',array('size'=>6,'maxlength'=>6)); ?>
            <?php echo $form->error($model,'fuel_type'); ?>
        </div>

            <div class="row">
            <?php echo $form->labelEx($model,'gearshift_type'); ?>
            <?php echo $form->textField($model,'gearshift_type',array('size'=>9,'maxlength'=>9)); ?>
            <?php echo $form->error($model,'gearshift_type'); ?>
        </div>

            <div class="row">
            <?php echo $form->labelEx($model,'price'); ?>
            <?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'price'); ?>
        </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->