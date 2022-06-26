@extends('cms.parent')

@section('title' , ' Author')

@section('css')

@endsection

@section('Main-title' , 'Index Author')

@section('sub-title' , 'Author')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> <a href="{{ route('authors.create') }}" type="button"  class="btn btn-info">Add Author</a></h3>

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
                @foreach ( $authors as $author )
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->usertow ?$author->usertow->first_name: 'Null' }}</td>
                        <td>{{ $author->usertow ?$author->usertow->last_name :'Null' }}</td>
                        <td> <img class="img-circle img-bordered-sm" src="{{('/storage/images/author/'.$author->image) }}" width="50" height="50" alt="AuthorIamge" ></td>
                        {{-- <td>{{ $author->usertow ?$author->usertow->image : 'Null' }}</td> --}}
                        <td>{{ $author?$author->email:'Null' }}</td>
                        <td>{{ $author->usertow? $author->usertow->mobile: 'Null' }}</td>
                        <td>{{ $author->usertow?$author->usertow->gender : 'Null' }}</td>
                        <td>{{ $author->usertow?$author->usertow->status:'Null' }}</td>




                        <td>
                            <a href="{{ route('authors.edit', $author->id ) }}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" onclick="performDestroy({{ $author->id }}, this)" class="btn btn-danger">
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
        {{ $authors->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection

@section('scripts')
<script>
        function performDestroy(id , ref){
            confirmDestroy('/cms/admin/authors/'+ id , ref);
        }
        </script>

@endsection
