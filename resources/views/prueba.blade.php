<!DOCTYPE html>
<html>
<head>
	<title>prueba</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
    * {
    box-sizing: border-box;
    }

    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    [class*="col-"] {
      float: left;
      padding: 15px;
    }

    @media only screen and (min-width: 1034px) {
      .col-s-1 {width: 8.33%;}
      .col-s-2 {width: 16.66%;}
      .col-s-3 {width: 25%;}
      .col-s-4 {width: 33.33%;}
      .col-s-5 {width: 41.66%;}
      .col-s-6 {width: 50%;}
      .col-s-7 {width: 58.33%;}
      .col-s-8 {width: 66.66%;}
      .col-s-9 {width: 75%;}
      .col-s-10 {width: 83.33%;}
      .col-s-11 {width: 91.66%;}
      .col-s-12 {width: 100%;}

      .col-ss-0 {width: 3.33%;}
      .col-ss-1 {width: 20%;}
      .col-ss-2 {width: 12.88%;}
      .col-ss-3 {width: 11.88%;}
    }

      .col-1 {width: 8.33%;}
      .col-2 {width: 16.66%;}
      .col-3 {width: 25%;}
      .col-4 {width: 33.33%;}
      .col-5 {width: 41.66%;}
      .col-6 {width: 50%;}
      .col-7 {width: 58.33%;}
      .col-8 {width: 66.66%;}
      .col-9 {width: 75%;}
      .col-10 {width: 83.33%;}
      .col-11 {width: 91.66%;}
      .col-12 {width: 100%;}
    
    .contenedor {
        margin: 5px;
        border: 3px solid #ccc;
      }

     .contenedor-title {
     	background-color: #D8D8D8;
     	text-transform: uppercase;
     	height: 30px;
     	padding-top: 5px;
     }

    .smlist {
      border-bottom: solid 1px gray;
      height: 30px;
      margin-bottom: 10px;
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      text-align: center;
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      min-width: 360px;
    }

    .rborder {
      border-right: solid 1px gray;
    }

    </style>
