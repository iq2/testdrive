<?php
    /* @var $this CarVersionController */
    /* @var $model CarVersion */

$this->breadcrumbs=array(
	'Car Versions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

    $this->menu=array(
    array('label'=>'List CarVersion', 'url'=>array('index')),
    array('label'=>'Create CarVersion', 'url'=>array('create')),
    array('label'=>'View CarVersion', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage CarVersion', 'url'=>array('admin')),
    );
    ?>

    <h1>Update CarVersion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>