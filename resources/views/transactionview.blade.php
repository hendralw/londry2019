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



<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Data Transaction</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Data Transaction</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="container"><br>
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
                                                    <th>No</th>
                                                    <th>Customer Name</th>
                                                    <th>Pegawai</th>
                                                    <th>Total</th>
                                                    <th>Tanggal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; ?>
                                                @if(count($transactions))
                                                @foreach ($transactions as $transaction)
                                                <?php $no++ ?>
                                                <tr>
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->customer->customers_name }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->employee->employees_name }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->total }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->created_at }}
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#lookmodal" id="transactions_id" data-id="{{ $transaction->transactions_id }}">
                                                            <i class="fa fa-search btn btn-warning btn-mini btn-round"></i></a>

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
            {{-- Look Add Data --}}
            <div class="modal fade" id="lookmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Transaksi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                                <div class="container">
                                    <div class="">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <address>
                                                        <strong>Elf Cafe</strong>
                                                        <br>
                                                        2135 Sunset Blvd
                                                        <br>
                                                        Los Angeles, CA 90026
                                                        <br>
                                                        <abbr title="Phone">P:</abbr> (213) 484-6829
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="">
                                                </span>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th class="text-center">Price</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class=""><em>Baked Rodopa Sheep Feta</em></h4>
                                                            </td>
                                                            <td class="" style="text-align: center"> 2 </td>
                                                            <td class=" text-center">$13</td>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td class="text-right">
                                                                <p>
                                                                    <strong>Subtotal: </strong>
                                                                </p>
                                                                <p>
                                                                    <strong>Tax: </strong>
                                                                </p>
                                                            </td>
                                                            <td class="text-center">
                                                                <p>
                                                                    <strong>$6.94</strong>
                                                                </p>
                                                                <p>
                                                                    <strong>$6.94</strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right">
                                                                <h4><strong>Total: </strong></h4>
                                                            </td>
                                                            <td class="text-center text-danger">
                                                                <h4><strong>$31.53</strong></h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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

    <!-- <script type="text/javascript">
    $(document).ready(function () {
        $("#addForm").validate({
            rules: {
                item_categories_id: "required",
                unit_items_id: "required",
                durations_id: "required",
                list_items_name: {
                    required: true,
                    minlength: 2
                },
                list_items_price: {
                    required: true,
                    minlength: 2,
                    digits: true
                }

            },
            messages: {
                item_categories_id: "Please choose Category",
                unit_items_id: "Please choose unit item",
                durations_id: "please choose duration",
                list_items_name: {
                    required: "Please enter a name",
                    minlength: "Name consist of at least 2 characters"
                },
                list_items_price: {
                    required: "Please enter a price",
                    minlength: "Price consist of at least 2 digits"
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#editForm").validate({
            rules: {
                item_categories_id: "required",
                unit_items_id: "required",
                durations_id: "required",
                list_items_name: {
                    required: true,
                    minlength: 2
                },
                list_items_price: {
                    required: true,
                    minlength: 2,
                    digits: true
                }

            },
            messages: {
                item_categories_id: "Please choose Category",
                unit_items_id: "Please choose unit item",
                durations_id: "please choose duration",
                list_items_name: {
                    required: "Please enter a name",
                    minlength: "Name consist of at least 2 characters"
                },
                list_items_price: {
                    required: "Please enter a price",
                    minlength: "Price consist of at least 2 digits"
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }

        });
    });

</script>

<script type="text/javascript">
    $('#editmodal').on('show.bs.modal', function (e) {
        var a = $(e.relatedTarget);
        var list_items_id_edit = a.data('id');
        var item_categories_id_edit = a.data('category');
        var unit_items_id_edit = a.data('unit');
        var durations_id_edit = a.data('duration');
        var list_items_name_edit = a.data('name');
        var list_items_price_edit = a.data('price');
        var modal = $(this)
        document.getElementById("list_items_id_edit").value = list_items_id_edit;
        document.getElementById("item_categories_id_edit").value = item_categories_id_edit;
        document.getElementById("unit_items_id_edit").value = unit_items_id_edit;
        document.getElementById("durations_id_edit").value = durations_id_edit;
        document.getElementById("list_items_name_edit").value = list_items_name_edit;
        document.getElementById("list_items_price_edit").value = list_items_price_edit;
    })

</script>

<script type="text/javascript">
    $('#deletemodal').on('show.bs.modal', function (e) {
        var a = $(e.relatedTarget);
        var list_items_id_delete = a.data('id');
        var modal = $(this)
        document.getElementById("list_items_id_delete").value = list_items_id_delete;
    })

</script> -->
    @endsection