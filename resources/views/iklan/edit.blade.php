@extends('layout')
@section('header')
    <style type="text/css">
        .file-upload-browse{
            padding: 12.5px;
        }
        .table-icon-aksi{
            font-size: 26px;
        }
        .table-color{
            width: 40px; height: 40px;
        }
        .label-color, .label-color-table{
            padding: 2px 10px;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
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
                    <h5 class="card-title">Buat Iklan</h5>
                    <form method="post" action="{{url(Auth::User()->role.'/iklan/update/'.$id)}}" enctype="multipart/form-data" class="row">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Banner Iklan</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link Iklan</label>
                                <input type="text" name="url" value="{{$detail->url}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection