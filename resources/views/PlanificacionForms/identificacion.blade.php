@extends('layouts.plantilla')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
				<div class="card-header">Identificación</div>
					<form method="POST" action="/Identificacion">
						@csrf
						<div class="row">
							<div>
								<label for="descripcion" class="col-form-label text-md-right">Descripción del objetivo de la calidad</label>
								<div class="col-s-12">
							      <textarea id="descripcion" name="descripcion" placeholder="Write something.." style="width: 130%; height: 200px; margin-left: 20px;"></textarea>
							    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="Procesos" class="col-md-4 col-form-label text-md-right">Procesos involucrados</label>
								<label style="border: solid 1px gray; padding: 2px;">
									proceso 1 <input type="checkbox" name="">
								</label>
								<label style="border: solid 1px gray; padding: 2px;">
									proceso 2 <input type="checkbox" name="">
								</label>
								<label style="border: solid 1px gray; padding: 2px;">
									proceso 3 <input type="checkbox" name="">
								</label>
								<label style="border: solid 1px gray; padding: 2px;">
									proceso 4 <input type="checkbox" name="">
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="responsable" class="col-form-label text-md-right">Responsable</label>
								<div class="col-md-4">
									<textarea id="responsable" name="responsable"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="indicador" class="col-form-label text-md-right">Indicador</label>
								<div class="col-md-4">
									<textarea id="indicador" name="indicador"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-7">
								<label for="meta" class="col-form-label text-md-right">Meta</label>
								<div class="col-md-4">
									<textarea id="meta" name="meta"></textarea>
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