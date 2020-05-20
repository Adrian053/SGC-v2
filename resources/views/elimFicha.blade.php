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
						<div class="card-header">Buscar ficha a Eliminar</div>
						<form id="elim" method="POST" action="/EliminarF">
							@csrf
							<div class="row">
								<div class="col-s-4">
									<label>Buscar objetivo</label>
									<select id="sel" class="form-control" name="obj" type="integer" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="col-s-4">
									<label>Buscar año</label>
									<input id="y" type="number" step="1" name="year" required="" value=<?php echo date('Y'); ?>>
								</div>
							</div>
							<div class="row">
								<div class="col-s-6" style="margin-left: 25%;">
									<input type="button" onclick="mostrar('seg'); val();" value="Eliminar">
									<input type="reset" value="cancelar" onclick="cancelar('buscar')">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if($id > 0)
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				<div class="card-header"></div>
					<div class="row">
						<h3>Formularios con objetivo {{$obj}} y año {{$year}} Eliminados</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	@elseif($id == -1)
		<div class="col-s-3"></div>
		<div class="contenedor col-s-5">
			<h1 style="text-align: center; text-transform: uppercase; color: #4CAF50;">Objetivo {{$obj}} y Año {{$year}} No encontrado</h1>
		</div>
	@endif

	<div class="modal" id="seg" style="display: none">
		<div class="container modal-content">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="row">
						<div id="ds" class="col-s-12">
						</div>
					</div>
					<div class="row">
						<div class="col-s-6" style="margin-left: 30%;">
							<button class="btn" onclick="cancelar('seg'); seguro();">Aceptar</button>
							<button class="btn" onclick="cancelar('seg'); canseg();">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div>

<script type="text/javascript">
	function mostrar(modalid){
		var modal = document.getElementById(modalid);
		modal.style.display = 'block';
	}

	function cancelar(cancelid){
		var cancel = document.getElementById(cancelid);
		cancel.style.display = "none";
	}

	function canseg(){
		var p = document.getElementById('p1').remove();
	}

	function val(){
		var y = document.getElementById('y');
		var ob = document.getElementById('sel');
		var p = document.createElement('p');
		p.setAttribute('id', 'p1');
		var d = document.getElementById('ds');
		var text = document.createTextNode("Seguro que desea eliminar la ficha con objetivo: ");
		var text1 = document.createTextNode(ob.value);
		var text2 = document.createTextNode(' y año: ' + y.value);
		p.appendChild(text);
		p.appendChild(text1);
		p.appendChild(text2);
		d.appendChild(p);
	}

	function seguro(s){
		var f = document.getElementById("elim");
		f.submit();
	}
</script>

@stop