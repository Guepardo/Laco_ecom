@extends('layouts.master')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Usuarioss</h2>
	</div>

	<!-- Basic Examples -->
	<div class="row clearfix" id="body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">

				<div class="body">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							<tr>
								{{-- <th>Id</th> --}}
								<th>Foto</th>
								<th>Nome</th>
								<th>Se Cadastrou</th>
								<th>E-mail</th>
								<th>Telefone</th>
								<th>Facebook</th>
								{{-- <th>Ver</th> --}}
							</tr>
						</thead>
						<tfoot>
							<tr>
								{{-- <th>Id</th> --}}
								<th>Foto</th>
								<th>Nome</th>
								<th>Se Cadastrou</th>
								<th>E-mail</th>
								<th>Telefone</th>
								<th>Facebook</th>
								{{-- <th>Ver</th> --}}
							</tr>
						</tfoot>
						<tbody>

							@foreach($costumers as $c)
							<tr>
								{{-- <td>{{ $c->id }}</td> --}}
								<td> <img src="http://graph.facebook.com/{{$c->facebook_id}}/picture?type=square"/> </td>							
								<td>{{ $c->name }}</td>
								<td>{{ $c->created_at }}</td>
								<td>{{ $c->email or 'Não declarado' }}</td>
								<td>{{ $c->phone or 'Nao declarado'}}</td>
								<td><a href="{{ $c->link_facebook }}">Ir Perfil</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
	<!-- #END# Basic Examples -->
</div>

@stop

@section('css')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="/plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="/plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Preloader Css -->
<link href="/plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="/plugins/morrisjs/morris.css" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="/css/style.css" rel="stylesheet">

<!-- Sweetalert Css -->
<link href="/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="/css/themes/all-themes.css" rel="stylesheet" />
@stop

@section('js')
<!-- Jquery Core Js -->
<script src="/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Custom Js -->
<script src="/js/admin.js"></script>
<script src="/js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="/js/demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.js"></script>
@stop