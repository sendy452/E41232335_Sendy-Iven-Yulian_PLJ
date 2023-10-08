@extends('backend/layouts.template')

@section('content')
<main id="main" class="main">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="bi bi-house"></i> <a href="{{ url('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li class="breadcrumb-item"><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pengalaman Kerja</h5>
                <p>
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <a href="{{route('pengalaman_kerja.create')}}">
                        <button class="btn btn-primary" type="button">
                            + Tambah
                        </button>
                    </a>
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Jabatan</th>
                      <th scope="col">Tahun Masuk</th>
                      <th scope="col">Tahun Keluar</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengalaman_kerja as $item)
                    <tr>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>{{$item->tahun_masuk}}</td>
                        <td>{{$item->tahun_keluar}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-warning">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
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
  </section>
</main>
@endsection