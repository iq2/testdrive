<?php
/* @var $this CarOptionController */
/* @var $model CarOption */

$this->breadcrumbs=array(
	'Car Options'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CarOption', 'url'=>array('index')),
array('label'=>'Manage CarOption', 'url'=>array('admin')),
);
?>

<h1>Create CarOption</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>