@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>ToDo with <span class="text-info text-bold ">Vue.js</span>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right " data-toggle="modal"
                            data-target="#DataAdd">
                            <i class="fa fa-plus fa-spin" aria-hidden="true"></i>
                        </button></h3>
                </div>
                <vue-table/>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="DataAdd" tabindex="-1" role="dialog" aria-labelledby="DataAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DataAddLabel">Add New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <vue-form/>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
