@extends('layouts.master')

@section('title', 'User List')
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
                        <h4>{{ __('User List') }}</h4>
                        <a href="{{ route('user-create') }}" class="btn btn-success">Tambah User</a>
                      </div>
                      <div class="card-body">
                          <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>No HP</th>
                              <th colspan="2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($user as $u)
                              <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->nik }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td>{{ $u->no_hp }}</td>
                                <td>
                                    <a href="{{ url('/admin/editUser/' . $u->id) }}" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('user-delete', 'id='.$u->id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
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
