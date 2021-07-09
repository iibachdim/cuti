@extends('layouts.master')

@section('title', 'Status Pengajuan')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
        <small>Status Pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Status Pengajuan Cuti</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Status Pengajuan Cuti') }}</h4>
                      </div>
                      <div class="card-body">
                          <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>Tanggal Cuti</th>
                              <th>Sisa Cuti</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pengajuan as $p)
                              <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->total_cuti }}</td>
                                <td>{{ $p->status }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>


  </div>

@endsection
