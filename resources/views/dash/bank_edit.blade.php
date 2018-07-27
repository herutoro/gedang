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
                <h3 class="card-title">Form Edit Bank</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($data as $datas)
              <<form class="form-horizontal form-label-left"
                action="{{ route('bank.update', $datas->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                
                
                <div class="form-group">
                    <label for="nama">Nama Bank</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $datas->bank_name }}">
                </div>
                
                <div class="form-group">
                    <label for="nama">No. Rek</label>
                    <input type="text" class="form-control" id="rek" name="rek" value="{{ $datas->no_rek }}">
                </div>

                <div class="form-group">
                    <label for="nama">Atas Nama</label>
                    <input type="text" class="form-control" id="an" name="an" value="{{ $datas->an }}">
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Save Data</button>
                </div>
            </form>
            @endforeach
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection