@extends('layouts.master')

@section('title', 'User Create')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>User List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User List</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4>{{ __('Create User') }}</h4>
                      </div>
                      <div class="card-body">
                        <form method="POST" action="{{ route('user-store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="col">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Nama') }}" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Email</label>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail') }}" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="laki-laki">Laki - laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="karyawan">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>NIK</label>
                                    <input class="form-control" type="text" placeholder="{{ __('NIK') }}" name="nik" required autofocus>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Simpan') }}</button>
                            <a href="{{ route('user-list') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a>
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
