@extends('layouts.plantilla')

@section('content')
	<div class="row justify-content-center">
		<div>
			<button class="btn" onclick="add_form();"><i class="fa fa-plus"></i></button>
		</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Acciones</div>
				<form id="form_acc" method="POST" onsubmit="return valsub();" action="/Acciones/{{$id}}" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="row">
						<div class="col-ss-0 rborder">
							<label>No.</label>
						</div>
						<div class="col-ss-1 rborder">
							<label>Descripcion de la actividad</label>
						</div>
						<div class="col-s-1 rborder">
							<label>Responsable</label>
						</div>
						<div class="col-ss-2 rborder">
							<label>Recursos requeridos</label>
						</div>
						<div class="col-ss-3 rborder">
							<label>Fecha de inicio</label>
						</div>
						<div class="col-s-1 rborder">
							<label>Ponderación</label>
						</div>
						<div class="col-s-1 rborder">
							<label>Estado</label>
						</div>
						<div class="col-ss-3 rborder">
							<label>Fecha de finalización</label>
						</div>
						<div class="col-s-1">
							<label>Evidencias</label>
						</div>
					</div>
					<div id="1"></div>
					<div class="col-s-12" style="text-align: center;">
						<input id="su" type="submit" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var No = 1;
		var desc = @json($desc);
		var resp = @json($resp);
		var rec = @json($rec);
		var Fini = @json($F_inicio);
		var pond = @json($pond);
		var est = @json($est);
		var Ffin = @json($F_final);
		var evid = @json($evid);

		function add_form(numero){
			if (No < 21) {
				var form = document.getElementById('1');
					var row = document.createElement('div');
					row.classList.add('row');

						var div_No = document.createElement('div');
						div_No.classList.add('col-ss-0');
						div_No.classList.add('rborder');

							var minus = document.createElement('button');
							minus.classList.add('btnminus');
							minus.style = "margin-left: -30px; margin-right: 10px;";
							//minus.onclick = function() {add_form();};

								var i = document.createElement('i');
								i.classList.add('fa');
								i.classList.add('fa-minus');

							minus.appendChild(i);

						div_No.appendChild(minus);

							var in_No = document.createElement('input');
							in_No.setAttribute('type', 'hidden');
							in_No.setAttribute('name', 'No' + No);
							in_No.setAttribute('value', No);

							var text = document.createTextNode(No);

						div_No.appendChild(in_No);
						div_No.appendChild(text);

					row.appendChild(div_No);

						var div_desc = document.createElement('div');
						div_desc.classList.add('col-ss-1');
						div_desc.classList.add('rborder');

							var in_desc = document.createElement('textarea');
							in_desc.setAttribute('name', 'desc' + No);
							in_desc.setAttribute('required', '');
							in_desc.style.width = "100%";

								var textdesc = document.createTextNode(desc[numero-1]);

							in_desc.appendChild(textdesc);

						div_desc.appendChild(in_desc);

					row.appendChild(div_desc);

						var div_resp = document.createElement('div');
						div_resp.classList.add('col-s-1');
						div_resp.classList.add('rborder');

							var in_resp = document.createElement('textarea');
							in_resp.setAttribute('name', 'resp' + No);
							in_resp.setAttribute('required', '');
							in_resp.style.width = "100%";

								var textresp = document.createTextNode(resp[numero-1]);

							in_resp.appendChild(textresp);

						div_resp.appendChild(in_resp);

					row.appendChild(div_resp);

						var div_rec = document.createElement('div');
						div_rec.classList.add('col-ss-2');
						div_rec.classList.add('rborder');

							var in_rec = document.createElement('textarea');
							in_rec.setAttribute('name', 'rec' + No);
							in_rec.setAttribute('required', '');

								var textrec = document.createTextNode(rec[numero-1]);

							in_rec.appendChild(textrec);

						div_rec.appendChild(in_rec);

					row.appendChild(div_rec);

						var div_Fini = document.createElement('div');
						div_Fini.classList.add('col-ss-3');
						div_Fini.classList.add('rborder');

							var in_Fini = document.createElement('input');
							in_Fini.setAttribute('name', 'Fini' + No);
							in_Fini.setAttribute('type', 'date');
							in_Fini.setAttribute('required', '');
							in_Fini.setAttribute('value', Fini[numero-1]);

						div_Fini.appendChild(in_Fini);

					row.appendChild(div_Fini);

						var div_pond = document.createElement('div');
						div_pond.classList.add('col-s-1');
						div_pond.classList.add('rborder');

							var sel_pond = document.createElement('select');
							sel_pond.classList.add('form-control')
							sel_pond.setAttribute('id', 'pond' + No);
							sel_pond.setAttribute('name', 'pond' + No);
							sel_pond.setAttribute('type', 'integer');

								var option = document.createElement('option');
								option.setAttribute("value", 0);
									var text = document.createTextNode("---");

								option.appendChild(text);
							sel_pond.appendChild(option);

								var valor = 5;
								for (var i = 1; i <= 20; i++) {
									var option = document.createElement('option');
										option.setAttribute("value", valor);
										var text = document.createTextNode(valor + "%");

										if(valor == pond[numero-1]){
											option.setAttribute("selected", '');
										}

									option.appendChild(text);
									sel_pond.appendChild(option);
									valor = valor + 5;
								}

						div_pond.appendChild(sel_pond);

					row.appendChild(div_pond);

						var div_estado = document.createElement('div');
						div_estado.classList.add('col-s-1');
						div_estado.classList.add('rborder');

							var sel_est = document.createElement('select');
							sel_est.classList.add('form-control')
							sel_est.setAttribute('name', 'estado' + No);

								var opt1 = document.createElement('option');
								opt1.setAttribute('value', 'abierto');

									if("abierto" == est[numero-1]){
										opt1.setAttribute('selected', '');
									}
									var text1 = document.createTextNode('Abierto');

								opt1.appendChild(text1);

								var opt2 = document.createElement('option');
								opt2.setAttribute('value', 'proceso');

									if("proceso" == est[numero-1]){
										opt2.setAttribute('selected', '');
									}

									var text2 = document.createTextNode('Proceso');

								opt2.appendChild(text2);

								var opt3 = document.createElement('option');
								opt3.setAttribute('value', 'cerrado');

									if("cerrado" == est[numero-1]){
										opt3.setAttribute('selected', '');
									}
									var text3 = document.createTextNode('Cerrado');

								opt3.appendChild(text3);

							sel_est.appendChild(opt1);
							sel_est.appendChild(opt2);
							sel_est.appendChild(opt3);

						div_estado.appendChild(sel_est);

					row.appendChild(div_estado);

						var div_Ffinal = document.createElement('div');
						div_Ffinal.classList.add('col-ss-3');
						div_Ffinal.classList.add('rborder');

							var in_Ffinal = document.createElement('input');
							in_Ffinal.setAttribute('type', 'date');
							in_Ffinal.setAttribute('name', 'Ffinal' + No);
							in_Ffinal.setAttribute('required', '');
							in_Ffinal.setAttribute('value', Ffin[numero-1]);

						div_Ffinal.appendChild(in_Ffinal);

					row.appendChild(div_Ffinal);

						var div_evid = document.createElement('div');
						div_evid.classList.add('col-s-1');

							var in_evid = document.createElement('input');
							in_evid.setAttribute('type', 'file');
							in_evid.setAttribute('name', 'file' + No + '[]');
							in_evid.setAttribute('multiple', '');

						div_evid.appendChild(in_evid);

					row.appendChild(div_evid);

				form.appendChild(row);
				No = No + 1;
			}else{
				alert("No se pueden añadir mas renglones");
			}
		}
		
		function rows(){
			var num = @json($num);
			for(var i = 0; i<num.length; i++){
				add_form(num[i]);
			}
		}

		rows();
	</script>

	<script type="text/javascript">
		var pond=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		function ponderacion(id, i){
			var e = document.getElementById(id);
			var valor = e.options[e.selectedIndex].value;
			pond[(i-1)]=valor;
		}

		function total(){
			var total = 0;
			var id;
			for (var i =  1; i < No; i++) {
				id = "pond" + i;
				ponderacion(id, i);
				total = total + parseInt(pond[(i-1)]);
			}

			return total;
		}

		function valsub() {
			if(total() == 100){
				var f = document.getElementById('form_acc');
				var tot = document.createElement('input');
				tot.setAttribute('type', 'hidden');
				tot.setAttribute('name', 'total');
				tot.setAttribute('value', No-1);

				var genid = document.createElement('input');
				genid.setAttribute('type', 'hidden');
				genid.setAttribute('name', 'gen_id');
				genid.setAttribute('value', {{$gen_id2}});

				f.appendChild(tot);
				f.appendChild(genid);
				return true;
			}else{
				alert("el total debe ser 100%\ntotal = " + total() + "%");
				return false;
			}
		}
	</script>
@stop