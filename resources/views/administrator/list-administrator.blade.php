@extends('layout')
@section('header')
	<style type="text/css">
		.table-icon-aksi{
			font-size: 26px;
		}
	</style>
@endsection
@section('menu-admin')
	show
@endsection
@section('subadmin-list')
	active
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
				<h5 class="card-title">Daftar Administrator</h5>
				<div class="table-responsive">
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
							@foreach($data as $item)
							<tr>
								<td>{{$item->name}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->position}}</td>
								<td>{{$item->role}}</td>
								<td>
									<div class="dropdown">
										<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/administrator/edit/'.$item->id)}}">Ubah</a>
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/administrator/delete/'.$item->id)}}">Hapus</a>
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/administrator/suspend/'.$item->id)}}">Nonaktifkan</a>
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
@endsection