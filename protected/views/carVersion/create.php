<?php
/* @var $this CarVersionController */
/* @var $model CarVersion */

$this->breadcrumbs=array(
	'Car Versions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CarVersion', 'url'=>array('index')),
array('label'=>'Manage CarVersion', 'url'=>array('admin')),
);
?>

<h1>Create CarVersion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>