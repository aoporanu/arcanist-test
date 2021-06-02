@extends('layouts.admin')
@section('sidebar')
    @include('partials.admin.sidebar')
@endsection
@section('content')
    <div class="card full-height">
        <div class="card-body">
            <ul id="progressbar">

            @foreach($wizard['steps'] as $step)
                                    <li class="@if($step['active']) active @endif @if($step['isComplete'] === true)
                                        wizard-success @endif"
                                    id="{{$step['slug']}}"><strong>{{ $step['title']
                                    }}</strong></li>
            @endforeach
            </ul> <!-- fieldsets -->

            <form method="post" action="/{{ request()->path() }}">
                @csrf
                <div class="form-group @error('client_id') has-error has-feedback @enderror">
                    <select name="client_id" id="client_id" class="form-control">
                        <option value="">{{ __('orders.forms.create.pick-client') }}</option>
{{--                        @foreach($data ?? ''['clients'] as $client)--}}
{{--                            <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>--}}
{{--                        @endforeach--}}
                    </select>

                    @error('client_id')
                    <small
                        id="clienthelp" class="form-text">{{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="form-group @error('shop_id') has-error has-feedback @enderror">
                    <select name="shop_id" id="shop_id" class="form-control">
                        <option value="">{{ __('orders.forms.create.pick-shop') }}</option>
                    </select>
                    @error('shop_id')
                    <small
                        id="shophelp" class="form-text">{{ $message }}
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


