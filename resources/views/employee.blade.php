@extends('templates.default')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/themify-icons/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/icofont/css/icofont.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css') }}">


<link href="{{ asset ('files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset ('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/font-awesome/css/font-awesome.min.css') }}">

<!-- 

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> -->


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Data Pegawai</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" hidden>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ '/' }}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Data Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Data Pegawai</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="container"><br>
                            <button class="btn btn-primary btn-md waves-effect f-right d-inline-block md-trigger" data-toggle="modal" data-target="#default-Modal" id="open"><i class="fa fa-plus"></i>Add
                                Data</button>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success border-success">
                    <strong>Success</strong> {{ $message }}
                </div>
                @endif

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="new-cons" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th width=30px>No</th>
                                                    <th>Cabang</th>
                                                    <th>Role</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Salary</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th width="40px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach ($employees as $employee)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->branch->branches_name }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->role->roles_name }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->employees_name }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->employees_address }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->employees_phone }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->employees_salary }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->username }}
                                                    </td>
                                                    <td>
                                                        {{ $employee->password }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('Employee.edit', $employee->employees_id) }}" data-toggle="modal" data-target="#editmodal" id="employees_id" data-id="{{ $employee->employees_id }}" data-branch="{{ $employee->branch->branches_id }}" data-role="{{ $employee->roles_id }}" data-name="{{ $employee->employees_name }}" data-address="{{ $employee->employees_address }}" data-phone="{{ $employee->employees_phone }}" data-salary="{{ $employee->employees_salary }}" data-username="{{ $employee->username }}" data-password="{{ $employee->password }}"><i class="fa fa-pencil btn btn-warning btn-mini btn-round"></i></a>

                                                        <a href="{{ route('Employee.destroy', $employee->employees_id) }}" data-toggle="modal" data-target="#deletemodal" id="employees_id" data-id="{{ $employee->employees_id }}"><i class="fa fa-trash-o btn btn-danger btn-mini btn-round"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Add Data --}}
            <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header">
                            <h4 class="modal-title">Add Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                                {{ Form::open(array('route' => 'Employee.store', 'method' => 'POST', 'id' => 'addForm')) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Cabang
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="branches_id" id="branches_id" class="form-control">
                                                    <option value="" disabled selected>-- Select Cabang --</option>
                                                    @foreach($branches as $branch)
                                                    <option value="{{ $branch->branches_id }}">
                                                        {{ $branch->branches_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Role
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="roles_id" id="roles_id" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->roles_id }}">{{ $role->roles_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="employees_name" id="employees_name">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="employees_address" name="employees_address">
                                                <strong id=address-error></strong>

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="employees_phone" name="employees_phone">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Salary
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="employees_salary" name="employees_salary">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="username" name="username">
                                                <span id="error_user"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" id="password" name="password">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" name="submitForm" class="btn btn-primary m-b-0" id="submitForm">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Edit Data --}}
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                                @if(count($employees))
                                {{ Form::model($employees, ['method' => 'PATCH', 'route' => ['Employee.update', $employee->employees_id], 'id' => 'editForm']) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Id
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="employees_id" id="employees_id_edit">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Cabang
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="branches_id" id="branches_id_edit" class="form-control">
                                                    <option value="" disabled selected>-- Select Cabang --</option>
                                                    @foreach($branches as $branch)
                                                    <option value="{{ $branch->branches_id }}">
                                                        {{ $branch->branches_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Role
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="roles_id" id="roles_id_edit" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->roles_id }}">{{ $role->roles_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="employees_name" id="employees_name_edit">
                                                {{-- @if ($errors->has('employees_name'))
                                                <span class="text text-danger">
                                                    {{ $errors->first('employees_name') }}
                                                </span>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="employees_address_edit" name="employees_address">
                                                <strong id=address-error></strong>

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="employees_phone_edit" name="employees_phone">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Salary
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="employees_salary_edit" name="employees_salary">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="username_edit" name="username">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" id="password_edit" name="password">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                                <button type="submit" id="submitForm" class="btn btn-primary m-b-0">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Delete Data --}}
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="page-body">
                                @if(count($employees))
                                {{ Form::model($employees, ['method' => 'Delete', 'route' => ['Employee.destroy', $employee->employees_id]]) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row" hidden>
                                            <label class="col-sm-12 col-form-label">Id
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="employees_id" id="employees_id_delete">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label text-center">
                                                <h5>Are you sure want to
                                                    delete this data?</h5>
                                            </label>
                                        </div>
                                        <div style="text-align: center">
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary m-b-0">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div>
</div>
<script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
</script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>


<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<script src="{{ asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/pages/data-table/js/jszip.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>

<script src="{{ asset('files/assets/pages/data-table/js/pdfmake.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/pages/data-table/js/vfs_fonts.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next/js/i18next.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}">
</script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>

<script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/responsive-custom.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/js/pcoded.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/js/vartical-layout.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript">
</script>
<script src="{{ asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/assets/js/script.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script src="{{ asset ('ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="260fa9511e1061cdeb18b6d1-|49" defer=""></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


<script type="text/javascript">
    $('#editmodal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        var employees_id_edit = a.data('id');
        var branches_id_edit = a.data('branch');
        var roles_id_edit = a.data('role');
        var employees_name_edit = a.data('name');
        var employees_address_edit = a.data('address');
        var employees_phone_edit = a.data('phone');
        var employees_salary_edit = a.data('salary');
        var username_edit = a.data('username');
        var password_edit = a.data('password');
        var modal = $(this)
        document.getElementById("employees_id_edit").value = employees_id_edit;
        document.getElementById("branches_id_edit").value = branches_id_edit;
        document.getElementById("roles_id_edit").value = roles_id_edit;
        document.getElementById("employees_name_edit").value = employees_name_edit;
        document.getElementById("employees_address_edit").value = employees_address_edit;
        document.getElementById("employees_phone_edit").value = employees_phone_edit;
        document.getElementById("employees_salary_edit").value = employees_salary_edit;
        document.getElementById("username_edit").value = username_edit;
        document.getElementById("password_edit").value = password_edit;
    })
</script>

<script type="text/javascript">
    $('#deletemodal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        var employees_id_delete = a.data('id');
        var modal = $(this)
        document.getElementById("employees_id_delete").value = employees_id_delete;
    })
</script>
{{-- Validation --}}
<script src="{{ asset('files/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#addForm").validate({
            rules: {
                branches_id: "required",
                roles_id: "required",
                employees_name: {
                    required: true,
                    minlength: 2
                },
                employees_address: {
                    required: true,
                    minlength: 2
                },
                employees_phone: {
                    required: true,
                    digits: true,
                    minlength: 2
                },
                employees_salary: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                branches_id: "Please choose a branch",
                roles_id: "Please choose a Role",
                employees_name: {
                    required: "Please enter a name",
                    minlength: "Name must consist of at least 2 characters"
                },
                employees_address: {
                    required: "Please enter an address",
                    minlength: "Address consist of at least 2 characters"
                },
                employees_phone: {
                    required: "Please enter a phone number",
                    minlength: "Phone Number consist of at least 2 characters"
                },
                employees_salary: "Please fill a salary",
                username: {
                    required: "Please enter a username",
                    minlength: "Username consist of at least 2 characters"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password consist of at least 2 characters"
                }
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#editForm").validate({
            rules: {
                branches_id: "required",
                roles_id: "required",
                employees_name: {
                    required: true,
                    minlength: 2
                },
                employees_address: {
                    required: true,
                    minlength: 2
                },
                employees_phone: {
                    required: true,
                    digits: true,
                    minlength: 2
                },
                employees_salary: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                branches_id: "Please choose a branch",
                roles_id: "Please choose a Role",
                employees_name: {
                    required: "Please enter a name",
                    minlength: "Name must consist of at least 2 characters"
                },
                employees_address: {
                    required: "Please enter an address",
                    minlength: "Address consist of at least 2 characters"
                },
                employees_phone: {
                    required: "Please enter a phone number",
                    minlength: "Phone Number consist of at least 2 characters"
                },
                employees_salary: "Please fill a salary",
                username: {
                    required: "Please enter a username",
                    minlength: "Username consist of at least 2 characters"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password consist of at least 2 characters"
                }
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        document.getElementById('username').value = ''
        $('#submitForm').attr('disabled', 'disabled');
        $('#username').keyup(function() {
            var error_user = '';
            var username = $('#username').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/Employee/check')}}",
                method: "POST",
                data: {
                    username: username,
                    _token: _token
                },
                success: function(result) {
                    if (!$('#username').val()){
                        $('#error_user').html('');
                        $('#username').removeClass('has-error');
                        $('#submitForm').attr('disabled', 'disabled');
                    }
                    else if (result == 'unique') {
                        $('#error_user').html('');
                        $('#username').removeClass('has-error');
                        $('#submitForm').attr('disabled', false);
                    } else {
                        $('#error_user').html('<label class="text-danger">Username not Available</label>');
                        $('#username').addClass('has-error');
                        $('#submitForm').attr('disabled', 'disabled');
                    }
                }
            })

        });

    });
</script>

<script>
    $(document).ready(function() {
        document.getElementById('username').value = ''
        $('#submitForm').attr('disabled', 'disabled');
        $('#username').keyup(function() {
            var error_user = '';
            var username = $('#username').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/Employee/check')}}",
                method: "POST",
                data: {
                    username: username,
                    _token: _token
                },
                success: function(result) {
                    if (!$('#username').val()){
                        $('#error_user').html('');
                        $('#username').removeClass('has-error');
                        $('#submitForm').attr('disabled', 'disabled');
                    }
                    else if (result == 'unique') {
                        $('#error_user').html('');
                        $('#username').removeClass('has-error');
                        $('#submitForm').attr('disabled', false);
                    } else {
                        $('#error_user').html('<label class="text-danger">Username not Available</label>');
                        $('#username').addClass('has-error');
                        $('#submitForm').attr('disabled', 'disabled');
                    }
                }
            })

        });

    });
</script>
@endsection