@extends('layouts.master')

@section('title', 'Detail Pengajuan Cuti')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Detail Pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Detail Pengajuan Cuti</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Detail Pengajuan Cuti') }}</h4>
                      </div>
                      <div class="card-body">
                        @foreach($pengajuan as $p)
                        <form method="POST" action="{{ url('/staff/pengajuanAccept-staff/' . $p->id) }}">
                        @csrf
                        <div class="form-group">
                            <div class="col">
                                <label>Nama</label>
                                <input class="form-control" type="text" value="{{ $p->name }}" name="user_nik" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label>NIK</label>
                                <input class="form-control" type="text" value="{{ $p->nik }}" name="user_nik" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label>Tanggal</label>
                                <input class="form-control" type="text" value="{{ $p->tanggal }}" name="user_nik" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sisa Cuti</label>
                            <input class="form-control" type="text" value="{{ $p->total_cuti }}" name="user_nik" disabled>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" type="text" value="{{ $p->status }}" name="user_nik" disabled>
                        </div>
                        <br>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Accept') }}</button>
                            <a href="{{ route('staff-pengajuanList') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a>
                        </form>
                        @endforeach
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>


  </div>

@endsection
