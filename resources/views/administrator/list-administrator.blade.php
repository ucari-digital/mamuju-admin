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
								<td style="width: 100px">
									<button type="button" class="btn social-btn btn-twitter btn-action" data-toggle="modal" data-id="{{$item->id}}" data-target="#exampleModal">
										<i class="mdi mdi-dots-horizontal table-icon-aksi"></i>
									</button>
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Aksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row justify-content-md-center">
						<div class="col-md-12">
							<a href="{{url('administrator/edit/')}}" class="btn btn-secondary btn-block edit">Ubah</a>
						</div>
						<div class="col-md-12 mt-2">
							<a href="{{url('administrator/delete/')}}" class="btn btn-danger btn-block delete">Hapus</a>
						</div>
						<div class="col-md-12 mt-2">
							<a href="{{url('administrator/suspend/')}}" class="btn btn-warning btn-block suspend">Nonaktifkan</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-action').click(function(){
			var id = $(this).data('id');
			var suspend = $('.suspend').attr('href');
			$('.suspend').attr('href', '{{url('administrator/suspend')}}/'+id);

			var edit = $('.edit').attr('href');
			$('.edit').attr('href', '{{url('administrator/edit/')}}/'+id);

			var hapus = $('.delete').attr('href');
			$('.delete').attr('href', '{{url('administrator/delete/')}}/'+id);
		});
	});
</script>
@endsection