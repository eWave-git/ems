@extends('layouts.app')
@section('content')

{{--<style>--}}
{{--    table tr td {--}}
{{--        border: 1px solid slategrey--}}
{{--    }--}}
{{--</style>--}}


{{--<table>--}}
{{--    @foreach($farms as $key => $value)--}}
{{--        <tr>--}}
{{--            <td rowspan="2">{{$value['farm_name']}}</td>--}}
{{--            <td rowspan="2">--}}
{{--                디바이스 {{$value['device_count']}} 개--}}
{{--            </td>--}}
{{--            <td>정상 수신 {{$value['normal']}} 개</td>--}}
{{--            <td rowspan="2"><a href="/widgets/{{$value['farm_idx']}}">자세히 보기</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>비정상 수신 {{$value['abnormal']}} 개</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}

<div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
    <table class="w-full text-left text-sm text-neutral-600 ">
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
</div>



@endsection
