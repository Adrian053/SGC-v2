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
							      <textarea id="descripcion" name="descripcion" placeholder="Write something.." style="width: 130%; height: 200px; margin-left: 20px;" required=""></textarea>
							    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-s-4" style="margin-left: 2%;">
								<div class="selectBox" onclick="showCheckboxes()">
									<select>
										<option>Selecciona Procesos</option>
									</select>
									<div class="overSelect"></div>
								</div>
								<div id="checkboxes">
									<label for="one">
									<input type="checkbox" name="one" id="one" checked="" value="Proceso 1" />Proceso 1</label>
									<label for="two">
									<input type="checkbox" name="two" id="two" value="Proceso 2"/>Proceso 2</label>
									<label for="three">
									<input type="checkbox" name="three" id="three" value="Proceso 3"/>Proceso 3</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label for="responsable" class="col-form-label text-md-right">Responsable</label>
								<div class="col-12">
									<textarea id="responsable" name="responsable" style="width: 100%;" required=""></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label for="indicador" class="col-form-label text-md-right">Indicador</label>
								<div class="col-12">
									<textarea id="indicador" name="indicador" style="width: 100%;" required=""></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label for="meta" class="col-form-label text-md-right">Meta</label>
								<div class="col-12">
									<textarea id="meta" name="meta" style="width: 100%;" required=""></textarea>
								</div>
							</div>
							<input type="hidden" name="gen_id" value="{{$id->id}}">
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

	<script type="text/javascript">
		var expanded = false;

		function showCheckboxes() {
		  var checkboxes = document.getElementById("checkboxes");
		  if (!expanded) {
		    checkboxes.style.display = "block";
		    expanded = true;
		  } else {
		    checkboxes.style.display = "none";
		    expanded = false;
		  }
		}
	</script>
@stop