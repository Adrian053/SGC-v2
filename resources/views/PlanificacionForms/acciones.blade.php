@extends('layouts.plantilla')

@section('content')
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card">
				<div class="card-header">Acciones</div>
					<form method="POST" action="/Acciones">
						@csrf
						<div class="col-ss-0">
							<label>No.</label>
						</div>
						<div class="col-ss-1">
							<label>Descripciond de la actividad</label>
							<textarea style="width: 100%;"></textarea>
						</div>
						<div class="col-s-1">
							<label>Responsable</label>
							<textarea style="width: 100%;"></textarea>
						</div>
						<div class="col-ss-2">
							<label>Recursos requeridos</label>
							<textarea></textarea>
						</div>
						<div class="col-ss-3">
							<label>Fecha de inicio</label>
							<input type="date" name="F_inicio" value="">
						</div>
						<div class="col-s-1">
							<label>Ponderación</label>
							<select class="form-control" id="pond" name="pond" type="integer">
							</select>
						</div>
						<div class="col-s-1">
							<label>Estado</label>
							<select class="form-control" id="estado" name="estado">
								<option value="abierto">Abierto</option>
								<option value="proceso">Proceso</option>
								<option value="cerrado">Cerrado</option>
							</select>
						</div>
						<div class="col-ss-3">
							<label>Fecha de finalización</label>
							<input type="date" name="F_finalizacion" value="">
						</div>
						<div class="col-s-1">
							<label>Evidencias</label>
							<input type="file" name="file[]" multiple>
						</div>
						<div class="col-s-12" style="text-align: center;">
							<input type="submit" value="Guardar">
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function ponderacion(){
				
				var valor = 5;
				var sel = document.getElementById("pond");

				for (var i = 1; i <= 20; i++) {
					var option = document.createElement('option');
						option.setAttribute("value", valor);
						var text = document.createTextNode(valor + "%");

					option.appendChild(text);
					sel.appendChild(option);
					valor = valor + 5;
				}
			}
			ponderacion();
		</script>
@stop