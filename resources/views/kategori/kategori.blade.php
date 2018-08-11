@extends('layout')
@section('header')
<style type="text/css">
	.file-upload-browse{
		padding: 12.5px;
	}
	.table-icon-aksi{
		font-size: 26px;
	}
	.table-color{
		width: 40px; height: 40px;
	}
	.label-color, .label-color-table{
		padding: 2px 10px;
		text-align: center;
		font-weight: 600;
		text-transform: uppercase;
	}
	@media only screen and (max-width: 600px){
		.content-wrapper{
			padding: 0;
		}
		.form-control{
			font-size: 16px !important;
		}
		.file-upload-browse{
			padding: 13px; font-size: 16px
		}
	}
</style>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Buat Kategori</h5>
				<form method="post" action="{{url(Auth::User()->role.'/kategori/save')}}" class="row">
					{{csrf_field()}}
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama kategori</label>
							<input name="nama_kategori" class="form-control" placeholder="Nama Kategori">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Warna label</label>
							<div class="input-group">
								<input type="hidden" name="label_color" class="form-control input-color" aria-label="Text input with dropdown button" readonly="">
								<div class="form-control">
									<span class="label-color"></span>
								</div>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary form-control dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Warna</button>
									<div class="dropdown-menu px-3">
										<div class="row">
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #f44336;" data-color="#f44336" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #9c27b0;" data-color="#9c27b0" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #673ab7;" data-color="#673ab7" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #3f51b5;" data-color="#3f51b5" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #2196f3;" data-color="#2196f3" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #009688;" data-color="#009688" data-font="#FFF"></div>

											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #8bc34a;" data-color="#8bc34a" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-dark table-color" style="background-color: #ffeb3b;" data-color="#ffeb3b" data-font="#212121"></div>
											<div class="m-2 text-center p-2 text-dark table-color" style="background-color: #ffc107;" data-color="#ffc107" data-font="#212121"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #ff9800;" data-color="#ff9800" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #ff5722;" data-color="#ff5722" data-font="#FFF"></div>
											<div class="m-2 text-center p-2 text-white table-color" style="background-color: #795548;" data-color="#795548" data-font="#FFF"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row mt-3">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Daftar Kategori</h5>
				<div class="col-md-6">
					<table class="table">
						<thead>
							<tr>
								<th>Nama Kategori</th>
								<th>Warna label</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $row)
							<tr>
								<td>
									{{$row->nama_kategori}}
								</td>
								<td>
									<div class="label-color-table" style="background-color: {{explode(';', $row->label_color)[0]}}; color: {{explode(';', $row->label_color)[1]}};">{{$row->nama_kategori}}</div>
								</td>
								<td>
									<div class="dropdown">
										<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/kategori/edit/'.$row->id)}}">Edit</a>
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/kategori/hapus/'.$row->id)}}">Hapus</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
	$(document).ready(function() {
		$('.tags').selectize({
		    delimiter: ',',
		    persist: false,
		    create: function(input) {
		        return {
		            value: input,
		            text: input
		        }
		    }
		});
		$('.table-color').click(function(){
			var color_code = $(this).data('color');
			var color_font = $(this).data('font');
			$('.input-color').val(color_code+';'+color_font);
			$('.label-color').html('warna '+color_code);
			$('.label-color').css('background-color', color_code);
			$('.label-color').css('color', color_font);
		});
	});
</script>
@endsection