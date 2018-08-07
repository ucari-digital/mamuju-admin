@extends('layout')
@section('header')
	<style type="text/css">
		.table-icon-aksi{
			font-size: 26px;
		}
	</style>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Draft Berita</h5>
				<table class="table">
					<thead>
						<tr>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Konten</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Banjir Mamuju Utara...</td>
							<td>Domestik</td>
							<td>Banjir yang mengakibatkan kerugian mencapai pulihan triliun rupiah ini akan terlus belanjut hinngga perbahan situasi</td>
							<td>
								<div class="dropdown">
									<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="#">Lihat</a>
										<a class="dropdown-item" href="#">Publish</a>
										<a class="dropdown-item" href="#">Edit</a>
										<a class="dropdown-item" href="#">Hapus</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
@endsection