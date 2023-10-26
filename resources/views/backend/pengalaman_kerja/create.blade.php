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
                        <h5 class="card-title">{{isset($admin_lecturer) ? 'Mengubah':'Menambahkan'}} Pengalaman Kerja</h5>
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
                        <form class="row g-3" id="pengalaman_kerja_form" method="post" action="{{isset($pengalaman_kerja) ?  route('pengalaman_kerja.update', $pengalaman_kerja->id) : route('pengalaman_kerja.store')}}">
                            {!! csrf_field() !!}
                            {!! isset($pengalaman_kerja) ? method_field('PUT'):'' !!}
                            <input type="hidden" name="id" value="{{@$pengalaman_kerja->id}}">
                            <div class="col-12">
                                <label for="cname" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama" name="nama" minlength="5" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" required />
                            </div>
                            <div class="col-12">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" minlength="2" value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" required />
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Tahun Masuk</label>
                                <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  class="form-control" name="tahun_masuk">
                                    @for ($year = (int)date('Y'); 2000 <= $year; $year--)
                                        <option value="<?=$year;?>" {{ $year == @$pengalaman_kerja->tahun_masuk  ? 'selected' : ''}}><?=$year;?></option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Tahun Selesai</label>
                                <select onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  class="form-control" name="tahun_keluar">
                                    @for ($year = (int)date('Y'); 2000 <= $year; $year--)
                                        <option value="<?=$year;?>" {{ $year == @$pengalaman_kerja->tahun_keluar  ? 'selected' : ''}}><?=$year;?></option>
                                    @endfor
                                </select>            
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('pengalaman_kerja.index')}}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection