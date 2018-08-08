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
				<h5 class="card-title">Daftar Berita</h5>
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
						@php
						$render = '';
						@endphp
						@foreach($data as $row)
						@php
						$render = html_entity_decode($row->berita);
						@endphp
						<tr>
							<td>{{ str_limit($row->judul, 50)}}</td>
							<td>{{$row->nama_kategori}}</td>
							<td id="{{$row->id}}"><?php echo str_limit($render, 200, '...'); ?></td>
							<td>
								<div class="dropdown">
									<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="{{url('berita/detail/'.$row->id)}}">Lihat</a>
										<a class="dropdown-item" href="{{url('berita/'.$row->id.'/draft')}}">Jadikan Draft</a>
										<a class="dropdown-item" href="{{url('berita/edit/'.$row->id)}}">Ubah</a>
										<a class="dropdown-item" href="{{url('berita/'.$row->id.'/delete')}}">Hapus</a>
									</div>
								</div>
							</td>
						</tr>
						<script type="text/javascript">
							var $('#{{$row->id}}').html();
						</script>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
@endsection