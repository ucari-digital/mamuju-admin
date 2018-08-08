@extends('layout')
@section('content')
<div class="row section social-section">
	<div class="col-lg-4 grid-margin stretch-card">
		<div class="social-card w-100 bg-success">
			<div class="social-icon">
				<i class="mdi mdi-book-open-variant icons"></i>
			</div>
			<div class="content">
				<p>{{$berita}}</p>
				<p>Berita Terbit</p>
			</div>
		</div>
	</div>
	<div class="col-lg-4 grid-margin stretch-card">
		<div class="social-card w-100 bg-twitter">
			<div class="social-icon">
				<i class="mdi mdi-chart-line-variant icons"></i>
			</div>
			<div class="content">
				<p>+0</p>
				<p>Pengunjung hari ini</p>
			</div>
		</div>
	</div>
	<div class="col-lg-4 grid-margin stretch-card">
		<div class="social-card w-100 bg-dribbble">
			<div class="social-icon">
				<i class="mdi mdi-comment-multiple-outline icons"></i>
			</div>
			<div class="content">
				<p>+0</p>
				<p>Komentar hari ini</p>
			</div>
		</div>
	</div>
</div>
@endsection