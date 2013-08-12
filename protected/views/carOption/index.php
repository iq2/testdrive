<?php
/* @var $this CarOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Car Options',
);

$this->menu=array(
array('label'=>'Create CarOption', 'url'=>array('create')),
array('label'=>'Manage CarOption', 'url'=>array('admin')),
);
?>

<h1>Car Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
