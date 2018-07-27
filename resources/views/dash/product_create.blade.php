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
                <h3 class="card-title">Form Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" action="{{ route('product.store') }}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <form role="form">
                <div class="card-body">
                  <div class="form-group">

                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>

                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="categories_id" id="categories_id"
                      required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}"> class="form-control">
                      @foreach ($categories as $row)
                      <option value="{{ $row->id }}">{{ ucfirst($row->categories_name) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('categories_id') }}</p>
                  </div>

                  <div class="form-group">
                    <label for="email">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" rows="5" id="des" name="des"></textarea>
                  </div>

                   <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock">
                  </div>

                   <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" id="price" name="price">
                  </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Save Data</button>
               </div>
             </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection