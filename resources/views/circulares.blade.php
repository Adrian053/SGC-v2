@extends('layouts.plantilla')

@section('content')
	@auth
		@if(Auth::user()->rol == 1)
			<div class="col-12">
				<button class="btn" onclick="mostrar('imgModal');" style="position: relative; margin-left: 90%;"><i class="fa fa-plus">Agregar circular</i></button>
			</div>

			<div id="imgModal" class="modal">
				<div class="modal-content">
					<form id="form_img" method="POST" action="/Circulares" enctype="multipart/form-data"> 
						@csrf
						<input type="file" name="circular[]" multiple>
						<input type="submit" value="guardar">
						<input type="reset" value="cancelar" onclick="cancelar('imgModal')">
					</form>
				</div>
			</div>

		@endif
	@endauth
	<div class="row"></div>
	<div id="cont" class="row col-12"></div>

	<script type="text/javascript"> //script para mostrar window model

		function mostrar(modalid){
			var modal = document.getElementById(modalid);
			modal.style.display = 'block';
		}

		function cancelar(cancelid){
			var cancel = document.getElementById(cancelid);
			cancel.style.display = "none";
		}

		function add_cir(cir_name){
			var div_cont = document.getElementById('cont');
				
				var div_cir = document.createElement('div');
				div_cir.classList.add('col-3');
				div_cir.classList.add('circular');

					var div_name = document.createElement('div');
					div_name.classList.add('col-6');
					div_name.classList.add('pf');

						var text = document.createTextNode(cir_name);

					div_name.appendChild(text);

				div_cir.appendChild(div_name);

					var div_but = document.createElement('div');
					div_but.classList.add('col-6');

						var ver = document.createElement('a');
						ver.classList.add('smallbtn');
						ver.setAttribute('target', '_blank');
						ver.setAttribute('href', 'http://localhost:8000/Fcirculares/' + cir_name);

							var text = document.createTextNode("ver");
						
						ver.appendChild(text);

					div_but.appendChild(ver);

						var down = document.createElement('a');
						down.classList.add('smallbtn');
						down.setAttribute('target', '_blank');
						down.setAttribute('href', 'http://localhost:8000/Fcirculares/' + cir_name);
						down.setAttribute('download', cir_name);
						down.setAttribute('style', 'margin-left: 5px;');

							var text = document.createTextNode("Descargar");
						
						down.appendChild(text);

					div_but.appendChild(down);

						@auth
							if(@json(Auth::user()->rol==1)){
								var elim = document.createElement('a');
								elim.classList.add('btn');
								elim.classList.add('fa');
								elim.classList.add('fa-trash');
								elim.setAttribute('href', '/Circulares/' + cir_name);
								elim.setAttribute('style', 'margin-left: 5px; background-color: red;')

					div_but.appendChild(elim);
							}
						@endauth

				div_cir.appendChild(div_but);

			div_cont.appendChild(div_cir);

		}

	</script>

	@foreach($circular as $c)
		<script type="text/javascript">
			var cir_name = @json($c->cir_name);
			add_cir(cir_name);
		</script>
	@endforeach
@stop