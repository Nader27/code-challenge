@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Service</h1>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
