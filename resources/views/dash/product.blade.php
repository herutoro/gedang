  <!-- menginclude base.blade.php -->
@extends('dash.base')
<!-- memasukkan pada bag. konten @yield('content') yg dibuat pada base.bladee.php--> 
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @if(Session::has('alert-success'))
                  <div class="alert alert-success">
                      <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                  </div>
                @endif
           <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kategori Barang</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card-header">
                <div class="pull-right"><a href="{{ url('/product/create') }}" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Barang</a></div>
                <tr></tr></div>
            </div>
                                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <!--<th>Deskripsi</th>-->
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                 </thead>
              <tbody id="show_data">                
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ url('uploads/image/'.$datas->image) }}" style="width: 100px; height: 100px;"> </td>
                        <td>{{ $datas->product_name }}</td>
                        <td>{{ $datas->categories->categories_name }}</td>
                        <!--<td>{{ $datas->description }}</td>-->
                        <td>{{ $datas->stock }}</td>
                        <td>Rp. {{number_format ($datas->price) }}</td>
                        <td>

                        <form action="{{ route('product.destroy', $datas->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <a href="{{ route('product.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                      <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                      </form>
                    </td>
                  </tr>

                @endforeach
                                   
                </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection