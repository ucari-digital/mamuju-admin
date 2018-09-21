@extends('layout')
@section('header')
	<style type="text/css">
		.table-icon-aksi{
			font-size: 26px;
		}
	</style>
@endsection
@section('menu-berita')
	show
@endsection
@section('subberita-list')
	active
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Daftar Berita</h5>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Judul</th>
								<th>Kategori</th>
								<th>Konten</th>
								@if(Auth::User()->role == "administrator")
									<th>Komentar</th>
									<th>Aksi</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@php
							$render = '';
							@endphp
							@foreach($data as $no => $row)
							@php
							$render = strip_tags($row->berita);
							@endphp
							<tr>
								<td>{{$no+1}}.</td>
								<td>{{ str_limit($row->judul, 50)}}</td>
								<td>{{$row->nama_kategori}}</td>
								<td>{{str_limit($render, 200)}}</td>
								@if(Auth::User()->role == "administrator")
									<td>
										<button data-toggle='modal' data-target='#komentar_{{$row->id}}' class="btn btn-xs btn-success">
											{{\App\Model\Komentar::count_komentar($row->id)}}
										</button>
									</td>
									<td>
										<div class="dropdown">
											<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/detail/'.$row->id)}}">Lihat</a>
												<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/'.$row->id.'/draft')}}">Jadikan Draft</a>
												<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/edit/'.$row->id)}}">Ubah</a>
												<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/'.$row->id.'/delete')}}">Hapus</a>
											</div>
										</div>
									</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@foreach($data as $row)
				<div class="modal fade" id="komentar_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">{{str_limit($row->judul, 50)}}</h4>
							</div>
							<div class="modal-body">
								<table class="table">
									<thead>
									<tr>
										<th>#</th>
										<th>User</th>
										<th>email</th>
										<th>Komentar</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									@foreach(\App\Model\Komentar::get_komentar($row->id) as $no => $value)
										<tr>
											<td>{{$no+1}}</td>
											<td>{{$value->name}}</td>
											<td>{{$value->email}}</td>
											<td>{{$value->komentar}}</td>
											<td>
												<a href="{{url(Auth::User()->role.'/berita/komentar/hapus/'.$value->id)}}" class="btn btn-xs btn-danger">hapus komentar?</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
@endsection