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
                        <h5 class="card-title">{{isset($pendidikan) ? 'Mengubah':'Menambahkan'}} Pendidikan</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="row g-3" id="pendidikan_form" method="post" action="{{isset($pendidikan) ?  route('pendidikan.update', $pendidikan->id) : route('pendidikan.store')}}">
                            {!! csrf_field() !!}
                            {!! isset($pendidikan) ? method_field('PUT'):'' !!}
                            <input type="hidden" name="id" value="{{@$pendidikan->id}}">
                            <div class="col-12">
                                <label for="cname" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" id="nama" name="nama" minlength="5" value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}" required />
                            </div>
                            <div class="col-12">
                                <label for="tingkatan" class="form-label">Tingkatan</label>
                                <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  class="form-control" name="tingkatan">
                                    @foreach ($tingkatan as $value)
                                        <option value="<?=$value['id'];?>" {{ $value['id'] == @$pendidikan->tingkatan  ? 'selected' : ''}}><?=$value['name'];?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Tahun Masuk</label>
                                <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  class="form-control" name="tahun_masuk">
                                    @for ($year = (int)date('Y'); 2000 <= $year; $year--)
                                        <option value="<?=$year;?>" {{ $year == @$pendidikan->tahun_masuk  ? 'selected' : ''}}><?=$year;?></option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Tahun Selesai</label>
                                <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  class="form-control" name="tahun_keluar">
                                    @for ($year = (int)date('Y')+5; $year >= 2018; $year--)
                                        <option value="<?=$year;?>" {{ $year == @$pendidikan->tahun_keluar  ? 'selected' : ''}}><?=$year;?></option>
                                    @endfor
                                </select>            
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('pendidikan.index')}}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection