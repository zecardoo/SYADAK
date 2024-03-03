@extends('layouts.admin')

@section('content')
    <section class="flex flex-col m-0 bg-slate-50 dark:bg-slate-800 p-8 container mx-auto">
        <div class="">

            {{-- card --}}
            <div class="">
                <dashborad-btn product-total='{{ $total }}' product-sold='{{ $sold }}' user-count='{{ $count }}'></dashborad-btn>

            </div>

        </div>

        {{-- Table --}}
      
    </section>
@endsection
