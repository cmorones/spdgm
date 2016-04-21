<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">

 <div class="page-header">
    <h1>DGM<small>Sistema Presupuestal</small></h1>
</div>
      
      </div>
    </div>

    </div><br><br><br>
    <br><br><br>

<div class="lw_right">
<div class="inner_right">
<div class="row-fluid">
	
    <div class="span6 offset3">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Acceso SPDGM",
	));
	
?>



  
    
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p><br>
    
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
      <tr>
        <td>
        <i class="icon-user"></i>
        <div class="input-icon left">
                <?php  echo $form->textField($model,'username', array('placeholder'=>'Usuario','tabindex'=>1)); ?><span class="new-status">&nbsp;</span>
        <?php echo $form->error($model,'username'); ?>
        </div>
        </td>
          </tr>

        <tr>
            <td>
        <i class="icon-lock"></i>
        <div class="input-icon left">

        <?php echo $form->passwordField($model,'password' , array('placeholder'=>'Contraseña','tabindex'=>2)); ?><span class="new-status">&nbsp;</span>
            
        </div>
            </td>
    </tr>


    <?php if($model->scenario == 'captchaRequired'):?>
    <tr class="captch-image">      
            <td>
        <?php echo $form->textField($model,'verifyCode', array('size'=>5,'tabindex'=>3));?>

        <?php $this->widget('CCaptcha'); ?>         
        </td>
    </tr>
    <?php endif; ?>

        <tr style="padding-top: 10px;">
            <td>
       
        <?php echo CHtml::submitButton('Enviar',array('align'=>'center','class'=>'submit','id'=>'login-button','tabindex'=>3)); ?>
        <?php //echo CHtml::link('Parent Login',array('parentlogin'), array('style'=>"color:#FFF; margin-left:20px;")); ?>
        </td> 
        </tr>

</table>
    
    <?php $this->endWidget(); ?>
    </div><!-- form -->

<?php $this->endWidget();?>

    </div>

</div>
</div>
</div>