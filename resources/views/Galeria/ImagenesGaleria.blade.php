@extends('layouts.plantilla')

@section('content')
	@auth
		@if(Auth::user()->rol == 1)
			<div class="col-12">
				<button class="btn" onclick="mostrar('imgModal'); action('form_img', 'f_id', 'f_name');" style="position: relative; margin-left: 97%;"><i class="fa fa-plus"></i></button>
			</div>

			<div id="imgModal" class="modal">
				<div class="modal-content">
					<form id="form_img" method="POST" action="" enctype="multipart/form-data"> 
						@csrf
						<input type="file" name="img[]" multiple>
						<input id="f_id" type="hidden" name="fid" value="">
						<input id="f_name" type="hidden" name="fname" value="">
						<input type="submit" value="guardar">
						<input type="reset" value="cancelar" onclick="cancelar('imgModal')">
					</form>
				</div>
			</div>

		@endif
	@endauth
	<div class="col-12" id="img_cont"></div>

	<script type="text/javascript"> //script para mostrar window model

		function mostrar(modalid){
			var modal = document.getElementById(modalid);
			modal.style.display = 'block';
		}

		function cancelar(cancelid){
			var cancel = document.getElementById(cancelid);
			cancel.style.display = "none";
		}

		var fname = @json($folder->folder_name);
		var fid = @json($folder->id);

		function action(formid, inputfid, inputfname){

			var form = document.getElementById(formid);

			var infid = document.getElementById(inputfid);
			var infname = document.getElementById(inputfname);

			form.action = "/Galeria/" + fname + '/imagenes';
			infid.value = fid;
			infname.value = fname;

		}

		function add_img(img_name){
			//var fname = @json($folder->folder_name);

			var div_cont = document.createElement('div');
			div_cont.classList.add('thumbnail_content');

				var a_img = document.createElement('a');
				a_img.setAttribute('target', '_blank');
				a_img.setAttribute('href','/' + fname + '/' + img_name);

					var div_img = document.createElement('div');
					div_img.classList.add('gallery');

						var imagen = document.createElement('img');
						imagen.classList.add('gallery');
						imagen.setAttribute('src', '/' + fname + '/' + img_name);

					div_img.appendChild(imagen);

				a_img.appendChild(div_img);

			div_cont.appendChild(a_img);

			var div = document.getElementById('img_cont');
			div.appendChild(div_cont);
		}

	</script>

	@foreach($imgs as $i)
		<script type="text/javascript">
			var imgname = @json($i->img_name);
			var imgid = @json($i->id);

			add_img(imgname);
		</script>
	@endforeach
@stop