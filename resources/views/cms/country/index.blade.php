@extends('cms.parent')

@section('title' , ' Country')

@section('css')

@endsection

@section('Main-title' , 'Index Country')

@section('sub-title' , 'Country')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a href="{{ route('countries.create') }}" type="button"  class="btn btn-info">Add country</a></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover text-nowrap table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>code</th>
                <th>created at</th>
                <th>number of city</th>
                <th>setting</th>
                {{-- <span class="tag tag-success">Approved</span> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country )
                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->code }}</td>
                        <td>{{ $country->created_at }}</td>
                        <td><span class="badge bg-success">{{ $country->cities_count }} City</span></td>
                        <td>
                            <a href="{{ route('countries.edit' , $country->id ) }}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="performDestroy({{ $country->id }}, this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                              {{-- <i class="fa-solid fa-circle-trash"></i> --}}
                        </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <hr>
        {{$countries->links() }}
      <!-- /.card -->
    </div>
  </div>

@endsection

@section('scripts')
<script>
        function performDestroy(id , ref){
            confirmDestroy('/cms/admin/countries/'+ id , ref);
        }
        </script>

@endsection
