@extends('layouts.master')

@section('title', 'Edit Profil')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Edit Profil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profil</li>
      </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="card">
                      <div class="card-header">
                        <h4><b>{{ $user->name }}</b></h4>
                      </div>
                      <div class="card-body">
                        <form method="POST" action="{{ url('/staff/updateProfil-staff/' . $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col">
                                    <label>Nama</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Nama') }}" name="name" value="{{ $user->name }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Password</label>
                                    <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Email</label>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail') }}" name="email" value="{{ $user->email }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>No HP</label>
                                    <input class="form-control" type="text" placeholder="{{ __('No HP') }}" name="no_hp"  value="{{ $user->no_hp }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label>Alamat</label>
                                    <input class="form-control" type="text-area" placeholder="{{ __('Alamat') }}" name="alamat"  value="{{ $user->alamat }}" required autofocus>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Simpan') }}</button>
                            <a href="{{ route('staff-profil') }}" class="btn btn-block btn-primary">{{ __('Kembali') }}</a>
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
