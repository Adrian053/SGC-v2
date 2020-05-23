@extends('layouts.plantilla')

@section('content')

		<div class="container modal-content" style="border: none">
			<div class="row justify-content-center">
				<div class="col-md-11">
					<div class="card">
						<div class="card-header">Buscar ficha para generar reporte</div>
						<form method="POST" action="/Reporte" target="_blank">
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
									<input type="submit" value="Generar Reporte">
									<input type="reset" value="cancelar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	@if($id == -1)
		<div class="col-s-3"></div>
		<div class="contenedor col-s-5">
			<h1 style="text-align: center; text-transform: uppercase; color: #4CAF50;">Objetivo {{$obj}} y Año {{$year}} No encontrado</h1>
		</div>
	
	@endif
@stop