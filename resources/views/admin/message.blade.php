@extends('layouts.admin')

@section('content')
    <section class="flex flex-col m-0 bg-slate-50 dark:bg-slate-800 p-8 container mx-auto">
        <table class="table">
            <thead class="">
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message </th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody class="">

                @foreach ($message as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->number }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td class="break-words">{{ $message->message }}</td>
                        <td>
                            <div>
                                <button class="text-3xl text-red-400"><i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
