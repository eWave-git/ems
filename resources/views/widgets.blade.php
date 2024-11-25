<style>
    table tr td {
        border: 1px solid slategrey
    }
</style>


<table>
    <tr>
        @foreach($widgets as $key_1 => $value_1)
        <td>
            {{$value_1['widget_name']}}
            <table>
                <tr>
                    @foreach($value_1['datas'] as $key_2 => $value_2)
                    <td>
                        {{$value_2['name']}} : {{$value_2['data']}}
                    </td>
                            @if (($key_2+1) % 2 == 0)
                    </tr><tr>
                            @endif
                    @endforeach
                </tr>
            </table>
        </td>
            @if (($key_1+1) % 6 == 0)
    </tr><tr>
            @endif
        @endforeach
    </tr>
</table>
