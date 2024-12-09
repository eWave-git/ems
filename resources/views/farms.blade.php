@extends('layouts.app')
@section('content')


<div class="overflow-hidden flex h-screen w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
    <div style="text-align:-webkit-center" class="m-auto">


        <table class=" text-left text-neutral-600 ">
            <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">농장명</th>
                    <th scope="col" class="p-4">디바이스 갯수</th>
                    <th scope="col" class="p-4">정상 수신</th>
                    <th scope="col" class="p-4">비정상 수신</th>
                    <th scope="col" class="p-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
            @foreach($farms as $key => $value)
                    <tr>
                        <td class="p-4">{{$value['farm_name']}}</td>
                        <td class="p-4">{{$value['device_count']}}</td>
                        <td class="p-4">{{$value['normal']}}</td>
                        <td class="p-4">{{$value['abnormal']}}</td>
                        <td class="p-4"><a href="/widgets/{{$value['farm_idx']}}">자세히 보기</a></td>
                    </tr>
            @endforeach

            </tbody>
        </table>
        <div class="flex pt-20">
        <div style="width: 50%"><a href="{{url('/widgets/brokendevice')}}">고장 기기</a></div>
        <div style="width: 50%"><a href="{{url('/widgets')}}">전체 기기</a></div>
        </div>
    </div>
</div>



@endsection
