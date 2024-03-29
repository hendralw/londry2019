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
                                    <h4>Data Transaction</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">

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
                                                    <th>No Nota</th>
                                                    <th>Customer Name</th>
                                                    <th>Pegawai</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Tanggal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(count($transactions))
                                                @foreach ($transactions as $transaction)

                                                <tr>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#lookmodal" id="transactions_id" data-id="{{ $transaction->transactions_id }}">
                                                            {{ $transaction->created_at->format('dmmY') }} - {{ $transaction->transactions_id }}</a>

                                                    </td>
                                                    <td>
                                                        {{ $transaction->customer->customers_name }} {{ $transaction->customer->customers_phone }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->employee->employees_name }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->total }}
                                                    </td>
                                                    <td>
                                                        @if($transaction->status === "Lunas")
                                                       <span class="text-success">Lunas</span> 
                                                       <span>  pada tanggal {{ $transaction->updated_at->format('m/d/Y')}} </span>
                                                        @else
                                                        <form action="/StatusProses/{{ $transaction->transactions_id }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}
                                                            @if($transaction->status === "Pesanan Dibuat")
                                                            <select id="sel_id" name="sel_name" class="form-control btn-info" onchange="this.form.submit();">
                                                            @elseif( $transaction->status === "Dikerjakan")
                                                            <select id="sel_id" name="sel_name" class="form-control btn-warning" onchange="this.form.submit();">
                                                            @else($transaction->status === "Selesai")
                                                            <select id="sel_id" name="sel_name" class="form-control btn-success" onchange="this.form.submit();">
                                                            @endif
                                                                <option selected value="{{ $transaction->status }}" disabled>{{ $transaction->status }}</option>
                                                                <option value="Pesanan Dibuat">Pesanan Dibuat</option>
                                                                <option value="Dikerjakan">Dikerjakan</option>
                                                                <option value="Selesai">Selesai</option>
                                                            </select>
                                                        </form>
                                               @endif
                                                    </td>
                                                    <td>
                                                        {{ $transaction->created_at->format('d M Y') }}
                                                    </td>
                                                    <td>
                                                        @if( $transaction->status === "Selesai")
                                                        <a href="" data-toggle="modal" data-target="#payModal" data-name="{{ $transaction->customer->customers_name }}" data-phone="{{ $transaction->customer->customers_phone}}" data-address="{{ $transaction->customer->customers_address }}" data-id="{{ $transaction->transactions_id }}" data-total="{{ $transaction->total }}" id="open"><i class="fa fa-money btn btn-primary btn-mini btn-round"></i></a>
                                                        @endif
                                                        <a href="" data-toggle="modal" data-target="#deletemodal" id="transactions_id" data-id="{{ $transaction->transactions_id }}"><i class="fa fa-trash-o btn btn-danger btn-mini btn-round"></i></a>

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
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <address>
                                                        <strong>Conzept Laundry</strong>
                                                        <br>
                                                        <br>
                                                        Los Angeles, CA 90026
                                                        <br>
                                                        <abbr title="Phone">P:</abbr> (213) 484-6829
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="">
                                                <table class="table table-hover table-condensed table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="detail_transactions_foreach"></tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2" class="text-right">
                                                                <h4><strong>Total: </strong></h4>
                                                            </td>
                                                            <td class="text-center text-danger">
                                                                <h4><strong id="total_price"></strong></h4>
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

            {{-- Modal Add Data --}}
            <div class="modal fade" id="payModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Payment</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="page-body">
                            
                                {{ Form::open(array('url' => 'PayProses', 'method' => 'PATCH')) }}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <address>
                                            Name : <strong id="customer_names"></strong>
                                            <br><br>
                                            Address : <span id="customer_addresss"></span><br>
                                            Phone Number : <span id="customer_phones"></span>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="number" name="customers_ids" id="customers_ids" hidden>
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Amount of Money
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="money" id="money">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Return
                                            </label>
                                            <div class="col-sm-6">
                                                Rp. <span class="return"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Detail Transaction
                                            </label>
                                            <div class="col-sm-12">
                                                <strong>Total Rp.<span class="cart_totalmodal"></span></strong>
                                            </div>
                                        </div>

                                        <div class="form-group row f-right">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary m-b-0" id="submitPay">Pay</button>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous">
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

</script> -->

    <script type="text/javascript">
        <?php echo 'let detail_transaksi = ' . $detail_transactions->toJson() . ";"; ?>

        $(document).ready(function() {
            // console.log("detail", detail_transaksi)
            $('#lookmodal').on('show.bs.modal', function(e) {
                var a = $(e.relatedTarget);
                var transactions_id = a.data('id');
                var modal = $(this)
                let detail = detail_transaksi.filter(item => item.transactions_id == transactions_id)
                var element = document.getElementById("detail_transactions_foreach");
                var temp = "";
                var total = 0;
                detail.forEach(myFunction);

                function myFunction(item) {
                    total = total + item.sub_total;
                    temp += "<tr><td align=left> <h4><em>" + item.list_item.list_items_name + "</em></h4></td>";
                    temp += "<td align=center>" + item.quantity + " " + item.list_item.unit_item.unit_items_name + "</td>";
                    temp += "<td align=center> Rp." + rubah(item.sub_total) + "</td></tr>";
                }

                function rubah(angka) {
                    var reverse = angka.toString().split('').reverse().join(''),
                        ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                    return ribuan;
                }
                element.innerHTML = temp;
                document.getElementById("total_price").innerHTML = "Rp." + rubah(total);
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).slideUp(500);
                });
            }, 5000);

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#submitPay').attr('disabled', 'disabled');

            function rubah(angka) {
                var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan;
            }
            $('#payModal').on('show.bs.modal', function(e) {
                var modal = $(e.relatedTarget);
                var id = modal.data('id');
                var name = modal.data('name');
                var address = modal.data('address');
                var phone = modal.data('phone');
                var total = modal.data('total');

                $('.cart_totalmodal').text(rubah(total));
                $('#customer_names').text(name);
                $('#customer_phones').text(phone);
                $('#customer_addresss').text(address);
                document.getElementById('customers_ids').value = id;


                $(document).on('keyup', '#money', function() {
                    var retun = $('#money').val() - total;
                    $('.return').text(retun.toFixed(2));

                    if ($('#money').val() < total) {
                        $('#submitPay').attr('disabled', 'disabled');
                    } else {
                        $('#submitPay').attr('disabled', false);
                    }

                });
            });
        });
    </script>
    @endsection