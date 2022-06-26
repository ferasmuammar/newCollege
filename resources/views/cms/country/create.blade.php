@extends('cms.parent')

@section('title' , 'create')

@section('css')

@endsection

@section('Main-title' , 'Create Country')

@section('sub-title' , 'Country')

@section('content')
 <!-- general form elements -->
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name Country</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Country">
        </div>
        <div class="form-group">
          <label for="code">Code</label>
          <input type="text" class="form-control" name="code" id="code" placeholder="Enter code">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
        <a href="{{ route('countries.index') }}" type="button"  class="btn btn-info">Back</a>

    </div>
    </form>
  </div>
  <!-- /.card -->

@endsection

@section('scripts')
    <script>
        function performStore(){
            let data ={
                name: document.getElementById('name').value,
                code: document.getElementById('code').value,

            }
            store('/cms/admin/countries' ,data );
        }
        </script>

@endsection
