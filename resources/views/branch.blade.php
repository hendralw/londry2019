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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
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
                                    <h4>Data Cabang</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ '/' }}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Data Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Data Cabang</a>
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
                                        <table id="new-cons" class="table table-striped table-bordered nowrap" data-form="deleteForm">
                                            <thead>
                                                <tr>
                                                    <th width=30px>No</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th width="40px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach ($branches as $branch)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>
                                                        {{ $branch->branches_name }}
                                                    </td>
                                                    <td>
                                                        {{ $branch->branches_address }}
                                                    </td>
                                                    <td>
                                                        {{ $branch->branches_phone }}
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('Branch.edit', $branch->branches_id) }}" data-toggle="modal" data-target="#editmodal" id="branches_id" data-id="{{ $branch->branches_id }}" data-name="{{ $branch->branches_name }}" data-address="{{ $branch->branches_address }}" data-phone="{{ $branch->branches_phone }}"><i class="fa fa-pencil btn btn-warning btn-mini btn-round"></i>
                                                        </a>

                                                        <a href="{{ route('Branch.destroy', $branch->branches_id) }}" data-toggle="modal" data-target="#deletemodal" id="branches_id" data-id="{{ $branch->branches_id }}"><i class="fa fa-trash-o btn btn-danger btn-mini btn-round"></i></a>

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
                            <h4 class="modal-title">Add Cabang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                                {{ Form::open(array('route' => 'Branch.store', 'method' => 'POST', 'id' => 'addForm')) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="branches_name" id="branches_name">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="branches_address" name="branches_address">
                                                <strong id=address-error></strong>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="branches_phone" name="branches_phone">
                                                <strong id=phone-error></strong>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-primary m-b-0" id="submitForm">Save</button>
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
                            <h4 class="modal-title">Edit Cabang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                                @if(count($branches))
                                {{ Form::model($branches, ['method' => 'PATCH', 'route' => ['Branch.update', $branch->branches_id], 'id' => 'editForm']) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row" hidden>
                                            <label class="col-sm-12 col-form-label">Id
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="branches_id" id="branches_id_edit">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="branches_name" id="branches_name_edit">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="branches_address" id="branches_address_edit">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Phone
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="branches_phone" id="branches_phone_edit">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
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
                                @if(count($branches))
                                {{ Form::model($branches, ['method' => 'Delete', 'route' => ['Branch.destroy', $branch->branches_id]]) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row" hidden>
                                            <label class="col-sm-12 col-form-label">Id
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="branches_id" id="branches_id_delete">
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

{{-- Validation --}}
<script src="{{ asset('files/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#addForm").validate({
            rules: {
                branches_name: {
                    required: true,
                    minlength: 2
                },
                branches_address: {
                    required: true,
                    minlength: 2
                },
                branches_phone: {
                    required: true,
                    minlength: 2,
                    digits: true
                }
            },
            messages: {
                branches_name: {
                    required: "Please enter a name",
                    minlength: "Name must consist of at least 2 characters"
                },
                branches_address: {
                    required: "Please enter an address",
                    minlength: "Address must consist of at least 2 characters"
                },
                branches_phone: {
                    required: "Please enter a phone number",
                    minlength: "Phone number must consist of at least 2 digits"
                },
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
                branches_name: {
                    required: true,
                    minlength: 2
                },
                branches_address: {
                    required: true,
                    minlength: 2
                },
                branches_phone: {
                    required: true,
                    minlength: 2,
                    digits: true
                }
            },
            messages: {
                branches_name: {
                    required: "Please enter a name",
                    minlength: "Name must consist of at least 2 characters"
                },
                branches_address: {
                    required: "Please enter an address",
                    minlength: "Address must consist of at least 2 characters"
                },
                branches_phone: {
                    required: "Please enter a phone number",
                    minlength: "Phone number must consist of at least 2 digits"
                },
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
    $('#editmodal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        var branches_id_edit = a.data('id');
        var branches_name_edit = a.data('name');
        var branches_address_edit = a.data('address');
        var branches_phone_edit = a.data('phone');
        var modal = $(this)
        document.getElementById("branches_id_edit").value = branches_id_edit;
        document.getElementById("branches_name_edit").value = branches_name_edit;
        document.getElementById("branches_address_edit").value = branches_address_edit;
        document.getElementById("branches_phone_edit").value = branches_phone_edit;
    })
</script>

<script type="text/javascript">
    $('#deletemodal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        var branches_id_delete = a.data('id');
        var modal = $(this)
        document.getElementById("branches_id_delete").value = branches_id_delete;
    })
</script>

@endsection