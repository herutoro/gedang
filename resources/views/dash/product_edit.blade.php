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
                <h3 class="card-title">Form Edit Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($data as $datas)
              <form class="form-horizontal form-label-left" action="{{ route('product.update', $datas->id) }}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
              <form role="form">
                <div class="card-body">
                  <div class="form-group">

                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $datas->product_name }}">
                  </div>

                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="categories_id" id="categories_id" 
                      required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" class="form-control">
                      @foreach ($categories as $row)
                      <option value="{{ $row->id }}" {{ $row->id == $datas->categories_id ? 'selected':'' }}>
                        {{ ucfirst($row->categories_name) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('categories_id') }}</p>
                  </div>

                  <div class="form-group">
                    <img src="{{ url('uploads/image/'.$datas->image) }}" style="width: 150px; height: 150px;">
                </div>
                <div class="form-group">
                    <label for="email">Update Gambar</label>
                    <input type="file" class="form-control" id="imange" name="image">
                </div>

                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" rows="5" id="des" name="des">{{ $datas->description }}</textarea>
                  </div>

                   <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $datas->stock }}">
                  </div>

                   <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $datas->price }}">
                  </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Save Data</button>
               </div>
             </form>
             @endforeach
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