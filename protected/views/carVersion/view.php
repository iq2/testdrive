<?php
/* @var $this CarVersionController */
/* @var $model CarVersion */

$this->breadcrumbs=array(
	'Car Versions'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CarVersion', 'url'=>array('index')),
array('label'=>'Create CarVersion', 'url'=>array('create')),
array('label'=>'Update CarVersion', 'url'=>array('update', 'id'=>$model->id)),
array('label'=>'Delete CarVersion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CarVersion', 'url'=>array('admin')),
);
?>

<h1>View CarVersion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
'attributes'=>array(
		'id',
		'category',
		'hp',
		'fuel_type',
		'gearshift_type',
		'price',
),
)); ?>
