@extends('layouts.plantilla')

@section('content')
	<div class="row">
		<div class="col-4" style="margin-left: 10px;">
			<button class="btn" onclick="mostrar('buscar');"><i class="fa fa-search"></i></button>
		</div>
	</div>

	<div class="modal" id="buscar">
		<div class="container modal-content">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header">Buscar ficha para consulta</div>
						<form method="POST" action="/BuscarF">
							@csrf
							<div class="row">
								<div class="col-s-4">
									<label>Buscar objetivo:</label>
									<select class="form-control" name="obj" type="integer" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="col-s-4">
									<label>Buscar año</label>
									<input type="number" step="1" name="year" required="" value=<?php echo date('Y'); ?>>
								</div>
							</div>
							<div class="row">
								<div class="col-s-4" style="margin-left: 30%;">
									<input type="submit" value="Buscar">
									<input type="reset" value="cancelar" onclick="cancelar('buscar')">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if($id == -1)
		<div class="col-s-3"></div>
		<div class="contenedor col-s-5">
			<h1 style="text-align: center; text-transform: uppercase; color: #4CAF50;">Objetivo {{$obj}} y Año {{$year}} No encontrado</h1>
		</div>
	@elseif($id > 0)
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
					<div class="card-header">Generalidades</div>
						<form>
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
						</form>
					</div>
				</div>
			</div>
		</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////-->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
					<div class="card-header">Identificación</div>
						<form>
							<div class="row">
								<div class="col-s-12">
									<label class="col-form-label text-md-right" style="font-weight:bold;">Descripción del objetivo de la calidad:</label>
									<div class="col-s-12" style="background-color: #E0F8F7;">
										{{$desc}}
								    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-s-12">
									<label class="col-form-label text-md-right" style="font-weight:bold;">Procesos:</label>
									<div class="col-s-12" style="background-color: #E0F8F7;">
										{{$procesos[0]}} {{$procesos[1]}} {{$procesos[2]}}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<label class="col-form-label text-md-right" style="font-weight:bold;">Responsable:</label>
									<div class="col-12" style="background-color: #E0F8F7;">
										{{$responsable}}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<label class="col-form-label text-md-right" style="font-weight:bold;">Indicador:</label>
									<div class="col-12" style="background-color: #E0F8F7;">
										{{$indicador}}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<label class="col-form-label text-md-right" style="font-weight:bold;">Meta:</label>
									<div class="col-12" style="background-color: #E0F8F7;">
										{{$meta}}
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////-->
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card">
					<div class="card-header">Acciones</div>
					<form>
						<div class="row">
							<div class="col-ss-0 rborder">
								<label style="font-weight:bold;">No.</label>
							</div>
							<div class="col-ss-1 rborder">
								<label style="font-weight:bold;">Descripcion de la actividad</label>
							</div>
							<div class="col-s-1 rborder">
								<label style="font-weight:bold;">Responsable</label>
							</div>
							<div class="col-ss-2 rborder">
								<label style="font-weight:bold;">Recursos requeridos</label>
							</div>
							<div class="col-ss-3 rborder">
								<label style="font-weight:bold;">Fecha de inicio</label>
							</div>
							<div class="col-s-1 rborder">
								<label style="font-weight:bold;">Ponderación</label>
							</div>
							<div class="col-s-1 rborder">
								<label style="font-weight:bold;">Estado</label>
							</div>
							<div class="col-ss-3 rborder">
								<label style="font-weight:bold;">Fecha de finalización</label>
							</div>
							<div class="col-s-1">
								<label style="font-weight:bold;">Evidencias</label>
							</div>
						</div>
						<div id="1"></div>
					</form>
				</div>
			</div>
		</div>
