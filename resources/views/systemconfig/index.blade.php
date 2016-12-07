@extends('layouts.master')

@section('title', 'Cofigurações do Sistema')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Configurações do Sistema</h2>
	</div>

	<!-- Basic Examples -->
	<div class="row clearfix" id="body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="body">
					@if (!empty($errors->all()))
					<div class="alert alert-danger">
						{{ Html::ul($errors->all()) }}
					</div>
					@endif
					
					<form action="/admin/config" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Lucro no Atacado</label>
									<div class="form-line">
										<input name="profit_wholesale" value="{{ $conf->profit_wholesale }}" type="text" class="form-control" placeholder="Sutiã" />
									</div>
								</div>
							</div>
							
						</div>


						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Lucro no Varejo</label>
									<div class="form-line">
										<input name="profit_retail" value="{{ $conf->profit_retail }}" type="text" class="form-control" placeholder="Sutiã" />
									</div>
								</div>
							</div>
							
						</div>


						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Remuneração do Afiliado</label>
									<div class="form-line">
										<input name="affiliate_discount" value="{{ $conf->affiliate_discount }}" type="text" class="form-control" placeholder="Sutiã" />
									</div>
								</div>
							</div>
							
						</div>

						
						<div class="row clearfix">
							<div class="col-sm-3">
								<button type="submit" class="btn btn-danger">Atualizar</button>
							</div>
						</div>

					</form>
				</div>
			</div>
			{{-- Info for delete action  --}}
			@if (session('status'))
			<div class="alert alert-warning">
				{{ session('status') }}
			</div>
			@endif
			{{-- Info for delete action --}}
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