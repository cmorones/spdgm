<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">DGM<small></small></a>
          
          <div class="nav-collapse">
		


    	<?php 
 if (!Yii::app()->user->isGuest) {
$perfil = Yii::app()->user->perfil;
//echo Yii::app()->user->nombre;

if($perfil==1){

      $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-left nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					           'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        
                        
                        array('label'=>'Administración<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                              array('label'=>'Libro Folios', 'url'=>array('/libroFolios/index', 'view'=>'forms')),
                          //  array('label'=>'Libro Folios 2015', 'url'=>array('/libroFolios/admin2', 'view'=>'forms')),
                         //   array('label'=>'Libro Folios 2014', 'url'=>array('/libroFolios/admin', 'view'=>'forms')),
                            array('label'=>'Clasificacion Libro folios', 'url'=>array('/clasif/admin', 'view'=>'forms')),
                            array('label'=>'Saldos Iniciales', 'url'=>array('/ingext/index', 'view'=>'forms')),
                            array('label'=>'Areas', 'url'=>array('/catAreas/admin', 'view'=>'forms')),
                            array('label'=>'Cuentas de Ingresos Extraordinarios', 'url'=>array('/catalogoCuentas/mostrar', 'view'=>'forms')),
                            array('label'=>'Partidas', 'url'=>array('/partidas/admin', 'view'=>'forms')),
                            array('label'=>'Clave Documentos', 'url'=>array('/claveDoctos/admin', 'view'=>'forms')),
                            array('label'=>'Banderas', 'url'=>array('/banderas/admin', 'view'=>'forms')),
                            array('label'=>'Conceptos', 'url'=>array('/conceptos/admin', 'view'=>'forms')),
                            array('label'=>'Proveedores', 'url'=>array('/proveedores/admin', 'view'=>'forms')),
                            array('label'=>'Subprogramas', 'url'=>array('/subprogramas/admin', 'view'=>'forms')),

                            //array('label'=>'Generar presupuesto trimestral', 'url'=>array('/presupuesto/generar', 'view'=>'forms')),
                           // array('label'=>'Eliminar presupuesto trimestral', 'url'=>array('/presupuesto/eliminar', 'view'=>'forms')),
                            array('label'=>'Codigos Programaticos', 'url'=>array('/codigosProg/admin', 'view'=>'forms')),
                           // array('label'=>'Ejercicios', 'url'=>array('/catEjercicio/admin', 'view'=>'forms')),
                           // array('label'=>'Trimestres', 'url'=>array('/trimestres/admin', 'view'=>'forms')),
                           //  array('label'=>'Exportar a Excel', 'url'=>array('/export/excel', 'view'=>'forms')),
                         
                        )),

                              array('label'=>'Gastos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                     'items'=>array(
                              array('label'=>'Mostrar Gastos', 'url'=>array('/baseCap/index', 'view'=>'about')),
                            //  array('label'=>'Operaciones con Terceros', 'url'=>array('/base/index', 'view'=>'about')),
                            //  array('label'=>'Informe declaración Informativa', 'url'=>array('/base/infdiot', 'view'=>'about')),
                         //    array('label'=>'Agregar Gasto', 'url'=>array('/baseCap/create', 'view'=>'forms')),
                         //   array('label'=>'Listar Gastos 2014', 'url'=>array('/baseCap/admin2', 'view'=>'about')),
                        //   array('label'=>'Listar Gastos 2015', 'url'=>array('/baseCap/admin4', 'view'=>'about')),
                         //  array('label'=>'Listar Gastos 2014', 'url'=>array('/baseCap/admin2', 'view'=>'about')),
                          array('label'=>'Conciliación de Gastos', 'url'=>array('/baseCap/index2', 'view'=>'about')),
                      
                        )),
                        //array('label'=>'Pagos', 'url'=>array('/pagos/admin')),
                         array('label'=>'Pagos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                       'items'=>array(
                                array('label'=>'Mostrar Pagos', 'url'=>array('/pagos/index', 'view'=>'about')),
                                array('label'=>'Informe de Pagos', 'url'=>array('/informesp/index', 'view'=>'forms')),
                             //   array('label'=>'Generar Poliza', 'url'=>array('/pagos/poliza', 'view'=>'forms')),
                         
                          //  array('label'=>'Agregar Ingreso', 'url'=>array('/baseIng/create', 'view'=>'forms')),
                         //   array('label'=>'Listar Ingresos 2013', 'url'=>array('/baseIng/admin', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2015', 'url'=>array('/baseIng/admin3', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2014', 'url'=>array('/baseIng/admin2', 'view'=>'about')),
                         //   array('label'=>'Ingresos Saldos Iniciales', 'url'=>array('/ingExt/admin', 'view'=>'about')),

                           )),

                          array('label'=>'Ingresos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                                array('label'=>'Mostrar Ingresos', 'url'=>array('/baseIng/index', 'view'=>'about')),
                                array('label'=>'Conciliación de Ingresos', 'url'=>array('/baseIng/index2', 'view'=>'about')),
                         
                          //  array('label'=>'Agregar Ingreso', 'url'=>array('/baseIng/create', 'view'=>'forms')),
                         //   array('label'=>'Listar Ingresos 2013', 'url'=>array('/baseIng/admin', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2015', 'url'=>array('/baseIng/admin3', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2014', 'url'=>array('/baseIng/admin2', 'view'=>'about')),
                         //   array('label'=>'Ingresos Saldos Iniciales', 'url'=>array('/ingExt/admin', 'view'=>'about')),

                           )),
                        


                          array('label'=>'Presupuesto<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                        array('label'=>'Actualizar presupuesto por partida ', 'url'=>array('/presupuesto/registro', 'view'=>'forms')),
                         //array('label'=>'Registrar presupuesto', 'url'=>array('/presupuesto/create', 'view'=>'forms')),
                         array('label'=>'Mostrar Presupuesto', 'url'=>array('/presupuesto/index', 'view'=>'forms')),
                       //  array('label'=>'Registro presupuestal 3er Trimestre 2014', 'url'=>array('/presupuesto/admin4', 'view'=>'forms')),
                       //  array('label'=>'Registro Apoyos Presupuestales', 'url'=>array('/presupuesto/admin3', 'view'=>'forms')),
                       //   array('label'=>'Registro presupuestal 2013', 'url'=>array('/presupuesto/admin', 'view'=>'forms')),
                     
                        )),
                      
                     
                        array('label'=>'Informes Presupuesto<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                          array('label'=>'Informe Presupuesto DGM', 'url'=>array('/informespto/pto', 'view'=>'forms')),
                          //array('label'=>'Informe Presupuesto 2do Trimestre 2014', 'url'=>array('/informespto/pto2do', 'view'=>'forms')),
                          //array('label'=>'Informe Presupuesto 3er Trimestre 2014', 'url'=>array('/informespto/pto3er', 'view'=>'forms')),
                          //array('label'=>'Informe SIAUWEB 1er Trimestre 2014', 'url'=>array('/informespto/ptosiau', 'view'=>'forms')),
                          array('label'=>'Informe SIAUWEB', 'url'=>array('/informespto/ptosiau2', 'view'=>'forms')),
                           
                //     array('label'=>'Consulta Presupuestal 2014', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                     //array('label'=>'Consulta Presupuestal 2015', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                     //     array('label'=>'Consulta Ejercido', 'url'=>array('/informesCp/ejercido', 'view'=>'forms')),
                         // array('label'=>'Exportar a Excel', 'url'=>array('/export/excel', 'view'=>'forms')),
                          
                        )),
 
                     
                        array('label'=>'Informes Gastos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                          
                          array('label'=>'Informe General Gastos por Presupuesto por Partida ', 'url'=>array('/informesf/partida', 'view'=>'forms')),
                         // array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          array('label'=>'Informe general Detalle', 'url'=>array('/informesC/index', 'view'=>'forms')),
                          
                        // array('label'=>'Informe por criterios2 2014', 'url'=>array('/informesC/index', 'view'=>'forms')),
                          array('label'=>'Informe General Presupuesto por Subprograma, Area', 'url'=>array('/informesfa/index', 'view'=>'forms')),
                         // array('label'=>'Consulta Presupuestal 2014', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                         // array('label'=>'Consulta Ejercido', 'url'=>array('/informesCp/ejercido', 'view'=>'forms')),
                         
                          
                        )),

  array('label'=>'Informes Ingresos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                    array('label'=>'Informe de Ingresos y Gastos', 'url'=>array('/informesf/index', 'view'=>'forms')),
                    array('label'=>'Informe de Ingresos Extraordinarios', 'url'=>array('/infIngresos/index', 'view'=>'forms')),
                     //     array('label'=>'Informe Preasignación de Recursos', 'url'=>array('/infIngresos/pre_asig', 'view'=>'forms')),
                     //     array('label'=>'Informe detalle de Ingresos', 'url'=>array('/informesC/ing', 'view'=>'forms')),
                     //     array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          
                          
                        )),
    array('label'=>'Totales<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                   // array('label'=>'Informe de Ingresos Extraordinarios', 'url'=>array('/infIngresos/index', 'view'=>'forms')),
                     //     array('label'=>'Informe Preasignación de Recursos', 'url'=>array('/infIngresos/pre_asig', 'view'=>'forms')),
                     //     array('label'=>'Informe detalle de Ingresos', 'url'=>array('/informesC/ing', 'view'=>'forms')),
                          array('label'=>'Informes de Ingresos y  Gastos extraordinarios', 'url'=>array('/informesf/index', 'view'=>'forms')),
                           array('label'=>'Informe de Proveedores', 'url'=>array('/proveedores/reporte', 'view'=>'forms')),
                     //      array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          
                          
                        )),

                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                      //  array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')), 
                    ),
                )); 

}

