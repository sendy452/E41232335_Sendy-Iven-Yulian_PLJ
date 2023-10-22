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
                    <li class="breadcrumb-item"><i class="fa fa-files-o"></i>Pendidikan</li>
                </ol>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pendidikan</h5>
                <p>
                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <a href="{{route('pendidikan.create')}}">
                        <button class="btn btn-primary" type="button">
                            + Tambah
                        </button>
                    </a>
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Tingkatan</th>
                      <th scope="col">Tahun Masuk</th>
                      <th scope="col">Tahun Keluar</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pendidikan as $item)
                    <tr>
                        <td>{{$item->nama}}</td>
                        <td>
                          @if ($item->tingkatan == 1)
                              TK
                          @elseif ($item->tingkatan == 2)
                              SD
                          @elseif ($item->tingkatan == 3)
                              SMP
                          @elseif ($item->tingkatan == 4)
                              SMA/SMK
                          @elseif ($item->tingkatan == 5)
                              D3
                          @elseif ($item->tingkatan == 6)
                              D4/S1
                          @elseif ($item->tingkatan == 7)
                              S2
                          @elseif ($item->tingkatan == 8)
                              S3
                          @endif
                        </td>
                        <td>{{$item->tahun_masuk}}</td>
                        <td>{{$item->tahun_keluar}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('pendidikan.destroy', $item->id)}}" method="POST">
                                    <a class="btn btn-warning" href="{{route('pendidikan.edit', $item->id)}}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"\
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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