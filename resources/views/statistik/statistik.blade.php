@extends('layout')
@section('header')
	<style type="text/css">
		/*.t-statistik{
			font-size: 14px;
		}*/
		.row > td{
			padding: 10px;
		}
		td.top{
			background-color:
		}
	</style>
@endsection
@section('menu-statistik')
	active
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					Statistik Pengunjung
				</div>
				<div class="row">
					<div class="col-md-8 col-12">
						<canvas id="myChart"></canvas>
					</div>
					<div class="col-md-4 col-12">
						<table class="t-statistik table">
							<tr>
								<td class="text-center" colspan="3">Kunjungan halaman terbanyak</td>
							</tr>
							<tr>
								<td style="font-size: 20px">1</td>
								<td>{{str_limit('Merubah makasar menjadi lebih baik', 25)}}</td>
								<td>20</td>
							</tr>
							<tr>
								<td style="font-size: 18px">2</td>
								<td>{{str_limit('Bogor menjadi lebih baik', 30)}}</td>
								<td>20</td>
							</tr>
							<tr>
								<td style="font-size: 16px">3</td>
								<td>{{str_limit('Bogor menjadi lebih baik', 30)}}</td>
								<td>20</td>
							</tr>
							<tr>
								<td>4</td>
								<td>{{str_limit('Bogor menjadi lebih baik', 30)}}</td>
								<td>20</td>
							</tr>
							<tr>
								<td>5</td>
								<td>{{str_limit('Bogor menjadi lebih baik', 30)}}</td>
								<td>20</td>
							</tr>
							<tr>
								<td>6</td>
								<td>{{str_limit('Bogor menjadi lebih baik', 30)}}</td>
								<td>20</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
	<script type="text/javascript" src="{{url('js/Chart.min.js')}}"></script>
	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	        labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
	        datasets: [{
	            label: '# of Votes',
	            data: [12, 19, 3, 5, 2, 3, 12],
	            borderColor: 'rgba(253,50,88,0.5)',
	            backgroundColor: 'rgba(0,0,0,0)',
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
	</script>

@endsection