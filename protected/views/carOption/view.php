<?php
/* @var $this CarOptionController */
/* @var $model CarOption */

$this->breadcrumbs=array(
	'Car Options'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CarOption', 'url'=>array('index')),
array('label'=>'Create CarOption', 'url'=>array('create')),
array('label'=>'Update CarOption', 'url'=>array('update', 'id'=>$model->id)),
array('label'=>'Delete CarOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CarOption', 'url'=>array('admin')),
);
?>

<h1>View CarOption #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
'attributes'=>array(
		'id',
		'description',
		'price',
),
)); ?>
