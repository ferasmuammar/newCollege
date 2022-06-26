@extends('cms.parent')

@section('title' , 'Edit')

@section('css')

@endsection

@section('Main-title' , 'Edit Country')

@section('sub-title' , 'Country')

@section('content')
 <!-- general form elements -->
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name Country</label>
          <input type="text" class="form-control" value="{{ $countries->name }}" name="name" id="name" placeholder="Enter Country">
        </div>
        <div class="form-group">
          <label for="code">Code</label>
          <input type="text" class="form-control" value="{{ $countries->code }}" name="code" id="code" placeholder="Enter code">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" onclick="performUpdate({{ $countries->id }})" name="save" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let data={
            name: document.getElementById('name').value,
            code: document.getElementById('code').value,
        }
        let redirectUrl='/cms/admin/countries#'
         update('/cms/admin/countries/'+ id , data ,redirectUrl);

    }
    </script>


@endsection
