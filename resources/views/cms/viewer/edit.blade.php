@extends('cms.parent')

@section('title' , 'Edit')

@section('css')

@endsection

@section('Main-title' , 'Edit City')

@section('sub-title' , 'City')

@section('content')
 <!-- general form elements -->
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit City</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name City</label>
          <input type="text" class="form-control" value="{{ $cities->name }}" name="name" id="name" placeholder="Enter City">
        </div>

        <div class=" col-sm-6">
            <div class="form-group">
              <label>City</label>
              <select class="form-control select2 select2-danger" id="country_id" name="country_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option selected="selected">Alabama</option>
                @foreach ($countries as $country )
                <option @if ($country->id==$cities->country_id)selected @endif value="{{ $country->id}}" >{{ $country->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" onclick="performUpdate({{ $cities->id }})" name="save" class="btn btn-primary">update</button>
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
            country_id: document.getElementById('country_id').value,
        }
        let redirectUrl='/cms/admin/cities#'
         update('/cms/admin/cities/'+ id , data ,redirectUrl);

    }
    </script>


@endsection
