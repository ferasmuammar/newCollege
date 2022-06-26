@extends('cms.parent')

@section('title', 'Author')

@section('css')

@endsection

@section('Main-title', 'Edit Author')

@section('sub-title', 'Author')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">edit Author</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="edit_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class=" col-sm-3">

                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control select2 select2-danger" id="country_id" name="country_id"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                @foreach ($countreis as $country)
                                <option @if ($country->id==$authors->country_id)selected @endif value="{{ $country->id}}" >{{ $country->name }}</option>
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="firstname">first Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                          value="{{ $authors->usertow->first_name }}"  placeholder="Enter your First Name">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                          value="{{ $authors->usertow->last_name }}"  placeholder="Enter your Last Name">
                    </div>


                    <div class="form-group col-md-4">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                        value="{{ $authors->usertow->mobile }}" placeholder="Enter your mobile">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">Eamil</label>
                        <input type="email" class="form-control" id="email" name="email"
                        value="{{ $authors->email}}" placeholder="Enter your email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                        value="{{ $authors->password }}"    placeholder="Enter your password">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="dateOfBirth"> Date Of Birth </label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                        value="{{ $authors->usertow->dateOfBirth }}" placeholder="Enter your password">
                    </div>
                    {{-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control datetimepicker-input"
                            data-target="#reservationdate" />

                    </div> --}}


                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control select2 select2-danger"  id="gender" name="gender"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option selected> {{ $authors->usertow->gender }} </option>
                                <option value="Male">Male</option>
                                <option value="Femail">Femail</option>
                            </select>
                        </div>
                    </div>


                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control select2 select2-danger" id="status" name="status"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option selected> {{ $authors->usertow->status }} </option>
                                <option value="Active">Active</option>
                                <option value="unActive">unActive</option>
                            </select>
                        </div>
                    </div>
                </div>
            <

            {{-- <div class="form-group col-md-12">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Enter image">
            </div> --}}



    </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" onclick=" performUpdate({{ $authors->id }})" class="btn btn-primary"> update</button>
        <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">Back</a>

    </div>
    </form>
    </div>
    <!-- /.card -->

@endsection

@section('scripts')

    {{-- <script>
        function performUpdate(id) {

            let formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('dateOfBirth', document.getElementById('dateOfBirth').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('country_id', document.getElementById('country_id').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            // formData.append('image', document.getElementById('image').files[0]);

            // store('/cms/Author/Authors/',+id , formData);
            let redirectUrl='/cms/Author/Authors#'
            update('/cms/Author/Authors/'+ id , formData ,redirectUrl);

        }
    </script> --}}

<script>
    function performUpdate(id){
        let data={
            first_name: document.getElementById('first_name').value,
            country_id: document.getElementById('country_id').value,
            last_name: document.getElementById('last_name').value,
            mobile: document.getElementById('mobile').value,
            dateOfBirth: document.getElementById('dateOfBirth').value,
            gender: document.getElementById('gender').value,
            status: document.getElementById('status').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,


        }
        let redirectUrl='/cms/Author/cities#'
         update('/cms/admin/authors/'+ id , data ,redirectUrl);

    }
    </script>

@endsection
