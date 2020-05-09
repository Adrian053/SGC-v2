@extends('layouts.plantilla')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				<div class="card-header">Generalidades</div>
					<form method="POST" action="/Generalidades">
						@csrf
						<div class="row">
							<div class="col-s-6">
								<label for="No_Obj" class="col-md-4 col-form-label text-md-right">Objetivo de calidad No.</label>
								<div class="col-md-6">
									<select class="form-control" id="No_Obj" name="No_Obj" type="integer" required="">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
							</div>
							<div class="col-s-3">
								<label for="year" class="col-form-label text-md-right">Año</label>
								<div class="col-md-4">
									<input type="number" step="1" id="year" name="year" required="" value=<?php echo date('Y'); ?>>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_aprovacion" class="col-form-label text-md-right">Fecha de Aprobacion</label>
								<div class="col-md-4">
									<input type="date" id="F_aprovacion" name="F_aprovacion" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_apertura" class="col-form-label text-md-right">Fecha de Apertura</label>
								<div class="col-md-4">
									<input type="date" id="F_apertura" name="F_apertura" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_cumplimiento" class="col-form-label text-md-right">Fecha prevista de cumplimiento</label>
								<div class="col-md-4">
									<input type="date" id="F_cumplimiento" name="F_cumplimiento" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-12" style="text-align: center">
								<input type="submit" value="Guardar">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop