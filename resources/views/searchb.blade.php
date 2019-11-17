<div class="">
    @if(count($list_items))
    <div class="card-columns">
        @foreach($list_items as $list)

        <div class="card">
            <div class="card-body">
                <span class="float-right font-weight-bold">{{ $list->list_items_price }}</span>
                <h6 class="text-truncate">{{ $list->list_items_name }}</h6>
                <p class="small">durasi waktu selama {{ $list->duration->durations_name }} dengan kategori {{ $list->item_category->item_categories_name }}</p>
                <p class="btn-holder"><a href="javascript:void(0);" data-id="{{ $list->list_items_id }}" class="btn btn-warning btn-block text-center add-to-cart" role="button">Add to cart</a>
                    <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                </p>
            </div>
        </div>


        @endforeach
    </div>
    @else
    <div class="col-12">
        <p>not found</p>
    </div>

    @endif
</div>