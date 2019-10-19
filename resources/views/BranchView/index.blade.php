@extends('templates.default')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Test
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



@foreach ($branches as $branch)
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3 text-dark card-border card text-white bg-light">
                <div class="card-header">{{ $branch->branches_name }}</div>
                <div class="card-body"> {{ $branch->branches_address}} </div>
                <div class="card-footer">Footer</div>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection
