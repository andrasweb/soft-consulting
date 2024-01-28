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
                <a href="{{route('logs')}}">
                    logs
                </a>
            </button>

            @if($persons->isEmpty())
                nincs adat
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ADOAZONOSITOJEL</th>
                            <th>TELJESNEV</th>
                            <th>AZONOSITO</th>
                            <th>EGYEBID</th>
                            <th>BELEPES</th>
                            <th>KILEPES</th>
                            <th>EMAILCIM</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($persons as $person)
                            <tr>
                                <td>{{$person->adoazonositojel}}</td>
                                <td>{{$person->teljesnev}}</td>
                                <td>{{$person->azonosito}}</td>
                                <td>{{$person->egyebid}}</td>
                                <td>{{$person->belepes}}</td>
                                <td>{{$person->kilepes}}</td>
                                <td>{{$person->emailcim}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
