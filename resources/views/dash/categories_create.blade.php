@extends('dash.base')
@section('content')
           <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">    
    

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" action="{{ route('categories.store') }}"
                method="post">
                {{ csrf_field() }}
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                
                
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="des">Deskripsi</label>
                    <input type="text" class="form-control" id="des" name="des">
                </div>
                
                <div class="form-group">
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Save Data</button>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection