<?php
/* @var $this CarController */
/* @var $model Car */
/* @var $carVersion CarVersion */

$this->breadcrumbs = array(
    'Cars' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Car', 'url' => array('index')),
    array('label' => 'Manage Car', 'url' => array('admin')),
);
?>

    <h1>Create Car</h1>

<!-- root element for the wizard -->
<div id="wizard_tabs">
<!-- tabs -->
<ul class="tabs">
    <li><a href="#" class="w2">Version</a></li>
    <li><a href="#" class="w2">Options</a></li>
    <li><a href="#" class="w2">Additional Settings</a></li>
</ul>

<!-- panes -->
<div class="panes">
    <div>
        <h2>Version</h2>
        <?php $this->renderPartial('/carVersion/_form', array('model' => $carVersion)); ?>
    </div>
    <div>
        <div class="options">
            <h2>Select Options</h2>
            <ul id="optionsList">

            </ul>
        </div>
    </div>
    <div>
        <h2>Additional Settings</h2>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
</div>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/car/create-wizard.js', CClientScript::POS_END); ?>