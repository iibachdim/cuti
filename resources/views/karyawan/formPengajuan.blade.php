@extends('layouts.master')

@section('title', 'Pengajuan Cuti')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
        <small>Pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengajuan</li>
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
                        @foreach($cuti as $c)
                        <table class="table table-responsive-sm table-striped">
                            <tr>
                              <th>Nomor Induk</th>
                              <td>: {{ $you->nik }}</td>
                            </tr>
                            <tr>
                              <th>Total Cuti</th>
                              <td>: {{ $c->total_cuti }}</td>
                            </tr>
                        </table>
                        @endforeach
                        <form method="POST" action="{{ route('proses-pengajuan') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col">
                                    <label>Tanggal Cuti</label>
                                    <input class="form-control" type="date" name="tanggal" required autofocus>
                                </div>
                            </div>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Ajukan') }}</button>
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
