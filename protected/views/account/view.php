<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'Update Account', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>View Account #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account',
	),
)); 
echo "<div class='table-responsive'><table class='table table-condensed table-hover'>";
	foreach ($model->transactions[0]->attributeLabels() as $label) {
		echo "<th>$label</th>";
	}
	$pageSize=50;
	$i=0;
	$count=count($model->transactions);
	if($count>$pageSize)
		$i=$count-$pageSize;
	for ($i=$i;$i<$count;$i++) {
		$this->renderPartial('/transaction/_row', array('data'=>$model->transactions[$i]));
	}
echo "</table></div>";

?>
