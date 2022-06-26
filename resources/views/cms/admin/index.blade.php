@extends('cms.parent')

@section('title' , ' Admin')

@section('css')

@endsection

@section('Main-title' , 'Index Admin')

@section('sub-title' , 'Admin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a href="{{ route('admins.create') }}" type="button"  class="btn btn-info">Add Admin</a></h3>

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
                @foreach ($admins as $admin )
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->usertow ?$admin->usertow->first_name: 'Null' }}</td>
                        <td>{{ $admin->usertow ?$admin->usertow->last_name :'Null' }}</td>
                        <td> <img class="img-circle img-bordered-sm" src="{{('/storage/images/admin/'.$admin->image) }}" width="50" height="50" alt="AdminIamge" ></td>
                        {{-- <td>{{ $admin->usertow ?$admin->usertow->image : 'Null' }}</td> --}}
                        <td>{{ $admin?$admin->email:'Null' }}</td>
                        <td>{{ $admin->usertow? $admin->usertow->mobile: 'Null' }}</td>
                        <td>{{ $admin->usertow?$admin->usertow->gender : 'Null' }}</td>
                        <td>{{ $admin->usertow?$admin->usertow->status:'Null' }}</td>




                        <td>
                            <a href="{{ route('admins.edit' , $admin->id ) }}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="performDestroy({{ $admin->id }}, this)" class="btn btn-danger">
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
        {{$admins->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection

@section('scripts')
<script>
        function performDestroy(id , ref){
            confirmDestroy('/cms/admin/admins/'+ id , ref);
        }
        </script>

@endsection
