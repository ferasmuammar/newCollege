@extends('cms.parent')

@section('title' , ' City')

@section('css')

@endsection

@section('Main-title' , 'Index City')

@section('sub-title' , 'City')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a href="{{ route('cities.create') }}" type="button"  class="btn btn-info">Add City</a></h3>

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
                <th>Name City</th>
                <th>country Name</th>
                <th>setting</th>
                {{-- <span class="tag tag-success">Approved</span> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($cities as $City )
                    <tr>
                        <td>{{ $City->id }}</td>
                        <td>{{ $City->name }}</td>
                        <td>{{ $City->country->name }}</td>
                        {{-- <td>{{ $City->code }}</td> --}}

                        <td>
                            <a href="{{ route('cities.edit' , $City->id ) }}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="performDestroy({{ $City->id }}, this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                              {{-- <i class="fa-solid fa-circle-trash"></i> --}}
                        </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
        <hr>
        {{$cities->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection

@section('scripts')
<script>
        function performDestroy(id , ref){
            confirmDestroy('/cms/admin/cities/'+ id , ref);
        }
        </script>

@endsection
