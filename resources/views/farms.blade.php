<style>
    table tr td {
        border: 1px solid slategrey
    }
</style>


<table>
    @foreach($farms as $key => $value)
        <tr>
            <td rowspan="2">{{$value['farm_name']}}</td>
            <td rowspan="2">
                디바이스 {{$value['device_count']}} 개
            </td>
            <td>정상 수신 {{$value['normal']}} 개</td>
            <td rowspan="2"><a href="/widgets/{{$value['farm_idx']}}">자세히 보기</a></td>
        </tr>
        <tr>
            <td>비정상 수신 {{$value['abnormal']}} 개</td>
        </tr>
    @endforeach
</table>
