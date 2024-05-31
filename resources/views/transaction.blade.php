@extends("layouts.app")

@section("title")
  @if(session()->get('role_id') == 1)
    Transactions - mottor
  @else
    My Transactions - mottor
  @endif
@endsection

@section("content")
  @include("partials.transactions")
@endsection