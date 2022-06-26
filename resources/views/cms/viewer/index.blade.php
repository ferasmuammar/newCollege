@extends('cms.parent')

@section('title' , ' Viewer')

@section('css')

@endsection

@section('Main-title' , 'Index Viewer')

@section('sub-title' , 'Viewer')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a href="{{ route('viewers.create') }}" type="button"  class="btn btn-info">Add Viewer</a></h3>

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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Imag</th>
                <th>Eamil</th>
                <th>Mobile</th>
                <th>Gander</th>
                <th>Statues</th>
                <th>setting</th>
                {{-- <span class="tag tag-success">Approved</span> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($viewers as $viewer )
                    <tr>
                        <td>{{ $viewer->id }}</td>
                        <td>{{ $viewer->usertows->firstname }}</td>
                        <td>{{ $viewer->usertows->lasttname }}</td>
                        <td>{{ $viewer->usertows->image }}</td>
                        <td>{{ $viewer->email }}</td>
                        <td>{{ $viewer->usertows->mobile }}</td>
                        <td>{{ $viewer->usertows->gender }}</td>
                        <td>{{ $viewer->usertows->status }}</td>
                        <td>{{ $viewer->image }}</td>



                        <td>
                            <a href="{{ route('viewers.edit' , $viewer->id ) }}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="performDestroy({{ $viewer->id }}, this)" class="btn btn-danger">
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
        {{$viewers->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection

@section('scripts')
<script>
        function performDestroy(id , ref){
            confirmDestroy('/cms/admin/viewers/'+ id , ref);
        }
        </script>

@endsection
