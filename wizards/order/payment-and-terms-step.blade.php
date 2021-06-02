@extends('layouts.admin')

@section('content')
    <div class="card full-height">
        <div class="card-body">
            @dump($wizard)
            @error('wizard')
            @dump($message)
            @enderror
            <ul id="progressbar">

                @foreach($wizard['steps'] as $step)
                    <li class="@if($step['active']) active @endif @if($step['isComplete']) wizard-success @endif"
                        id="{{$step['slug']}}"><strong>{{
                    $step['title']
                                    }}</strong></li>
                @endforeach
            </ul> <!-- fieldsets -->

            <form method="post" action="/{{ request()->path() }}">
                @csrf
                <div class="form-group @error('payment') has-error has-feedback @enderror">
                    <input type="text" class="form-control" id="payment" name="payment" />
                    @error('payment')
                    <small class="form-text"
                                                                                               id="paymenthelp">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <footer>
                    <button type="submit" class="btn btn-primary">Next</button>
                </footer>
            </form>
        </div>
    </div>
@endsection
