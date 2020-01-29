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
                    <div class="alert alert-{{session('type')}} text-center " role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table table-dark table-hover table-striped table-bordered">
                        <thead class=" text-warning text-uppercase text-center">
                            <tr>
                                <th>No</th>
                                <th>Added By</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php
                        $c=0;
                        @endphp
                        @foreach ($todos as $item)
                        @php
                        $c++;
                        @endphp
                        <tr>
                            <td>{{$c}} </td>
                            <td>{{$item->user->name}} </td>
                            <td>{{$item->name}} </td>
                            <td>{{$item->phone}} </td>
                            <td>{{$item->email}} </td>
                            <td>{{$item->address}} </td>
                            <td>{{$item->age}} </td>
                            <td> <img src="{{ asset($item->image) }}" class="img-fluid" alt="IMG"> </td>
                            <td>
                                <a href="{{route('todo.edit',$item->id)}} " class="btn btn-info"><i class="fa fa-edit"
                                        aria-hidden="true"></i></a>
                                <form action="{{route('todo.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
                <h5 class="modal-title" id="DataAddLabel">Add New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('todo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone"
                            class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" autocomplete="address">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                        <div class="col-md-6">
                            <input id="age" type="text" class="form-control @error('age') is-invalid @enderror"
                                name="age" value="{{ old('age') }}" autocomplete="age">

                            @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avater" class="col-md-4 col-form-label text-md-right">{{ __('Avater') }}</label>

                        <div class="col-md-6">
                            <input id="avater" type="file" class="form-control @error('avater') is-invalid @enderror"
                                name="avater" value="{{ old('avater') }}" autocomplete="avater">

                            @error('avater')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Store') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection