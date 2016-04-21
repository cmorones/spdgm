<h3>Informes 2013</h3>

<hr/>

 <div class="span6">
<?php 
$this->widget('ext.select2.ESelect2',array(

  'name'=>'testing',
  'data'=>$data,
  'options'=>array(
                        'placeholder' => 'Seleccionar informe', 
                        'width'=>'100%',
                        'maximumSelectionSize'=>3,
                        

                    ),
  'events'=>array(
        'change'=>"js:function (element) {
            var id=element.val;
            if (id!='') {
                $.ajax('".$this->createUrl('/informesprov/fechas')."', {
                    data: {
                        id: id
                    }
                }).done(function(data) {
                    $('#req_res03').html(data);
                });
            }
        }"
    ),
  
)); 



?>

</div>
</div>
<div class="row-fluid">
<div class="span6" id="req_res03">...</div>
</div>