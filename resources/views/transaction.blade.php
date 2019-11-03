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
                                    <h4>Data Kategori Unit Item</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Unit Item</a>
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
                <div class="card">
                        <div class="card-header">
                            <h5>Design Wizard</h5>
                            <span>Add class of <code>.form-control</code> with
                                <code>&lt;input&gt;</code> tag</span>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="wizard3">
                                        <section>
                                            <form class="wizard-form" id="design-wizard"
                                                action="#">
                                                <h3></h3>
                                                <fieldset>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="userName-2"
                                                                class="block">User name
                                                                *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="userName-23"
                                                                name="userName" type="text"
                                                                class=" form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="email-2"
                                                                class="block">Email
                                                                *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="email-23"
                                                                name="email" type="email"
                                                                class=" form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="password-2"
                                                                class="block">Password
                                                                *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="password-23"
                                                                name="password"
                                                                type="password"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="confirm-2"
                                                                class="block">Confirm
                                                                Password *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="confirm-23"
                                                                name="confirm"
                                                                type="password"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <h3></h3>
                                                <fieldset>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name-2"
                                                                class="block">First name
                                                                *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="name-23" name="name"
                                                                type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="surname-2"
                                                                class="block">Last name
                                                                *</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="surname-23"
                                                                name="surname" type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="phone-2"
                                                                class="block">Phone
                                                                #</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="phone-23"
                                                                name="phone" type="number"
                                                                class="form-control phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="date"
                                                                class="block">Date Of
                                                                Birth</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="date3"
                                                                name="Date Of Birth"
                                                                type="text"
                                                                class="form-control date-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">Select
                                                            Country</div>
                                                        <div class="col-sm-12">
                                                            <select
                                                                class="form-control required">
                                                                <option>Select State
                                                                </option>
                                                                <option>Gujarat</option>
                                                                <option>Kerala</option>
                                                                <option>Manipur</option>
                                                                <option>Tripura</option>
                                                                <option>Sikkim</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <h3></h3>
                                                <fieldset>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="University-2"
                                                                class="block">University</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="University-23"
                                                                name="University"
                                                                type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="Country-2"
                                                                class="block">Country</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="Country-23"
                                                                name="Country" type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="Degreelevel-2"
                                                                class="block">Degree level
                                                                #</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="Degreelevel-23"
                                                                name="Degree level"
                                                                type="text"
                                                                class="form-control required phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="datejoin"
                                                                class="block">Date
                                                                Join</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="datejoin3"
                                                                name="Date Of Birth"
                                                                type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <h3></h3>
                                                <fieldset>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="Company-2"
                                                                class="block">Company:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="Company-23"
                                                                name="Company:" type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="CountryW-2"
                                                                class="block">Country</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="CountryW-23"
                                                                name="Country" type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="Position-2"
                                                                class="block">Position</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input id="Position-23"
                                                                name="Position" type="text"
                                                                class="form-control required">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </section>
                                    </div>
                                </div>
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
<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modal.js') }}"></script> -->


<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modalEffects.js') }}"></script> -->
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
<!-- 
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="../files/assets/pages/advance-elements/custom-picker.js"></script> -->

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
        var name = a.data('name');
        // $("#branches_idmodal").val(id);
        var modal = $(this)
        document.getElementById("unit_items_name_modal").value = name;
        document.getElementById("unit_items_id_modal").value = id;
    })
</script>
<script src="{{ asset('files/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    // $.validator.setDefaults({
    //     submitHandler: function() {
    //         alert("submitted!");
    //     }
    // });

    $(document).ready(function() {
        $("#addForm").validate({
            rules: {
                unit_items_name: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                unit_items_name: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
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
@endsection

