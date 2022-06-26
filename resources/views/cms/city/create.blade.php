@extends('cms.parent')

@section('title' , 'create')

@section('css')

@endsection

@section('Main-title' , 'Create City')

@section('sub-title' , 'City')

@section('content')
 <!-- general form elements -->
 <div class=" col-sm-12">
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create City</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class=" col-sm-6">
            <div class="card-body">
                @csrf
                <div class="form-group">
                <label for="name">Name City</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter City">
                </div>
        </div>
        <div class=" col-sm-6">
            <div class="form-group">
              <label>Country</label>
              <select class="form-control select2 select2-danger" id="country_id" name="country_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option selected="selected">Alabama</option>
                @foreach ($countreis as $country )
                <option value="{{ $country->id }}" >{{ $country->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
            <a href="{{ route('cities.index') }}" type="button"  class="btn btn-info">Back</a>

        </div>
    </form>
  </div>
</div>
  <!-- /.card -->

@endsection

@section('scripts')
    <script>
        function performStore(){
            let data ={
                name: document.getElementById('name').value,
                country_id: document.getElementById('country_id').value,

            }
            store('/cms/admin/cities' ,data );
        }
        </script>

@endsection
