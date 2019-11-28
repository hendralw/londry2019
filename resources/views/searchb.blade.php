<div class="">
    @if(count($list_items))
    <div class="card-columns">
        @foreach($list_items as $list)
        <div class="col-lg-15">
            <div class="card">
                <div class="card-body">
                    <h5><label class="float-right badge badge-inverse-info">Rp {{ $list->list_items_price }}</label>
                    </h5>
                    <h5 class="text-truncate"><strong>{{ $list->list_items_name }}</strong></h5><br>
                    <div class="container">
                        <div class="row">
                            <h6 class="col-xm-5"><label class="float-left badge badge-inverse-danger">
                                    {{ $list->item_category->item_categories_name }}</label></h6>
                            <h6><label
                                    class="float-left badge badge-inverse-danger">{{ $list->duration->durations_name }}</label>
                            </h6>
                        </div>
                    </div>

                    <a href="javascript:void(0);" data-id="{{ $list->list_items_id }}"
                        class="btn-inverse btn-mini fa fa-plus f-right add-to-cart">
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                    </a>
                    <br>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-12">
        <p>Item not Found!</p>
    </div>

    @endif
</div>