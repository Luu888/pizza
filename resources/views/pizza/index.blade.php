@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Pizza') }}
                    <a href="{{route('pizza.create')}}">
                        <button class="btn btn-success" style="float: right;">Add pizza</button>
                    </a>
                </div>
                
                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                    @endif
                    @if(count($pizzas)>0) 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Small Price</th>
                            <th scope="col">Medium Price</th>
                            <th scope="col">Large Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    
                    @foreach($pizzas as $key=> $pizza)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{Storage::url($pizza->image)}}" width="80"></td>
                        <td>{{$pizza->name}}</td>
                        <td>{{$pizza->description}}</td>
                        <td>{{$pizza->category}}</td>
                        <td>{{$pizza->small_pizza_price}}</td>
                        <td>{{$pizza->medium_pizza_price}}</td>
                        <td>{{$pizza->large_pizza_price}}</td>
                        <td><a href="{{route('pizza.edit', $pizza->id)}}"<button class="btn btn-primary">Edit</button></a></td>
                        <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pizza->id}}">Delete</button></td>

                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{route('pizza.destroy', $pizza->id)}}" method="post">@csrf
                                @method('DELETE')
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </div>
                            </div>
                            </form>
                            </div>
                    </tr>
                    @endforeach
                    @else 
                    <p>No pizzas</p>

                    @endif
                </table>
                {{ $pizzas->links() }}
                </div>
            </div>
        </div>

@endsection