@extends('layouts.master')

@section('title', 'Tambah Cuti')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Tambah Cuti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Cuti</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Nama') }}</h4>
                      </div>
                      <div class="card-body">
                        @foreach($user as $u)
                        <form method="POST" action="{{ url('/staff/cutiUpdate-staff/' . $u->id) }}">
                            @csrf
                            <div class="form-group">
                                <div class="col">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Nama') }}" name="name" value="{{ $u->name }}" required readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>NIK</label>
                                    <input class="form-control" type="text" placeholder="{{ __('NIK') }}" name="nik"  value="{{ $u->nik }}" required readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Tahun</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Tahun') }}" name="tahun"  value="{{ $u->tahun }}" required readonly="readonly">
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Total Cuti</label>
                                <input class="form-control input-number" type="number" placeholder="{{ __('Total Cuti') }}" name="total_cuti"  value="{{ $u->total_cuti }}" required autofocus>
                            </div>
                            @endforeach
                            <br>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Simpan') }}</button>
                            <a href="{{ route('staff-cutiList') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>

  </div>

@endsection
