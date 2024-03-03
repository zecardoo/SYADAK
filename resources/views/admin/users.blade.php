@extends('layouts.admin')

@section('content')
    <section class="flex flex-col m-0 bg-slate-50 dark:bg-slate-800 p-8 container mx-auto">

        <users-btn :user-data='{{ json_encode($user) }}' :order-data='{{ json_encode($order) }}'
            :category-data='{{ json_encode($category) }}' :product-data='{{ json_encode($product) }}'></users-btn>
        {{-- <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

           @foreach ($user as $item) 
             <tbody>
                 <tr>
                     <td>{{ $item->id }}</td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->role }}</td>
                     <td>Delete</td>
                 </tr>
             </tbody>
           @endforeach


        </table> --}}


    </section>
@endsection
