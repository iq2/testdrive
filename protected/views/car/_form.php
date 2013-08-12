<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'car-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        )
    ); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'car_version_id'); ?>
        <?php echo $form->hiddenField($model, 'car_version_id'); ?>
        <?php echo $form->error($model, 'car_version_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'car_option_id'); ?>
        <?php echo $form->hiddenField($model, 'car_option_id'); ?>
        <?php echo $form->error($model, 'car_option_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'model'); ?>
        <?php echo $form->textField($model, 'model', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'model'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'color'); ?>
        <?php echo $form->textField($model, 'color', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'color'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->