@extends('layouts.master')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Produtos</h2>
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

					<form action="{{'/admin/product/'. $product->id}}" method="POST" enctype="multipart/form-data">
					 	<input type="hidden" name="_method" value="PUT" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Nome</label>
									<div class="form-line">
										<input name="name" value="{{ $product->name }}" type="text" class="form-control" placeholder="Sutiã" />
									</div>
								</div>
							</div>
							
						</div>

						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Descrição</label>
									<div class="form-control">
										<textarea name="describe" type="text" class="form-control" >
											{{$product->describe }}
										</textarea> 
									</div>
								</div>
							</div>
						</div>


						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Foto</label>
									<div class="form-line">
										<input name="photo" type="file" class="form-control"/>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-sm-5">
								<div class="form-group">
										<img src="{{'/uploads/'.$product->photo.'.jpg'}}">
								</div>
							</div>
						</div>

						{{-- <p>Informações sobre o estoque</p> --}}
						<div class="row clearfix">
							<div class="col-sm-3">
								<div class="form-group">
									<label>Qtd mínima estoque</label>
									<div class="form-line">
										<input value="{{ $product->min_stock }}" name="min_stock" type="number" class="form-control" placeholder="10" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<label>Qtd atual estoque</label>
								<div class="form-group">
									<div class="form-line">
										<input value="{{ $product->stock}}" name="stock" type="number" class="form-control" placeholder="300" />
									</div>
								</div>
							</div>
						</div>

						{{-- <p>Preço</p> --}}
						<div class="row clearfix">
							<div class="col-sm-3">
								<div class="form-group">
									<label>Preço por unidade <small style="color:red;">Sem taxa de lucro</small></label>
									<div class="form-line">
										<input name="price" value="{{$product->price}}" type="number" class="form-control" placeholder="14,40" />
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-sm-3">
								<div class="form-group">
									<label>Categoria</label>
									<div class="form-line">
										<select  name="categories_id" class="form-control">
											<option>--Selecione--</option>
											@foreach($categories as $c)
											<option value="{{$c->id}}" selected="{{ $product->categories_id == $c->id ? 'selected' : '' }}"> {{$c->label}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label>Tamanho</label>
									<div class="form-line">
										<select name="sizes_id" value="{{ $product->sizes_id }}" class="form-control">
											<option>--Selecione--</option>
											@foreach($sizes as $s)
											<option value="{{$s->id}}" selected="{{ $product->sizes_id == $s->id ? 'selected' : '' }}"> {{$s->label}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-sm-3">
								<button type="submit" class="btn btn-success">Salvar</button>
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