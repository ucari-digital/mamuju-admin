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
				<h5 class="card-title">Daftar Pengguna</h5>
				<table class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Posisi</th>
							<th>Hak akses</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Dimas Adi Satria</td>
							<td>dimss.satria@gmail.com</td>
							<td>Editor</td>
							<td>Administrator</td>
							<td>
								<div class="dropdown">
									<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="#">Non-aktifkan</a>
										<a class="dropdown-item" href="#">Ubah</a>
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