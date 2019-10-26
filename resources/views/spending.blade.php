@extends('templates.default')

@section('content')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->




<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/themify-icons/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/icofont/css/icofont.css') }}">



<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datedropper/css/datedropper.min.css') }}" />

<link href="{{ asset ('files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset ('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/font-awesome/css/font-awesome.min.css') }}">



<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Data Pengeluaran</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ '/' }}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Spending</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="container"><br>
                            <button class="btn btn-primary btn-md waves-effect f-right d-inline-block md-trigger" data-toggle="modal" data-target="#default-Modal"><i class="fa fa-plus"></i>Add</button>
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
                                                    <th width=30px>Name</th>
                                                    <th width=30px>Id</th>
                                                    <th>No</th>
                                                    <th>Cabang</th>
                                                    <th>Kategori</th>
                                                    <th>Total</th>
                                                    <th>Tanggal</th>
                                                    <th width="40px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @if(count($spendings))
                                                @foreach ($spendings as $spending)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>
                                                        {{ $spending->spendings_name }}
                                                    </td>
                                                    <td>
                                                        {{ $spending->spendings_id }}
                                                    </td>
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>
                                                        {{ $spending->branch->branches_name }}
                                                    </td>
                                                    <td>
                                                        {{ $spending->spending_category->spending_categories_name }}
                                                    </td>
                                                    <td>
                                                        Rp.{{ $spending->spendings_total }}
                                                    </td>
                                                    <td>
                                                        {{ $spending->spendings_date }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('Spending.edit', $spending->spendings_id) }}" data-toggle="modal" data-target="#editmodal" id="spendings_id" data-id="{{ $spending->spendings_id }}" data-branch="{{ $spending->branches_id }}" data-name="{{ $spending->spendings_name }}" data-category="{{ $spending->spending_categories_id }}" data-total="{{ $spending->spendings_total }}" data-date="{{ $spending->spendings_date }}"><i class="fa fa-pencil btn btn-warning btn-mini btn-round"></i></a>


                                                        {!! Form::open(['method' => 'Delete', 'route' => ['Spending.destroy', $spending->spendings_id], 'style'=>'display:inline', 'id'=>'delete_form']) !!}
                                                        <a href="#" onclick="document.getElementById('delete_form').submit()"> <i class="fa fa-trash-o btn btn-danger btn-mini btn-round"></i></a>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Add Data --}}
            <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Cabang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">

                                {{ Form::open(array('route' => 'Spending.store', 'method' => 'POST')) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="spendings_name" id="spendings_name">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-12">
                                                <!-- <input type="text" class="form-control" id="spending_categories_id " name="spending_categories_id "> -->
                                                <select name="branches_id" id="branches_id" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($branches as $branch)
                                                    <option value="{{ $branch->branches_id }}">{{ $branch->branches_name }}</option>
                                                    @endforeach
                                                </select>

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kategori
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="spending_categories_id" id="spending_categories_id" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($spending_categories as $category)
                                                    <option value="{{ $category->spending_categories_id  }}">{{ $category->spending_categories_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total
                                            </label>
                                            <div class="col-sm-12 row">
                                                <p class="col">Rp.</p>
                                                <input type="number" class="form-control col-10" name="spendings_total" id="spendings_total">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal
                                            </label>
                                            <div class="col-sm-12">
                                                <div class="input-group date fj-date">
                                                    <input id="spendings_date" name="spendings_date" class="form-control" type="text" placeholder="Select your date" /><span class="input-group-addon">
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-primary m-b-0">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Data --}}
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
                                @if(count($spendings))
                                {{ Form::model($spendings, ['method' => 'PATCH', 'route' => ['Spending.update', $spending->spendings_id]]) }}

                                {{-- {{ Form::open(array('route' => ['Branch.update', $branch->id], 'method' => 'PATCH')) }}
                                --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Id
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="spendings_id" id="spendings_id_modal">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="spendings_name" id="spendings_name_modal">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Cabang</label>
                                            <div class="col-sm-12">
                                                <!-- <input type="text" class="form-control" id="spending_categories_id " name="spending_categories_id "> -->
                                                <select name="branches_id" id="branches_id_modal" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($branches as $branch)
                                                    <option value="{{ $branch->branches_id }}">{{ $branch->branches_name }}</option>
                                                    @endforeach
                                                </select>

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kategori
                                            </label>
                                            <div class="col-sm-12">
                                                <select name="spending_categories_id" id="spending_categories_id_modal" class="form-control">
                                                    <option value="" disabled selected></option>
                                                    @foreach($spending_categories as $category)
                                                    <option value="{{ $category->spending_categories_id  }}">{{ $category->spending_categories_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total
                                            </label>
                                            <div class="col-sm-12 row">
                                                <p class="col">Rp.</p>
                                                <input type="number" class="form-control col-10" name="spendings_total" id="spendings_total_modal">

                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal
                                            </label>
                                            <div class="col-sm-12">
                                                <div class="input-group date fj-date">
                                                    <input id="spendings_date_modal" name="spendings_date" class="form-control" type="text" placeholder="Select your date" /><span class="input-group-addon">
                                                </div>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                                <button type="submit" class="btn btn-primary m-b-0">Save</button>
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
<script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/datedropper/js/datedropper.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modal.js') }}"></script>


<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modalEffects.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/classie.js') }}"></script>


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
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="../files/assets/pages/advance-elements/custom-picker.js"></script>

<script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/responsive-custom.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/js/pcoded.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/js/vartical-layout.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#editmodal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        var id = a.data('id');
        var branch = a.data('branch');
        var category = a.data('category');
        var name = a.data('name');
        var total = a.data('total');
        var date = a.data('date');
        // $("#branches_idmodal").val(id);
        var modal = $(this)
        document.getElementById("spendings_id_modal").value = id;
        document.getElementById("branches_id_modal").value = branch;
        document.getElementById("spending_categories_id_modal").value = category;
        document.getElementById("spendings_name_modal").value = name;
        document.getElementById("spendings_total_modal").value = total;
        document.getElementById("spendings_date_modal").value = date;

    })
</script>

@endsection