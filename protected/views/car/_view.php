<?php
/* @var $this CarController */
/* @var $data Car */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
    <?php echo CHtml::encode($data->model); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
    <?php echo CHtml::encode($data->color); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
    <?php echo CHtml::encode($data->price); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('car_version_id')); ?>:</b>
    <?php echo CHtml::encode($data->car_version_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('car_option_id')); ?>:</b>
    <?php echo CHtml::encode($data->car_option_id); ?>
    <br/>


</div>