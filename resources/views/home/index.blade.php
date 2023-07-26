@extends('base')

@section('content')

    <livewire:filter />

    {{--    @include('partials.monthly-calendar')--}}
    {{--    @include('partials.activities')--}}

    <div class="fixed right-6 bottom-6">
        <a href="{{ route('activities-create') }}">
            <svg aria-hidden="true" class="w-8 h-8 rounded-full bg-myPink-600 text-white shadow-xl hover:rotate-45 transition-transform" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </a>
    </div>

@endsection
