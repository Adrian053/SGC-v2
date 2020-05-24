@extends('layouts.plantilla')

@section('content')
	@auth
	@if(Auth::user()->rol == 1)
		<div class="col-12">
			<button class="btn" onclick="mostrar('myModal');" style="position: relative; margin-left: 97%;"><i class="fa fa-plus"></i></button>
		</div>

	<div id="myModal" class="modal">
		<div class="modal-content">
			<!--<span class="close">&times;</span>-->
			<form method="POST" action="/Galeria">
				@csrf
				<label for="folder_name">Nombre de la carpeta:</label>
				<input type="text" id="folder_name" name="folder_name" value="">
				<input type="submit" value="aceptar">
				<input type="reset" value="cancelar" onclick="cancelar('myModal')">
			</form>
		</div>
	</div>

	<div id="change" class="modal">
		<div class="modal-content">
			<form id="form_change" method="POST" action="">
				@csrf
				@method('patch')
				<label for="new_name">Nuevo nombre:</label>
				<input type="text" id="new_name" name="new_name" value="">
				<input id="f_id_chan" type="hidden" name="fid" value="">
				<input type="submit" value="aceptar">
				<input type="reset" value="cancelar" onclick="cancelar('change')">
			</form>
		</div>
	</div>

	<div id="eliminar" class="modal">
		<div class="modal-content">
			<form id="form_eliminar" method="POST" action="">
				@csrf
				@method('DELETE')
				<label>¿Seguro que desea eliminar la carpeta?:</label>
				<input id="f_id_elim" type="hidden" name="fid" value="">
				<input type="submit" value="aceptar">
				<input type="reset" value="cancelar" onclick="cancelar('eliminar')">
			</form>
		</div>
	</div>
	@endif
	@endauth

	<div class="col-12" id="folders_cont"></div>

	<script type="text/javascript">

		function crea_folders(folder_name, id){
			
			var div_cont = document.createElement('div'); //div principal de clase contendedor
			div_cont.classList.add('thumbnail_content');

				var a_folder = document.createElement('a'); //a con el link hacia el folder
				a_folder.setAttribute('href', '/Galeria/'+ folder_name);

					var div_gall = document.createElement('div'); //div que contendra el icono
					div_gall.classList.add('gallery');

						var i_icon = document.createElement('i'); //i que pone el icono
						i_icon.classList.add('fa');
						i_icon.classList.add('fa-folder');
						i_icon.classList.add('icon_fol');

					div_gall.appendChild(i_icon);
				a_folder.appendChild(div_gall);
			div_cont.appendChild(a_folder);
				
			///////////////////////////////////////////////////////////////////////

			@auth
			@if(Auth::user()->rol == 1)
				var div_desc = document.createElement('div'); //div que contendra el dropdown de clase desc
				div_desc.classList.add('desc');

					var div_drop = document.createElement('div'); //div del dropdown
					div_drop.classList.add('dropdown');

						var butt_drop = document.createElement('button'); //boton que al pulsarlo despliega el drop
						butt_drop.classList.add('dropbtn');
						butt_drop.classList.add('dropdown-toggle');
						butt_drop.onclick = function() {showDrop(folder_name);};

							var text_drop = document.createTextNode(folder_name);

						butt_drop.appendChild(text_drop);

						div_drop.appendChild(butt_drop);

						var div_drop_cont = document.createElement('div'); //contenido del drop
						div_drop_cont.classList.add('dropdown-content');
						div_drop_cont.setAttribute('id', folder_name);

							var option1 = document.createElement('a');
							option1.setAttribute('href', '/Galeria/'+ folder_name);

								var text1 = document.createTextNode("Abrir");

							option1.appendChild(text1);

							var option2 = document.createElement('a');
							//option2.setAttribute('onclick', 'mostrarCambiar()');
							option2.onclick = function() {mostrar('change'); action(folder_name, id, 'form_change', 'f_id_chan')};

								var text2 = document.createTextNode("Cambiar nombre");

							option2.appendChild(text2);

							var option3 = document.createElement('a');
							//option3.setAttribute('href', '#');
							option3.onclick = function() {mostrar('eliminar'); action(folder_name, id, 'form_eliminar', 'f_id_elim')};

								var text3 = document.createTextNode("Eliminar");

							option3.appendChild(text3);

						div_drop_cont.appendChild(option1);
						div_drop_cont.appendChild(option2);
						div_drop_cont.appendChild(option3);

					div_drop.appendChild(div_drop_cont);
				div_desc.appendChild(div_drop);

			div_cont.appendChild(div_desc);
			@else
				var div_desc = document.createElement('div'); //div que contendra el dropdown de clase desc
				div_desc.classList.add('desc');

					var text = document.createTextNode(folder_name);

				div_desc.appendChild(text);

				div_cont.appendChild(div_desc);
			@endif
			@endauth

			@guest
				var div_desc = document.createElement('div'); //div que contendra el dropdown de clase desc
				div_desc.classList.add('desc');

					var text = document.createTextNode(folder_name);

				div_desc.appendChild(text);

				div_cont.appendChild(div_desc);
			@endguest

			var div_folders = document.getElementById('folders_cont');

			div_folders.appendChild(div_cont);

		}
	</script>

	@foreach($folders as $f)
		<script>
			var name = @json($f->folder_name);
			var id = @json($f->id);
			crea_folders(name, id);
		</script>
	@endforeach

		<script type="text/javascript">

			function mostrar(modalid){
				var modal = document.getElementById(modalid);
				modal.style.display = 'block';
			}

			function cancelar(cancelid){
				var cancel = document.getElementById(cancelid);
				cancel.style.display = "none";
			}

			function action(fname, fid, formid, inputid){
				var form = document.getElementById(formid);
				var inid = document.getElementById(inputid);
				form.action = "/Galeria/" + fname;
				inid.value = fid;
			}
		</script>
@stop