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
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Judul</th>
								<th>Kategori</th>
								<th>Konten</th>
								<th>Aksi</th>
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
								<td>{{$no+1}}</td>
								<td>{{ str_limit($row->judul, 50)}}</td>
								<td>{{$row->nama_kategori}}</td>
								<td>{{str_limit($render, 200)}}</td>
								<td>
									<div class="dropdown">
										<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/detail/'.$row->id)}}">Lihat</a>
											@if(Auth::User()->role == "administrator")<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/'.$row->id.'/publish')}}">Publish</a>@endif
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/edit/'.$row->id)}}">Ubah</a>
											<a class="dropdown-item" href="{{url(Auth::User()->role.'/berita/'.$row->id.'/delete')}}">Hapus</a>
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
</div>
@endsection
@section('footer')
<script type="text/javascript">
</script>
@endsection