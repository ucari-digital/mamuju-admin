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
@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Berita</h5>
                    <form class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" class="form-control" value="{{$data->judul}}">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <img src="{{asset('images/berita/'.$data->gambar)}}" class="form-control" style="width: 100px; height: 100px;">
                            </div>
                            <div class="form-group">
                                <label>Keterangan Gambar</label>
                                <input name="keterangan_gambar" class="form-control" value="{{$data->keterangan_gambar}}">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <input name="kode_kategori" class="form-control" value="{{$data->nama_kategori}}">
                            </div>
                            <div class="form-group">
                                <label>Tags / Label</label>
                                <input type="text" name="tags" class="form-control" value="{{$data->tags}}">
                            </div>
                            <div class="form-group">
                                <label>Tgl Upload</label>
                                <input type="text" name="tgl_upload" class="form-control" value="{{$data->tgl_upload}}">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Konten</label>
                                {!! $data->berita !!}
                            </div>
                            <a href="{{url(Auth::User()->role.'/berita/draft')}}" class="btn btn-primary btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection