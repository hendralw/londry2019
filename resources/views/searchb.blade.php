<div class="row">
    @if(count($transactions))
    @foreach($transactions as $transaction)

    <div class="col-sm-6" id="card">
        <div class="mb-3 text-dark card-border card text-white bg-light">
            <div class="card-header">{{ $transaction->customers_name }}</div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-3">alamat</div>
                    <div class="col-3">{{ $transaction->customers_name }}</div>
                </div>
                <div class="row">
                    <input type="text" id="nilai[]">
                </div>
            </div>
            <div class="card-footer">{{ $transaction->created_at}}</div>
        </div>
    </div>

    @endforeach
    @else
    <p>data is empty</p>
    @endif
</div>