@extends('layout')
@section('header')
<style type="text/css">
	.file-upload-browse{
		padding: 12.5px;
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
	<div class="col-md-12">
		@if(session('status') == 'success')
			<div class="alert alert-success" role="alert">
				{{session('message')}}
			</div>
		@elseif(session('status') == 'failed')
			<div class="alert alert-danger" role="alert">
				{{session('message')}}
			</div>
		@endif
	</div>
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Akun Baru</h5>
				<form class="row" action="{{url('administrator/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="name" class="form-control" placeholder="Nama" value="{{$data->name}}"></input>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" placeholder="Email" value="{{$data->email}}"></input>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Posisi</label>
							<select name="position" class="form-control">
								<option value="{{$data->position}}">{{$data->position}} - Posisi saat ini</option>
								<option value="penulis">Penulis</option>
								<option value="editor">Editor</option>
							</select>
						</div>
						<div class="form-group">
							<label>Hak akses</label>
							<select name="role" class="form-control">
								<option value="{{$data->role}}">{{$data->role}} - Hak akses saat ini</option>
								<option value="writer">Writer</option>
								<option value="administrator">Administrator</option>
							</select>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="avatar" class="file-upload-default">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-info" type="button">Upload</button>
								</span>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Simpan</button>
					</div>
				</form>
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
	});
</script>
@endsection