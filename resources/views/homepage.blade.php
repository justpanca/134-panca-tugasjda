@extends("layouts.app")

@section("title")
    mentor
@endsection

@section("content")
    <x-hero>
        <div class="relative flex flex-col items-center justify-center w-full h-full gap-2 text-white text-center">
            <p class="text-2xl">Mottor is the best digital website you can trust</p>
        
        </div>
    </x-hero>
    @include("partials.car")
@endsection