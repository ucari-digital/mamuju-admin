@extends('layout')
@section('header')
<style type="text/css">
	.file-upload-browse{
		padding: 12.5px;
	}
	.table-icon-aksi{
		font-size: 26px;
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
				<form method="post" action="{{url('kategori/save')}}" class="row">
					{{csrf_field()}}
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama kategori</label>
							<input name="nama_kategori" class="form-control" placeholder="Nama Kategori">
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
									<div class="dropdown">
										<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="{{url('kategori/edit/'.$row->id)}}">Edit</a>
											<a class="dropdown-item" href="{{url('kategori/hapus/'.$row->id)}}">Hapus</a>
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
	});
</script>
@endsection