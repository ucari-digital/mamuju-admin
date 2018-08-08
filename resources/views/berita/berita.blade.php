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
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Buat Berita</h5>
				<form method="post" action="{{url('berita/save')}}" enctype="multipart/form-data" class="row">
					{{csrf_field()}}
					<div class="col-md-6">
						<div class="form-group">
							<label>Judul</label>
							<input name="judul" class="form-control" placeholder="Judul Berita">
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="file-upload-default">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-info" type="button">Upload</button>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label>Keterangan Gambar</label>
							<input name="keterangan_gambar" class="form-control" placeholder="Keterangan Gambar">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select name="kode_kategori" class="form-control">
								@foreach(\App\Model\Kategori::get_data() as $items)
									<option value="{{$items->id}}">{{$items->nama_kategori}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Tags / Label</label>
							<input type="text" name="tags" class="tags" data-role="tagsinput">
						</div>
						<div class="form-group">
							<label>Tgl Upload</label>
							<input type="text" name="tgl_upload" class="form-control" placeholder="{{date('Y-m-d H:i:s')}}">
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Konten</label>
							<div id="toolbar"></div>
							<textarea name="berita" class="form-control" id="text-editor" placeholder="Konten Berita"></textarea>
						</div>
						<button class="btn btn-primary btn-block">Simpan</button>
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