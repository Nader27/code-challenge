@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $customer->name }}</h5>
                <p class="card-text">{{ $customer->email }}</p>
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