if($perfil==3){

      $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-left nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                     'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(


                            array('label'=>'Pagos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                       'items'=>array(
                               // array('label'=>'Mostrar Pagos', 'url'=>array('/pagos/index', 'view'=>'about')),
                                array('label'=>'Informe de Pagos', 'url'=>array('/informesp/index', 'view'=>'forms')),
                         
                          //  array('label'=>'Agregar Ingreso', 'url'=>array('/baseIng/create', 'view'=>'forms')),
                         //   array('label'=>'Listar Ingresos 2013', 'url'=>array('/baseIng/admin', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2015', 'url'=>array('/baseIng/admin3', 'view'=>'about')),
                         //   array('label'=>'Listar Ingresos 2014', 'url'=>array('/baseIng/admin2', 'view'=>'about')),
                         //   array('label'=>'Ingresos Saldos Iniciales', 'url'=>array('/ingExt/admin', 'view'=>'about')),

                           )),                    
                        
                     
                      
                     
                        array('label'=>'Informes Presupuesto<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                          array('label'=>'Informe Presupuesto DGM', 'url'=>array('/informespto/pto', 'view'=>'forms')),
                          //array('label'=>'Informe Presupuesto 2do Trimestre 2014', 'url'=>array('/informespto/pto2do', 'view'=>'forms')),
                          //array('label'=>'Informe Presupuesto 3er Trimestre 2014', 'url'=>array('/informespto/pto3er', 'view'=>'forms')),
                          //array('label'=>'Informe SIAUWEB 1er Trimestre 2014', 'url'=>array('/informespto/ptosiau', 'view'=>'forms')),
                          array('label'=>'Informe SIAUWEB', 'url'=>array('/informespto/ptosiau2', 'view'=>'forms')),
                           
                //     array('label'=>'Consulta Presupuestal 2014', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                     //array('label'=>'Consulta Presupuestal 2015', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                     //     array('label'=>'Consulta Ejercido', 'url'=>array('/informesCp/ejercido', 'view'=>'forms')),
                         // array('label'=>'Exportar a Excel', 'url'=>array('/export/excel', 'view'=>'forms')),
                          
                        )),
 
                     
                        array('label'=>'Informes Gastos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                          
                          array('label'=>'Informe General Gastos por Presupuesto por Partida ', 'url'=>array('/informesf/partida', 'view'=>'forms')),
                         // array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          array('label'=>'Informe general Detalle', 'url'=>array('/informesC/index', 'view'=>'forms')),
                          
                        // array('label'=>'Informe por criterios2 2014', 'url'=>array('/informesC/index', 'view'=>'forms')),
                          array('label'=>'Informe General Presupuesto por Suborograma, Area', 'url'=>array('/informesfa/index', 'view'=>'forms')),
                         // array('label'=>'Consulta Presupuestal 2014', 'url'=>array('/informesCp/index', 'view'=>'forms')),
                         // array('label'=>'Consulta Ejercido', 'url'=>array('/informesCp/ejercido', 'view'=>'forms')),
                         
                          
                        )),

  array('label'=>'Informes Ingresos<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                    array('label'=>'Informe de Ingresos y Gastos', 'url'=>array('/informesf/index', 'view'=>'forms')),
                    array('label'=>'Informe de Ingresos Extraordinarios', 'url'=>array('/infIngresos/index', 'view'=>'forms')),
                     //     array('label'=>'Informe Preasignación de Recursos', 'url'=>array('/infIngresos/pre_asig', 'view'=>'forms')),
                     //     array('label'=>'Informe detalle de Ingresos', 'url'=>array('/informesC/ing', 'view'=>'forms')),
                     //     array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          
                          
                        )),
    array('label'=>'Totales<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           
                   // array('label'=>'Informe de Ingresos Extraordinarios', 'url'=>array('/infIngresos/index', 'view'=>'forms')),
                     //     array('label'=>'Informe Preasignación de Recursos', 'url'=>array('/infIngresos/pre_asig', 'view'=>'forms')),
                     //     array('label'=>'Informe detalle de Ingresos', 'url'=>array('/informesC/ing', 'view'=>'forms')),
                          array('label'=>'Informes de Ingresos y  Gastos extraordinarios', 'url'=>array('/informesf/index', 'view'=>'forms')),
                     //      array('label'=>'Informe de Ingresos y  Gastos extraordinarios 2014', 'url'=>array('/informesf/ingext', 'view'=>'forms')),
                          
                          
                        )),

                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                      //  array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')), 
                    ),
                )); 

}


}else {
  $this->redirect(Yii::app()->homeUrl);
}

                ?>
    	</div>
    </div>
	</div>
</div>
 <br>
    <bR>
 
<div class="subnav navbar navbar-fixed-top">

</div><!-- subnav -->
