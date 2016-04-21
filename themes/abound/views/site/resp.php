<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<?php
$gridDataProvider = new CArrayDataProvider(array(
    array('id'=>154,
     'subprograma'=>'DGM',
     'presupuesto'=>'803,880.00',
     'Ene'=>'10,440.00',
     'Feb'=>'10,440.00',
     'Mar'=>'10,440.00',
     'Abr'=>'10,440.00',
     'May'=>'10,440.00',
     'Jun'=>'10,440.00',
     'Jul'=>'10,440.00',
     'Ago'=>'10,440.00',
     'Sep'=>'10,440.00',
     'Oct'=>'10,440.00',
     'Nov'=>'10,440.00',
     'Dic'=>'10,440.00',

     'Ejercido'=>'596,820.00',
     'Disponible'=>'207,820.00',

     ),
    array('id'=>182,
     'subprograma'=>'DGM',
     'presupuesto'=>'803,880.00',
     'Ene'=>'10,440.00',
     'Feb'=>'10,440.00',
     'Mar'=>'10,440.00',
     'Abr'=>'10,440.00',
     'May'=>'10,440.00',
     'Jun'=>'10,440.00',
     'Jul'=>'10,440.00',
     'Ago'=>'10,440.00',
     'Sep'=>'10,440.00',
     'Oct'=>'10,440.00',
     'Nov'=>'10,440.00',
     'Dic'=>'10,440.00',

     'Ejercido'=>'596,820.00',
     'Disponible'=>'207,820.00',

     ),

    array('id'=>'Totales',
     'subprograma'=>'',
     'presupuesto'=>'1803,880.00',
     'Ene'=>'10,440.00',
     'Feb'=>'10,440.00',
     'Mar'=>'10,440.00',
     'Abr'=>'10,440.00',
     'May'=>'10,440.00',
     'Jun'=>'10,440.00',
     'Jul'=>'10,440.00',
     'Ago'=>'10,440.00',
     'Sep'=>'10,440.00',
     'Oct'=>'10,440.00',
     'Nov'=>'10,440.00',
     'Dic'=>'10,440.00',

     'Ejercido'=>'596,820.00',
     'Disponible'=>'207,820.00',

     ),
  
));

$total =0;
$nums =1;
foreach ($model as $registro) { ?>
 <?php
  $total = $total + $registro->presupuesto;
  $nums++;
   } 

   $total =number_format($total)
?>

<div class="row-fluid">
  <div class="span3 ">

	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="weekly-visit">8,4,6,5,9,10</li>
		<li class="stat-count"><span>$23,000</span><span>Gastos Agosto</span></li>
		<li class="stat-percent"><span class="text-success stat-percent">20%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="new-visits">2,4,9,1,5,7,6</li>
		<li class="stat-count"><span>$123,780</span><span>Ingresos Agosto</span></li>
		<li class="stat-percent"><span class="text-error stat-percent">-15%</span></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="unique-visits">200,300,500,200,300,500,1000</li>
		<li class="stat-count"><span>$<?=$total?></span><span>Presupuesto</span></li>
		<li class="stat-percent"></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-graph inlinebar" id="">1000,3000,6000,8000,3000,8000,10000</li>
		<li class="stat-count"><span>$25,000</span><span>Disponible</span></li>
		<li class="stat-percent"><span><span class="text-success stat-percent">20%</span></li>
	  </ul>
	</div>
  </div>
</div>

<div class="row-fluid">

    
	<div class="span9">
      <?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-picture"></span>Presupuesto',
			'titleCssClass'=>''
		));
		?>
        
        <div class="auto-update-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php $this->endWidget(); ?>
        
	</div>
	<div class="span3">
		<div class="summary">
          <ul>
          	<li>
          		<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/credit.png" width="36" height="36" alt="Monthly Income">
                </span>
                <span class="summary-number">$78,245</span>
                <span class="summary-title">Gasto en Agosto</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/page_white_edit.png" width="36" height="36" alt="Open Invoices">
                </span>
                <span class="summary-number">125</span>
                <span class="summary-title"> Folios Aceptados</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/page_white_excel.png" width="36" height="36" alt="Open Quotes<">
                </span>
                <span class="summary-number">53</span>
                <span class="summary-title"> Folios Pendientes</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/folder_page.png" width="36" height="36" alt="Active Members">
                </span>
                <span class="summary-number">1</span>
                <span class="summary-title"> Folios Rechazados</span>
            </li>
            <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/folder_page.png" width="36" height="36" alt="Recent Conversions">
                </span>
                <span class="summary-number">30</span>
                <span class="summary-title"> Folios en Tramite</span></li>
        
          </ul>
        </div>

	</div>
