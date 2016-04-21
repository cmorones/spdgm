
<?php echo CHtml::ajaxButton('Get Content2',
Yii::app()->createUrl('api/json2'), array(
'dataType' => 'json',
'type' => 'get',
'success' => 'function(result) {
$("#updateTitle").html(result.title);
$("#updateContent").html(result.content);
}'
) // ajax
); // script

?>

