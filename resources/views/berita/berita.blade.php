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
				<h5 class="card-title">Card title</h5>
				<form class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Judul</label>
							<input class="form-control" placeholder="Judul Berita"></input>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="img" class="file-upload-default">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-info" type="button">Upload</button>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label>Keterangan Gambar</label>
							<input class="form-control" placeholder="Keterangan Gambar"></input>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control">
								<option>ABC</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tags / Label</label>
							<input type="text" name="" class="tags" data-role="tagsinput">
						</div>
						<div class="form-group">
							<label>Tgl Upload</label>
							<input type="text" name="" class="form-control" placeholder="{{date('d-m-Y')}} 00:00 WIB">
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Konten</label>
							<div id="toolbar"></div>
							<textarea class="form-control" id="text-editor" placeholder="Konten Berita"></textarea>
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