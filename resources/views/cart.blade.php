<span id="status"></span>

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
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp.{{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center">Rp.<span class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>
            <td class="actions" data-th="">
                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
            </td>
        </tr>
        @endforeach
        @endif

    </tbody>
    <tfoot>
        <tr class="visible-xs">
            <td colspan="3"></td>
            <td class="text-center"><strong>Total Rp.<span class="cart-total">{{ $total }}</span></strong></td>
            <td><button class="btn btn-primary btn-md waves-effect f-right d-inline-block md-trigger" data-toggle="modal" data-target="#default-Modal" id="open">payment</button></td>
        </tr>
    </tfoot>
</table>


{{-- Modal Add Data --}}
<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
                <h4 class="modal-title">Add Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="page-body">
                    {{ Form::open(array('route' => 'Duration.store', 'method' => 'POST', 'id' => 'addForm')) }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Name
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="customers_name" id="durations_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Detail Transaction
                                </label>
                                <div class="col-sm-12">
                                    @if(session('cart'))
                                    @foreach((array) session('cart') as $id => $details)
                                    <div class="col-3">{{$details['name']}}</div>
                                    <div class="col-3">{{ $details['quantity']}}</div>
                                    @endforeach
                                    @endif
                                    <p>Total Rp. {{ $total }}</p>
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