</div>


<div class="row-fluid">
	<div class="span12">
         <span class="summary-number">DIRECCION GENERAL DE MUSICA</span>
	  <?php $this->widget('zii.widgets.grid.CGridView', array(
			/*'type'=>'striped bordered condensed',*/
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProvider,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'id', 'header'=>'#Partida'),
				array('name'=>'subprograma', 'header'=>'Subprog'),
				array('name'=>'presupuesto', 'header'=>'Presupuesto'),
				array('name'=>'Ene', 'header'=>'Ene'),
                array('name'=>'Feb', 'header'=>'Feb'),
                array('name'=>'Mar', 'header'=>'Mar'),
                array('name'=>'Abr', 'header'=>'Abr'),
                array('name'=>'May', 'header'=>'May'),
                array('name'=>'Jun', 'header'=>'Jun'),
                 array('name'=>'Jul', 'header'=>'Jul'),
                  array('name'=>'Ago', 'header'=>'Ago'),
                   array('name'=>'Sep', 'header'=>'Sep'),
                    array('name'=>'Oct', 'header'=>'Oct'),
                     array('name'=>'Nov', 'header'=>'Nov'),
                      array('name'=>'Dic', 'header'=>'Dic'),
                      array('name'=>'Ejercido', 'header'=>'Ejercido'),
                      array('name'=>'Disponible', 'header'=>'Disponible'),
				
				
			),
		)); ?>
	</div><!--/span-->

</div><!--/row-->

<div class="row-fluid">
    <div class="span12">
         <span class="summary-number">ORQUESTA JUVENIL "EDUARDO MATA"</span>
      <?php $this->widget('zii.widgets.grid.CGridView', array(
            /*'type'=>'striped bordered condensed',*/
            'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
            'dataProvider'=>$gridDataProvider,
            'template'=>"{items}",
            'columns'=>array(
                array('name'=>'id', 'header'=>'#Partida'),
                array('name'=>'subprograma', 'header'=>'Subprog'),
                array('name'=>'presupuesto', 'header'=>'Presupuesto'),
                array('name'=>'Ene', 'header'=>'Ene'),
                array('name'=>'Feb', 'header'=>'Feb'),
                array('name'=>'Mar', 'header'=>'Mar'),
                array('name'=>'Abr', 'header'=>'Abr'),
                array('name'=>'May', 'header'=>'May'),
                array('name'=>'Jun', 'header'=>'Jun'),
                 array('name'=>'Jul', 'header'=>'Jul'),
                  array('name'=>'Ago', 'header'=>'Ago'),
                   array('name'=>'Sep', 'header'=>'Sep'),
                    array('name'=>'Oct', 'header'=>'Oct'),
                     array('name'=>'Nov', 'header'=>'Nov'),
                      array('name'=>'Dic', 'header'=>'Dic'),
                      array('name'=>'Ejercido', 'header'=>'Ejercido'),
                      array('name'=>'Disponible', 'header'=>'Disponible'),
                
                
            ),
        )); ?>
    </div><!--/span-->

</div><!--/row-->


	<!--<div class="span2">
    	<input class="knob" data-width="100" data-displayInput=false data-fgColor="#5EB95E" value="35">
    </div>
	<div class="span2">
     	<input class="knob" data-width="100" data-cursor=true data-fgColor="#B94A48" data-thickness=.3 value="29">
    </div>
	<div class="span2">
         <input class="knob" data-width="100" data-min="-100" data-fgColor="#F89406" data-displayPrevious=true value="44">     	
	</div><!--/span-->
</div><!--/row-->

          


<script>
            $(function() {

                $(".knob").knob({
                    /*change : function (value) {
                        //console.log("change : " + value);
                    },
                    release : function (value) {
                        console.log("release : " + value);
                    },
                    cancel : function () {
                        console.log("cancel : " + this.value);
                    },*/
                    draw : function () {

                        // "tron" case
                        if(this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                , sa = this.startAngle          // Previous start angle
                                , sat = this.startAngle         // Start angle
                                , ea                            // Previous end angle
                                , eat = sat + a                 // End angle
                                , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                                && (sat = eat - 0.3)
                                && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.v);
                                this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    min : 0
                                    , max : 20
                                    , stopper : false
                                    , change : function () {
                                                    if(v > this.cv){
                                                        if(up){
                                                            decr();
                                                            up=0;
                                                        }else{up=1;down=0;}
                                                    } else {
                                                        if(v < this.cv){
                                                            if(down){
                                                                incr();
                                                                down=0;
                                                            }else{down=1;up=0;}
                                                        }
                                                    }
                                                    v = this.cv;
                                                }
                                    });
            });
        </script>