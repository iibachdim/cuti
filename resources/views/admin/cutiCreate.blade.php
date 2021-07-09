@extends('layouts.master')

@section('title', 'Tambah Data Cuti')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Tambah Data') }}</h4>
                      </div>
                      <div class="card-body">
                        <form method="POST" action="{{ route('cuti-store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col">
                                    <label>NIK</label>
                                    <input class="form-control" type="text" placeholder="{{ __('NIK') }}" name="user_nik" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Tahun</label>
                                    <input class="form-control" type="year" placeholder="{{ __('Tahun') }}" name="tahun" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Total Cuti</label>
                                <input class="form-control input-number" type="number" placeholder="{{ __('Total Cuti') }}" name="total_cuti" required autofocus>
                            </div>
                            <br>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Simpan') }}</button>
                            <a href="{{ route('cuti-list') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a>
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
