@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>ToDo
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right " data-toggle="modal"
                            data-target="#DataAdd">
                            <i class="fa fa-plus fa-spin" aria-hidden="true"></i>
                        </button></h3>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-{{session('type')}} " role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table table-dark table-hover table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="DataAdd" tabindex="-1" role="dialog" aria-labelledby="DataAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DataAddLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection