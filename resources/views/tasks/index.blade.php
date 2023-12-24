@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 p-4">
                @livewire('addtask')
        </div>

        <div class="col-md-8 p-4">
            @livewire('listtask')

        </div>

    </div>
</div>
@endsection