</head>
	<body>
		<div class="contenedor">
			<div class="contenedor-title row">
				<label>Generalidades</label>
			</div>
			<div class="row">
				<div class="col-s-6">
					<label class="col-md-5 col-form-label text-md-right" style="font-weight:bold;">Objetivo de calidad No.:</label>
					<div class="col-md-5">
						{{$obj}}
					</div>
				</div>
				<div class="col-s-3">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Año:</label>
					<div class="col-md-5">
						{{$year}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-s-7">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Fecha de Aprobacion:</label>
					<div class="col-md-4">
						{{$F_aprovacion}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-s-7">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Fecha de Apertura:</label>
					<div class="col-md-4">
						{{$F_apertura}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-s-8">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Fecha prevista de cumplimiento:</label>
					<div class="col-md-4">
						{{$F_cumplimiento}}
					</div>
				</div>
			</div>
		</div>
		<br>
<!--////////////////////////////////////////////////////////////////////////////////////// -->
		<div class="contenedor">
			<div class="contenedor-title row">
				<label>Identificación</label>
			</div>
			<div class="row" style="padding-left: 10px;">
				<div class="row">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Descripción del objetivo de la calidad:</label>
				</div>
				<div class="col-s-12" >
					{{$desc}}
			    </div>
			</div>
			<div class="row" style="padding-left: 10px;">
				<div class="row">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Procesos:</label>
				</div>
				<div class="col-s-12" >
					{{$procesos[0]}} {{$procesos[1]}} {{$procesos[2]}}
				</div>
				
			</div>
			<div class="row">
				<div class="col-12">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Responsable:</label>
					<div class="col-12" >
						{{$responsable}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Indicador:</label>
					<div class="col-12" >
						{{$indicador}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<label class="col-form-label text-md-right" style="font-weight:bold;">Meta:</label>
					<div class="col-12" >
						{{$meta}}
					</div>
				</div>
			</div>
		</div>
		<br>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		<div class="contenedor">
			<div class="contenedor-title row">
				<label>Acciones</label>
			</div>
			<div class="row">
				<div class="col-1 rborder">
					<label style="font-weight:bold;">No.</label>
				</div>
				<div class="col-4 rborder">
					<label style="font-weight:bold;">Descripcion de la actividad</label>
				</div>
				<div class="col-2 rborder">
					<label style="font-weight:bold;">Responsable</label>
				</div>
				<div class="col-3 rborder">
					<label style="font-weight:bold;">Recursos requeridos</label>
				</div>
				<div class="col-2 rborder">
					<label style="font-weight:bold;">Fecha de inicio</label>
				</div>
			</div>
			<div id="1"></div>
			<div class="row" style="border-top: solid 1px gray;">
				<div class="col-1 rborder">
					<label style="font-weight:bold;">No.</label>
				</div>
				<div class="col-2 rborder">
					<label style="font-weight:bold;">Ponderación</label>
				</div>
				<div class="col-2 rborder">
					<label style="font-weight:bold;">Estado</label>
				</div>
				<div class="col-3 rborder">
					<label style="font-weight:bold;">Fecha de finalización</label>
				</div>
			</div>
			<div id="3"></div>
		</div>
		<br>
<!--///////////////////////////////////////////////////////////////////////////////////////////// -->
		<div class="contenedor">
			<div class="contenedor-title">
				Desempeño
			</div>
			<div class="row">
					<div class="col-1 rborder">
						<label style="font-weight:bold;">No.</label>
					</div>
					<div class="col-7 rborder">
						<label style="font-weight:bold;">Descripcion de la actividad</label>
					</div>
					<div class="col-4">
						<label style="font-weight:bold;">Ponderación Asignada</label>
					</div>
				</div>
			<div id="2"></div>
			<div class="row">
				<div class="col-10" style="border-top: solid 1px gray; border-right: solid 1px gray; height: 40px; width: 643px; padding-top: 10px; padding-left: 10px;">
					<label style="font-weight:bold;">Avance(%)</label>
				</div>
				<div style="border-top: solid 1px gray; padding-top: 10px;">
					<label id="total" style="margin-left: 10px;"></label>
				</div>
			</div>
		</div>
		<br>
		<div id="piechart"></div>
<!--/////////////////////////////////////////////////////////////////// -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		<script type="text/javascript">
		var usrname = @json(Auth::user()->name);
		var num = @json($num);
		var No = 1;
		var desc = @json($desc_acc);
		var resp = @json($resp_acc);
		var rec = @json($rec);
		var Fini = @json($F_inicio);
		var pon = @json($pond);
		var est = @json($est);
		var Ffin = @json($F_final);
		var pondTotal = 0;

		Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};

		function add_form(numero){

			var form = document.getElementById('1');
				var row = document.createElement('div');
				row.classList.add('row');
				row.setAttribute('id', 'row' + numero);

					var div_No = document.createElement('div');
					div_No.classList.add('col-1');
					div_No.classList.add('rborder');

						var text = document.createTextNode(numero);

					div_No.appendChild(text);

				row.appendChild(div_No);

					var div_desc = document.createElement('div');
					div_desc.classList.add('col-4');
					div_desc.classList.add('rborder');

						var in_desc = document.createElement('div');
						in_desc.style.width = "100%";

							var textdesc = document.createTextNode(desc[numero-1]);

						in_desc.appendChild(textdesc);

					div_desc.appendChild(in_desc);

				row.appendChild(div_desc);

					var div_resp = document.createElement('div');
					div_resp.classList.add('col-2');
					div_resp.classList.add('rborder');

						var in_resp = document.createElement('div');
						in_resp.style.width = "100%";

							var textresp = document.createTextNode(resp[numero-1]);

						in_resp.appendChild(textresp);

					div_resp.appendChild(in_resp);

				row.appendChild(div_resp);

					var div_rec = document.createElement('div');
					div_rec.classList.add('col-3');
					div_rec.classList.add('rborder');

						var in_rec = document.createElement('div');

							var textrec = document.createTextNode(rec[numero-1]);

						in_rec.appendChild(textrec);

					div_rec.appendChild(in_rec);

				row.appendChild(div_rec);

					var div_Fini = document.createElement('div');
					div_Fini.classList.add('col-2');
					div_Fini.classList.add('rborder');

						var in_Fini = document.createElement('div');

							var textFini = document.createTextNode(Fini[numero-1]);

						in_Fini.appendChild(textFini);

					div_Fini.appendChild(in_Fini);

				row.appendChild(div_Fini);

			form.appendChild(row);
//////////////////////////////////////////////////////////

			var form = document.getElementById('3');
				var row = document.createElement('div');
				row.classList.add('row');

					var div_No = document.createElement('div');
					div_No.classList.add('col-1');
					div_No.classList.add('rborder');

						var text = document.createTextNode(numero);

					div_No.appendChild(text);

				row.appendChild(div_No);

					var div_pond = document.createElement('div');
					div_pond.classList.add('col-2');
					div_pond.classList.add('rborder');

						var sel_pond = document.createElement('div');

							var text = document.createTextNode(pon[numero-1] + "%");

						sel_pond.appendChild(text);

					div_pond.appendChild(sel_pond);

				row.appendChild(div_pond);

					var div_estado = document.createElement('div');
					div_estado.classList.add('col-2');
					div_estado.classList.add('rborder');

						var sel_est = document.createElement('div');

							var text = document.createTextNode(est[numero-1]);

						sel_est.appendChild(text);
					div_estado.appendChild(sel_est);
				row.appendChild(div_estado);

					var div_Ffinal = document.createElement('div');
					div_Ffinal.classList.add('col-3');
					div_Ffinal.classList.add('rborder');

						var in_Ffinal = document.createElement('div');
							var text = document.createTextNode(Ffin[numero-1]);
						in_Ffinal.appendChild(text);

					div_Ffinal.appendChild(in_Ffinal);

				row.appendChild(div_Ffinal);

			form.appendChild(row);

///////////////////////////////////////////////////////////////////////////////////////
			var desempeño = document.getElementById('2');

				if(est[numero-1] == "cerrado"){
					var row = document.createElement('div');
					row.classList.add('row');
					row.setAttribute('id', 'row' + numero);

						var div_No = document.createElement('div');
						div_No.classList.add('col-1');
						div_No.classList.add('rborder');

							var text = document.createTextNode(numero);

						div_No.appendChild(text);

					row.appendChild(div_No);

					var div_desc = document.createElement('div');
					div_desc.classList.add('col-7');
					div_desc.classList.add('rborder');

						var in_desc = document.createElement('div');
						in_desc.style.width = "100%";

							var textdesc = document.createTextNode(desc[numero-1]);

						in_desc.appendChild(textdesc);

					div_desc.appendChild(in_desc);

				row.appendChild(div_desc);

					var div_pond = document.createElement('div');
					div_pond.classList.add('col-3');

						var sel_pond = document.createElement('div');

							var text = document.createTextNode(pon[numero-1] + "%");

						sel_pond.appendChild(text);

					div_pond.appendChild(sel_pond);

				row.appendChild(div_pond);

			desempeño.appendChild(row);

				pondTotal = pondTotal + Number(pon[numero-1]);

				}
		}

		var gra = [['Task', 'Actividades cerradas']];
		function rows(){
			var arr;
			var t = 0;
			for(var i = 0; i<num.length; i++){
					add_form(num[i]);
					if(est[i] == 'cerrado'){
						arr = ['actividad '+num[i],Number(pon[num[i]-1])];
						gra.push(arr);
						t = t + Number(pon[num[i]-1]);
					}
			}
			var total = document.getElementById('total');
				var text = document.createTextNode(pondTotal + "%");
			total.appendChild(text);

			if(t < 100){
				arr = ['actividades faltantes', 100-t];
				gra.push(arr);
			}
		}

		rows();

	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {

		var data = google.visualization.arrayToDataTable(gra);

		// Optional; add a title and set the width and height of the chart
		var options = {'title':'Actividades', 'width':550, 'height':400};

		var chart_div = document.getElementById('piechart');
		var chart = new google.visualization.PieChart(piechart);

		// Wait for the chart to finish drawing before calling the getImageURI() method.
		google.visualization.events.addListener(chart, 'ready', function () {
		chart_div.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
		console.log(chart_div.innerHTML);
		});

		chart.draw(data, options);
  	}

	</script>

	</body>
</html>