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
						<div class="card-header">Buscar ficha a editar</div>
						<form method="POST" action="/editsearch">
							@csrf
							<div class="row">
								<div class="col-s-4">
									<label>Buscar objetivo</label>
									<select class="form-control" name="s_obj" type="integer" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="col-s-4">
									<label>Buscar año</label>
									<input type="number" step="1" name="s_year" required="" value=<?php echo date('Y'); ?>>
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

	@if($id > 0)
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				<div class="card-header">Formularios con objetivo {{$obj}} y año {{$year}}</div>
					<div class="row">
						<label style="margin-left: 20px;">Elija el formulario que desea editar</label>
					</div>
					<div class="row" style="margin-left: 10px; margin-top: 20px;">
						<a class="btn" href="/Generalidades/{{$id}}" style="margin-bottom: 10px; margin-right: 10px;">Generalidades</a>
						<a class="btn" href="/Identificacion/{{$id}}" style="margin-bottom: 10px; margin-right: 10px;">Identificacion</a>
						<a class="btn" href="#" style="margin-bottom: 10px; margin-right: 10px;">Acciones</a>
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