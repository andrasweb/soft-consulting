@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <button>
                <a href="/">
                    főoldal
                </a>
            </button>

            <button>
                <a href="{{route('persons')}}">
                    persons
                </a>
            </button>

            @if($logs->isEmpty())
                nincs adat
            @else
                <table>
                    <thead>
                        <tr>
                            <th>AZONOSITO</th>
                            <th>STATUSZ</th>
                            <th>DATUM</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{$log->azonosito}}</td>
                                <td>{{$log->statusz}}</td>
                                <td>{{date('Y-m-d H:i', strtotime($log->created_at))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
