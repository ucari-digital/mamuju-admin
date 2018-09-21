@extends('layout')
@section('header')
<link rel="stylesheet" type="text/css" href="{{url('node_modules/cropperjs/dist/cropper.min.css')}}">
<style type="text/css">
	.file-upload-browse{
		padding: 12.5px;
	}
	.cropper-container{
		width: 100% !important;
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
@section('menu-berita')
	show
@endsection
@section('subberita-baru')
	active
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Buat Berita</h5>
				<form method="post" action="{{url(Auth::User()->role.'/berita/save')}}" enctype="multipart/form-data" class="row">
					@csrf
					<div class="col-md-8">
						<div class="form-group">
							<label>Judul</label>
							<input name="judul" class="form-control" placeholder="Judul Berita" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kategori</label>
							<select name="kode_kategori" class="form-control" required>
								@foreach(\App\Model\Kategori::get_data() as $items)
									<option value="{{$items->id}}">{{$items->nama_kategori}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tags / Label</label>
							<input type="text" name="tags" class="tags" data-role="tagsinput">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Terbit</label>
							<input type="text" name="tgl_upload" class="form-control" value="{{date('d-m-Y H:i')}} WIB" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Gambar Berita</label>
							<input type="file" class="file-upload-default" id="crpr-upload">
							<input type="hidden" name="image" id="image-base" value="" required>
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-info" type="button">Upload</button>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Keterangan Gambar</label>
							<input name="keterangan_gambar" class="form-control" placeholder="Keterangan Gambar">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Isi Konten Berita</label>
							<div id="toolbar"></div>
							<textarea name="berita" class="form-control summernote"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group text-right">
							<button class="btn btn-primary">SIMPAN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal crpr-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Review Image</h5>
			</div>
			<div class="modal-body">
				<img src="" id="crpr-image" class="img-fluid">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary mdl-close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary crpr-btn">Crop</button>
			</div>
		</div>
	</div>
</div>
<div class="modal crpr-modal-preview" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Review Image</h5>
			</div>
			<div class="modal-body">
				<img src="" id="crpr-image-preview" class="img-fluid mx-auto d-block">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary mdl-close-preview" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary crpr-btn-preview-save">Simpan</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{url('node_modules/cropperjs/dist/cropper.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/mamuju.js')}}"></script>
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
		$('.mdl-close').click(function(){
			$('.crpr-modal').hide();
		});
		$('.mdl-close-preview').click(function(){
			$('.crpr-modal-preview').hide();
		});
	});
</script>
@endsection