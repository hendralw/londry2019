<?php
use App\Customer;
$customers = Customer::orderBy('customers_id', 'ASC')->get();
?>


<table id="cart" class="table table-hover table-condensed table-responsive">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
        @foreach((array) session('cart') as $id => $details)

        <?php $total += $details['price'] * $details['quantity'] ?>

        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"></div>
                    <div class="col-sm-9">
                        <h6 class="nomargin">{{ $details['name'] }}</h6>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp.{{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center">Rp.<span class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>
            <td class="actions" data-th="">
                <a href="" class="btn-info btn-mini update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></a>
                <a href="" class="btn-danger btn-mini remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></a>
                <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
            </td>
        </tr>
        @endforeach
        @endif

    </tbody>
    <tfoot>
        <tr class="visible-xs">
            <td colspan="3"></td>
            <td class="text-center"><strong>Total Rp.<span class="cart-total">{{ number_format($total,2,',','.') }}</span></strong></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><button class="btn btn-primary btn-md waves-effect f-right d-inline-block md-trigger" data-toggle="modal" data-target="#payModal" data-total="{{ $total }}" id="open">payment</button></td>     
        </tr>
    </tfoot>
</table>


