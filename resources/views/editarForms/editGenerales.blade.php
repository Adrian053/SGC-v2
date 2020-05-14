@extends('layouts.plantilla')

@section('content')
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				<div class="card-header">Generalidades</div>
					<form method="POST" action="/Generalidades/{{$id}}">
						@csrf
						@method('patch')
						<div class="row">
							<div class="col-s-6">
								<label for="No_Obj" class="col-md-4 col-form-label text-md-right">Objetivo de calidad No.</label>
								<div class="col-md-6">
									{{$obj}}
									<input type="hidden" name="obj" value="{{$obj}}">
								</div>
							</div>
							<div class="col-s-3">
								<label for="year" class="col-form-label text-md-right">Año</label>
								<div class="col-md-5">
									{{$year}}
									<input type="hidden" name="year", value="{{$year}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_aprovacion" class="col-form-label text-md-right">Fecha de Aprobacion</label>
								<div class="col-md-4">
									<input type="date" id="F_aprovacion" name="F_aprovacion" value="{{$F_aprovacion}}" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_apertura" class="col-form-label text-md-right">Fecha de Apertura</label>
								<div class="col-md-4">
									<input type="date" id="F_apertura" name="F_apertura" value="{{$F_apertura}}" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="F_cumplimiento" class="col-form-label text-md-right">Fecha prevista de cumplimiento</label>
								<div class="col-md-4">
									<input type="date" id="F_cumplimiento" name="F_cumplimiento" value="{{$F_cumplimiento}}" required="">
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