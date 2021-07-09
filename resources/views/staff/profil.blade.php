@extends('layouts.master')

@section('title', 'Cuti Karyawan')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Profil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4><b>{{$you->name }}</b></h4>
                      </div>
                      <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <tr>
                              <th>Nomor Induk</th>
                              <td>: {{ $you->nik }}</td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td>: {{ $you->email }}</td>
                            </tr>
                            <tr>
                              <th>Alamat</th>
                              <td>: {{ $you->alamat }}</td>
                            </tr>
                            <tr>
                              <th>No Handphone</th>
                              <td>: {{ $you->no_hp }}</td>
                            </tr>
                            <tr>
                              <th>Total Cuti</th>
                              @foreach($cuti as $c)
                              <td>: {{ $c->total_cuti }}</td>
                              @endforeach
                            </tr>
                        </table>
                        <a href="{{ url('/staff/editProfil-staff/' . $you->id) }}" class="btn btn-block btn-primary">{{ __('Edit Profil') }}</a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>


  </div>

@endsection
