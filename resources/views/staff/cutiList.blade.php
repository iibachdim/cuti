@extends('layouts.master')

@section('title', 'Cuti Karyawan')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Cuti Karyawan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cuti Karyawan</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Cuti Karyawan') }}</h4>
                      </div>
                      <div class="card-body">
                          <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>Total Cuti</th>
                              <th>Tahun</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($user as $u)
                              <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->nik }}</td>
                                <td>{{ $u->total_cuti }}</td>
                                <td>{{ $u->tahun }}</td>
                                <td>
                                    <a href="{{ url('/staff/cutiAdd-staff/' . $u->id) }}" class="btn btn-info">Tambah Cuti</a>
                                </td>
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
