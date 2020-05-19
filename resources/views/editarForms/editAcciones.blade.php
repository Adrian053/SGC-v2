@extends('layouts.plantilla')

@section('content')
	<div class="row justify-content-center">
		<div>
			<button class="btn" onclick="add_form(); add_num();"><i class="fa fa-plus"></i></button>
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
					<div id="2"></div>
					<div class="col-s-12" style="text-align: center;">
						<input id="su" type="submit" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var usrname = @json(Auth::user()->name);
		var num = @json($num);
		var No = 1;
		var desc = @json($desc);
		var resp = @json($resp);
		var rec = @json($rec);
		var Fini = @json($F_inicio);
		var pon = @json($pond);
		var est = @json($est);
		var Ffin = @json($F_final);
		var evid = @json($evid);
		var e = [];
		var eliminar = [];

		Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};

		// Get the size of an object
		var size = Object.size(evid);

		function add_num(){
			num[No-2] = No-1;
		}

		function add_form(numero){
			if (No < 21) {
				var form = document.getElementById('1');
					var row = document.createElement('div');
					row.classList.add('row');
					row.setAttribute('id', 'row' + No);

						var div_No = document.createElement('div');
						div_No.classList.add('col-ss-0');
						div_No.classList.add('rborder');

							/*var minus = document.createElement('button');
							minus.classList.add('btnminus');
							minus.setAttribute('type', 'button');
							minus.setAttribute('value', No);
							minus.setAttribute('id', 'min' + No);
							minus.style = "margin-left: -30px; margin-right: 10px;";
							minus.onclick = function() {min(minus.value);};

								var i = document.createElement('i');
								i.classList.add('fa');
								i.classList.add('fa-minus');

							minus.appendChild(i);

						div_No.appendChild(minus);*/

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
										if(valor == pon[numero-1]){
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

							/*var in_evid = document.createElement('input');
							in_evid.setAttribute('type', 'file');
							in_evid.setAttribute('name', 'file' + No + '[]');
							in_evid.setAttribute('multiple', '');*/
							var but_evi = document.createElement('button');
							but_evi.classList.add('btn')
							but_evi.classList.add('fa')
							but_evi.classList.add('fa-folder-open');
							but_evi.setAttribute('type', 'button');
							but_evi.setAttribute('value', 'mod' + No);
							but_evi.onclick = function() {mostrar(but_evi.value)}
							
								div_mod = document.createElement('div');
								div_mod.classList.add('modal');
								div_mod.setAttribute('id', 'mod' + No);

									div_cont = document.createElement('div');
									div_cont.classList.add('container');
									div_cont.classList.add('modal-content');
									div_cont.setAttribute('id', 'cont' + No);

										div_btadd = document.createElement('div')
										div_btadd.classList.add('row');
										div_btadd.setAttribute('style', 'margin-bottom: 10px;');

											var btn_add = document.createElement('button');
											btn_add.setAttribute('type', 'button');
											btn_add.setAttribute('value', 'add' + No);
											btn_add.setAttribute('style', 'margin-right: 10px;')
											btn_add.onclick = function() {show_bf(btn_add.value)}

												var text = document.createTextNode("Añadir archivo");

											btn_add.appendChild(text);

										div_btadd.appendChild(btn_add);

											var in_file = document.createElement('input');
											in_file.setAttribute('type', 'file');
											in_file.setAttribute('id', 'add' + No);
											in_file.style.display = "none";
											in_file.setAttribute('multiple', '');
											in_file.setAttribute('name', 'files' + No + '[]');

										div_btadd.appendChild(in_file);

									div_cont.appendChild(div_btadd);
										eliminar[numero-1] = [];
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

														var btn_elim = document.createElement('button');
														btn_elim.classList.add('smallbtn');
														btn_elim.setAttribute('type', 'button');
														btn_elim.setAttribute('style', 'background-color: #DF0101; margin-left: 10px;');
														btn_elim.setAttribute('id', 'elim' + (No-1) + 'a' + x);
														btn_elim.setAttribute('value', (No-1) + "a" + x);
														btn_elim.setAttribute('onclick','ren('+(No-1)+');' + 'arc(' + x + ');');
														
															var text = document.createTextNode('Eliminar');

														btn_elim.appendChild(text);

													div_files.appendChild(btn_elim);

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
											btn_acept.setAttribute('value', 'mod' + No);
											btn_acept.setAttribute('style', 'margin-right: 15px;')
											btn_acept.onclick = function() {cancelar(btn_acept.value)}

												var text = document.createTextNode('Aceptar');

											btn_acept.appendChild(text);

										div_btns.appendChild(btn_acept);

											var btn_cancel = document.createElement('button');
											btn_cancel.classList.add('btn');
											btn_cancel.setAttribute('type', 'button');
											btn_cancel.setAttribute('id', 'reset' + No);
											btn_cancel.setAttribute('value', No);
											btn_cancel.onclick = function() {cancelar('mod' + btn_cancel.value), reset_bf('add' + btn_cancel.value)}

												var text = document.createTextNode('Cancelar');

											btn_cancel.appendChild(text);

										div_btns.appendChild(btn_cancel);

									div_cont.appendChild(div_btns);

								div_mod.appendChild(div_cont);

						div_evid.appendChild(but_evi);
						div_evid.appendChild(div_mod);

					row.appendChild(div_evid);

				form.appendChild(row);
				No = No + 1;
			}else{
				alert("No se pueden añadir mas renglones");
			}
		}
		
		function rows(){
			for(var i = 0; i<num.length; i++){
					add_form(num[i]);
			}
		}

		rows();

		function min(menos){
			for(var i = 1; i<=num.length; i++){
				var r = document.getElementById('row' + i);	
				r.parentNode.removeChild(r);
			}
			No = 1;
			//const index = num.indexOf(menos);
			eliminar[(num[menos-1]-1)] = evid[(num[menos-1]-1)];
			num.splice((menos-1), 1);
			rows();
		}

		function show_bf(id){
			var butt = document.getElementById(id);
			butt.style.display = "block";
		}

		function reset_bf(reset_in){
	        var field = document.getElementById(reset_in);
	        field.value= field.defaultValue;
	        var r = reset_in.substring(3);
	        for(var i = 0; i<evid[r-1].length; i++){
	        	var p = document.getElementById((r-1) + "-" + i);
	        	p.style.color = 'black';

	        	var el = document.getElementById('elim' + (r-1) + 'a' + i);
	        	el.style.display = 'block';
	        }
	        eliminar[r-1] = [];
		}

		var reng = 0;
		function ren(val){
			reng = val;
		}
		function arc(val){
			eliminar[reng].push(evid[reng][val]);
			var p = document.getElementById(reng + "-" + val);
			p.style.color = '#A4A4A4';
			var b = document.getElementById("elim" + reng + "a" + val);
			b.style.display = 'none';
		}
	</script>

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

				/*var elim = document.createElement('input');
				elim.setAttribute('type', 'hidden');
				elim.setAttribute('name', 'elim[]');
				elim.setAttribute('value', eliminar);*/
				
				var d = document.getElementById("2");
				for(var i = 0; i<e.length; i++){
					if(e[i] != null){
						for(var j = 0; j<e[i].length; j++){
							var x = document.createElement('input');
							x.setAttribute('type', 'hidden');
							x.setAttribute('name', 'x' + i + '[]');
							x.setAttribute('value', e[i][j]);
							d.appendChild(x);
						}
					}
				}
				for(var i = 0; i<eliminar.length; i++){
					if(eliminar[i] != null){
						for(var j = 0; j<eliminar[i].length; j++){
							var x = document.createElement('input');
							x.setAttribute('type', 'hidden');
							x.setAttribute('name', 'el' + i + '[]');
							x.setAttribute('value', eliminar[i][j]);
							d.appendChild(x);
						}
					}
				}
							var x = document.createElement('input');
							x.setAttribute('type', 'hidden');
							x.setAttribute('name', 'toelim');
							x.setAttribute('value', eliminar.length);
							d.appendChild(x);

				f.appendChild(tot);
				f.appendChild(genid);
				f.appendChild(elim);
				return true;
			}else{
				alert("la ponderación total debe ser 100%\nponderación total = " + total() + "%");
				return false;
			}
		}
	</script>
@stop