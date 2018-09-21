@extends('layout')
@section('header')
    <style type="text/css">
        .file-upload-browse{
            padding: 12.5px;
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
@section('menu-berita')
    show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <img class="card-img-top" src="{{asset($data->gambar)}}" alt="{{$data->gambar}}">
                <div class="card-body">
                    <h5 class="card-title">{{$data->judul}}</h5>
                    <p class="card-text">
                        <small class="text-muted">{{$data->tgl_upload}}</small> |
                        <small class="text-muted text-uppercase">{{$data->tags}}</small>
                    </p>
                    <p class="card-text">
                        {!! $data->berita !!}
                    </p>
                    <a href="{{url(Auth::User()->role.'/berita/draft')}}" class="btn btn-danger btn-block">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection