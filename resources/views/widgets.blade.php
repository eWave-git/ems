@extends('layouts.app')
@section('content')
<article class="group flex rounded-md flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="grid grid-cols-6 gap-4   ">
        @foreach($widgets as $key_1 => $value_1)
            <div class="flex flex-col gap-4 p-6 text-neutral-900" style="border: 1px solid #18181b; color:{{$value_1['cssClass']}} ">
                <span class="text-sm font-medium"></span>
                <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription" style="color:{{$value_1['cssClass']}}">{{$value_1['widget_name']}}</h3>
                @foreach($value_1['datas'] as $key_2 => $value_2)
                <p id="featureDescription" class="text-pretty text-sm">
                    {{$value_2['name']}} : {{$value_2['data']}}
                </p>
                @endforeach
            </div>
        @endforeach
    </div>
</article>
@endsection
