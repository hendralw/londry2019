@extends('templates.default')

@section('content')



<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/themify-icons/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/icofont/css/icofont.css') }}">



<!-- <link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css') }}"> -->

<!-- <link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}"> -->

<!-- <link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/datedropper/css/datedropper.min.css') }}" /> -->


<link href="{{ asset ('files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset ('files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{ asset ('files/assets/icon/font-awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset ('files/bower_components/bootstrap-select/css/bootstrap-select.min.css') }}" />



<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Transaksi</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{ '/' }}"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Transaction</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success border-success">
                    <strong>Success</strong> {{ $message }}
                </div>
                @endif

                <div class="page-body">

                   

                    <div class="app-inner-layout app-inner-layout-page">


                        <div class="container-fluid">
                            <input class="form-control mb-3" id="myInput" type="text" placeholder="Search..">
                            
                            <div id="mydiv" class="pre-scrollable">
                                @include('searchb')
                            </div>

                        </div>

                    </div>

                </div>
                <span id="status"></span>
                    <!-- cart -->
                    <div id="mycart">
                        @include('cart')
                    </div>
                    <!-- sampai sini cart -->
                    {{-- Modal Add Data --}}
                        <div class="modal fade" id="payModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="alert alert-danger" style="display:none"></div>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Pay Transaction</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="page-body">
                                        <span id="statuscus"></span>
                                            <div id="addCustomer">
                                                <form id="formaddcustomer" method="post" action="javascript:void(0)">
                                                <p>Add New Customer</p>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="customers_name" id="customers_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="customers_address" id="customers_address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Phone Number
                                                    </label>

                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="customers_phone" id="customers_phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary m-b-0" id="submitForm">Create</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            {{ Form::open(array('route' => 'Transaction.store', 'method' => 'POST', 'id' => 'addForm')) }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label">Name
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <select class="selectpicker" data-live-search="true">
                                                                @foreach($customers as $customer)
                                                                    <option data-tokens="{{ $customer->customers_id }}">{{ $customer->customers_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button type="button" class="btn" id="buttonAdd">Add</button>
                                                        </div>
                                                    </div>

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
                                                            <span class="return"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label">Detail Transaction
                                                        </label>
                                                        <div class="col-sm-12">
                                                        <strong>Total Rp.<span class="cart-total"></span></strong>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row f-right">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn btn-primary m-b-0" id="submitForm">Pay</button>
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


        </div>
        
    </div>
    <div class="md-overlay"></div>
</div>
<script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery/js/jquery.min.js') }}"></script>
<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script> -->
<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script> -->

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/datedropper/js/datedropper.min.js') }}"></script>

<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script> -->
<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modal.js') }}"></script> -->


<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/modalEffects.js') }}"></script> -->
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset ('files/assets/js/classie.js') }}"></script>


<!-- <script src="{{ asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/pages/data-table/js/jszip.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->

<!-- <script src="{{ asset('files/assets/pages/data-table/js/pdfmake.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/assets/pages/data-table/js/vfs_fonts.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->
<!-- <script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->
<!-- <script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->
<!-- <script src="{{ asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script>
<script src="{{ asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->
<!-- <script src="{{ asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->

<!-- <script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next/js/i18next.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script> -->

<!-- 
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="../files/assets/pages/advance-elements/custom-picker.js"></script> -->

<!-- <script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/responsive-custom.js') }}" type="260fa9511e1061cdeb18b6d1-text/javascript"></script> -->
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
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="{{ asset('files/bower_components/jquery-slim/js/jquery-slim.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('files/assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script type="260fa9511e1061cdeb18b6d1-text/javascript" src="{{ asset('files/bower_components/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!--
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
</script> -->

<script>
    function fetch_data(query) {
        $.ajax({
            url: "/Transaction",
            data: {
                query: query
            },
            success: function(data) {
                $('#mydiv').html('');
                $('#mydiv').html(data);
                eval(document.getElementById("runscript").innerHTML);
                
            }
        })
    }
    $(document).on('keyup', '#myInput', function() {
        var query = $('#myInput').val();

        fetch_data(query);
    });
</script>

<!-- add to cart -->
<script type="text/javascript" id="runscript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            // ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {
                    
                    // ele.siblings('.btn-loading').hide();
                    
                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $('#mycart').fadeIn(500).html(response.data);
                    eval(document.getElementById("runscript2").innerHTML);
                    $( '.selectpicker' ).selectpicker( 'refresh' );
                },
            error: function(e) {
                alert('Error' + e);
            }
            });
        });
    </script>

<!-- edit delete reurn -->
  <script type="text/javascript" id="runscript2">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {
                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    product_subtotal.text(response.subTotal);
                    cart_total.text(response.total);
                  
                },
            error: function(e) {
                alert('Error' + e);
            }
            }); 
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");
            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {
                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        cart_total.text(response.total);
                        
                    },
            error: function(e) {
                alert('Error' + e);
            }
                });
            }
        });
       
   
    </script>
    <script >
         $('#payModal').on('show.bs.modal', function(e) {
        var a = $(e.relatedTarget);
        // $("#branches_idmodal").val(id);
        $('.selectpicker').selectpicker('refresh');
        $('.cart_total').text('.cart_total')
    });
    $(document).ready(function() {
            var x = document.getElementById("addCustomer");
            x.style.display = "none";
                $("#buttonAdd").click(function() {
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                });
        });
        
        $(document).on('keyup', '#money', function() {
        var retun = $('#money').val() - (parseInt(($('.cart-total').html().split('.').join("")), 10) );
        $('.return').text(retun.toFixed(2));
        
    });
    if ($("#formaddcustomer").length > 0) {
    $("#formaddcustomer").validate({
      
    rules: {
      customers_name: {
        required: true,
        minlength: 2
      },
      customers_phone: {
            required: true,
            digits:true,
            minlength: 10,
            maxlength:12,
        },
    customers_address: {
            required: true,
            minlength: 2,
            maxlength: 50,
        },    
    },
    messages: {
        
    customers_name: {
        required: "Please enter name",
        minlength: "The name minlength should be 2 characters long."
      },
      customers_phone: {
        required: "Please enter contact number",
        minlength: "The contact number should be 10 digits",
        digits: "Please enter only numbers",
        maxlength: "The contact number should be 12 digits",
      },
      customers_address: {
          required: "Please enter valid email",
          minlength: "The address minlength should be 2 characters long",
          maxlength: "The address name should less than or equal to 50 characters",
        },
         
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#submitForm').html('Sending..');
      $.ajax({
        url: '{{ url('CustomerStore') }}',
        type: "POST",
        data: $('#formaddcustomer').serialize(),
        success: function( response ) {
            $("span#statuscus").html('<div class="alert alert-success">'+response.msg+'</div>');
            $('#submitForm').html('Submit');
            
            document.getElementById("addCustomer").style.display ="none";
            document.getElementById("customers_name").value ="";
            document.getElementById("customers_address").value ="";
            document.getElementById("customers_phone").value ="";
            $('.selectpicker').append($('<option>', {
            value: res.getcategories[i].cat_id,
            text: res.getcategories[i].category
            }));
            $('.selectpicker').selectpicker('refresh');
        }
      });
    }
  });
}

</script>
@endsection