@extends('layouts.app')
@section('content')
<div class="group flex rounded-md flex-col h-screen overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="grid grid-cols-6  m-auto  " style="text-align:-webkit-center">
        @foreach($widgets as $key_1 => $value_1)
            <div class="flex flex-col  text-neutral-900" style="border: 1px solid #18181b; color:{{$value_1['cssClass']}} ">
                <span class="text-sm font-medium"></span>
                <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription" style="color:{{$value_1['cssClass']}}">{{$value_1['widget_name']}}</h3>

                <div>
                @foreach($value_1['datas'] as $key_2 => $value_2)
                    <div style="width: 50%; float: left">
                        @if ($value_2['name'])
                        {{$value_2['name']}} : {{$value_2['data']}} {{$value_2['symbol']}}
                        @endif
                    </div>
                @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-full  m-auto text-center border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        <a href="{{url('/farms')}}">목록 보기</a>
    </div>
</div>

@endsection