<!--//////////////////////////////////////////////////////////////////////////////// -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
					<div class="card-header">Desempeño</div>
						<form>
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
							<div style="width: 64.7%; border-top: solid 1px gray; margin-left: 15px; border-right: solid 1px gray;">
								<label style="font-weight:bold;">Avance(%)</label>
							</div>
							<div style="width: 31.5%; border-top: solid 1px gray;">
								<label id="3" style="font-weight:bold; margin-left: 15px;"></label>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

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
		var evid = @json($evid);
		var e = [];
		var eliminar = [];
		var pondTotal = 0;

		Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};

		// Get the size of an object
		var size = Object.size(evid);

		function add_form(numero){

			var form = document.getElementById('1');
				var row = document.createElement('div');
				row.classList.add('row');
				row.setAttribute('id', 'row' + numero);

					var div_No = document.createElement('div');
					div_No.classList.add('col-ss-0');
					div_No.classList.add('rborder');

					var in_No = document.createElement('input');
						in_No.setAttribute('type', 'hidden');
						in_No.setAttribute('name', 'No' + numero);
						in_No.setAttribute('value', numero);

						var text = document.createTextNode(numero);

					div_No.appendChild(in_No);
					div_No.appendChild(text);

				row.appendChild(div_No);

					var div_desc = document.createElement('div');
					div_desc.classList.add('col-ss-1');
					div_desc.classList.add('rborder');

						var in_desc = document.createElement('div');
						in_desc.style.width = "100%";

							var textdesc = document.createTextNode(desc[numero-1]);

						in_desc.appendChild(textdesc);

					div_desc.appendChild(in_desc);

				row.appendChild(div_desc);

					var div_resp = document.createElement('div');
					div_resp.classList.add('col-s-1');
					div_resp.classList.add('rborder');

						var in_resp = document.createElement('div');
						in_resp.style.width = "100%";

							var textresp = document.createTextNode(resp[numero-1]);

						in_resp.appendChild(textresp);

					div_resp.appendChild(in_resp);

				row.appendChild(div_resp);

					var div_rec = document.createElement('div');
					div_rec.classList.add('col-ss-2');
					div_rec.classList.add('rborder');

						var in_rec = document.createElement('div');

							var textrec = document.createTextNode(rec[numero-1]);

						in_rec.appendChild(textrec);

					div_rec.appendChild(in_rec);

				row.appendChild(div_rec);

					var div_Fini = document.createElement('div');
					div_Fini.classList.add('col-ss-3');
					div_Fini.classList.add('rborder');

						var in_Fini = document.createElement('div');

							var textFini = document.createTextNode(Fini[numero-1]);

						in_Fini.appendChild(textFini);

					div_Fini.appendChild(in_Fini);

				row.appendChild(div_Fini);

					var div_pond = document.createElement('div');
					div_pond.classList.add('col-s-1');
					div_pond.classList.add('rborder');

						var sel_pond = document.createElement('div');

							var text = document.createTextNode(pon[numero-1] + "%");

						sel_pond.appendChild(text);

					div_pond.appendChild(sel_pond);

				row.appendChild(div_pond);

					var div_estado = document.createElement('div');
					div_estado.classList.add('col-s-1');
					div_estado.classList.add('rborder');

						var sel_est = document.createElement('div');

							var text = document.createTextNode(est[numero-1]);

						sel_est.appendChild(text);
					div_estado.appendChild(sel_est);
				row.appendChild(div_estado);

					var div_Ffinal = document.createElement('div');
					div_Ffinal.classList.add('col-ss-3');
					div_Ffinal.classList.add('rborder');

						var in_Ffinal = document.createElement('div');
							var text = document.createTextNode(Ffin[numero-1]);
						in_Ffinal.appendChild(text);

					div_Ffinal.appendChild(in_Ffinal);

				row.appendChild(div_Ffinal);

				var div_evid = document.createElement('div');
					div_evid.classList.add('col-s-1');

						var but_evi = document.createElement('button');
						but_evi.classList.add('btn')
						but_evi.classList.add('fa')
						but_evi.classList.add('fa-folder-open');
						but_evi.setAttribute('type', 'button');
						but_evi.setAttribute('value', 'mod' + numero);
						but_evi.onclick = function() {mostrar(but_evi.value)}
						
							div_mod = document.createElement('div');
							div_mod.classList.add('modal');
							div_mod.setAttribute('id', 'mod' + numero);

								div_cont = document.createElement('div');
								div_cont.classList.add('container');
								div_cont.classList.add('modal-content');
								div_cont.setAttribute('id', 'cont' + numero);

									div_btadd = document.createElement('div')
									div_btadd.classList.add('row');
									div_btadd.setAttribute('style', 'margin-bottom: 10px;');

								div_cont.appendChild(div_btadd);

									if(size != 0){
										if(evid[numero-1] != undefined){
											for(var x = 0; x<evid[numero-1].length; x++){
												var div_files = document.createElement('div');
												div_files.classList.add('row');
												div_files.classList.add('smlist');

													var p_file = document.createElement('p');
													p_file.classList.add('pf');
													p_file.setAttribute('id', (numero-1) + "-" + x);
														var text = document.createTextNode(evid[numero-1][x]);
													p_file.appendChild(text);

												div_files.appendChild(p_file);

												e[No-1] = evid[numero-1];

													var a_file = document.createElement('a');
													a_file.classList.add('smallbtn');
													a_file.setAttribute('target', '_blank');
													a_file.setAttribute('href', 'http://localhost:8000/' + usrname + '/Evidencias/' + evid[numero-1][x]);
													a_file.setAttribute('target', '_blank');
													a_file.setAttribute('style', 'margin-left: 10%;');

														var text = document.createTextNode("ver");
													
													a_file.appendChild(text);

												div_files.appendChild(a_file);

									div_cont.appendChild(div_files);
											}
										}else{
											var div_files = document.createElement('div');
											div_files.classList.add('row');
											div_files.classList.add('smlist');

												var p_file = document.createElement('h3');
													var text = document.createTextNode("No hay archivos");
												p_file.appendChild(text);

											div_files.appendChild(p_file);
									div_cont.appendChild(div_files);
										}
									}else{
										var div_void = document.createElement('div');
										div_void.classList.add('row');

											var text = document.createTextNode("No hay evidencias");
											
										div_void.appendChild(text);

								div_cont.appendChild(div_void);
									}

									var div_btns = document.createElement('div');
									div_btns.classList.add('row');

										var btn_acept = document.createElement('button');
										btn_acept.classList.add('btn');
										btn_acept.setAttribute('type', 'button');
										btn_acept.setAttribute('value', 'mod' + numero);
										btn_acept.setAttribute('style', 'margin-right: 15px;')
										btn_acept.onclick = function() {cancelar(btn_acept.value)}

											var text = document.createTextNode('Aceptar');

										btn_acept.appendChild(text);

									div_btns.appendChild(btn_acept);

								div_cont.appendChild(div_btns);

							div_mod.appendChild(div_cont);

					div_evid.appendChild(but_evi);
					div_evid.appendChild(div_mod);

				row.appendChild(div_evid);

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

						var in_No = document.createElement('input');
							in_No.setAttribute('type', 'hidden');
							in_No.setAttribute('name', 'No' + numero);
							in_No.setAttribute('value', numero);

							var text = document.createTextNode(numero);

						div_No.appendChild(in_No);
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
						arr = [desc[i],Number(pon[num[i]-1])];
						gra.push(arr);
						t = t + Number(pon[num[i]-1]);
					}
			}
			var total = document.getElementById('3');
				var text = document.createTextNode(pondTotal + "%");
			total.appendChild(text);

			if(t < 100){
				arr = ['actividades faltantes', 100-t];
				gra.push(arr);
			}
		}

		rows();



// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

  var data = google.visualization.arrayToDataTable(gra);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Actividades', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

	</script>
		<div id="piechart" style="display: flex; justify-content: center;"></div>

	@endif

<script type="text/javascript">
	function mostrar(modalid){
		var modal = document.getElementById(modalid);
		modal.style.display = 'block';
	}

	function cancelar(cancelid){
		var cancel = document.getElementById(cancelid);
		cancel.style.display = "none";
	}
</script>
@stop