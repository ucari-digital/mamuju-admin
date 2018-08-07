@extends('layout')
@section('header')
    <style type="text/css">
        .file-upload-browse{
            padding: 12.5px;
        }
        .table-icon-aksi{
            font-size: 26px;
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
                    <h5 class="card-title">Edit Kategori</h5>
                    <form method="post" action="{{url('kategori/update/'.$id)}}" class="row">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama kategori</label>
                                <input name="nama_kategori" class="form-control" value="{{$detail->nama_kategori}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Barui</button>
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