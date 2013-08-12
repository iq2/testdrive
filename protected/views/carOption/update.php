<?php
    /* @var $this CarOptionController */
    /* @var $model CarOption */

$this->breadcrumbs=array(
	'Car Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'List CarOption', 'url'=>array('index')),
    array('label'=>'Create CarOption', 'url'=>array('create')),
    array('label'=>'View CarOption', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage CarOption', 'url'=>array('admin')),
    );
    ?>

    <h1>Update CarOption <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>