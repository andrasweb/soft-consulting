@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            XML feltöltés

            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="xml" class="col-md-4 col-form-label text-md-right">XML fájl*</label>

                                <div class="col-md-6">
                                    <input id="xml" type="file" class="form-control{{ $errors->has('xml') ? ' is-invalid' : '' }}" name="xml">
                                    @if ($errors->has('xml'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('xml') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            feltöltés
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if(session()->has('results'))
                            <h1>feltöltés eredménye:</h1>

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
                                        <th>STATUSZ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach(session()->get('results') as $result)
                                        <tr>
                                            <td>{{$result['ADOAZONOSITOJEL']}}</td>
                                            <td>{{$result['TELJESNEV']}}</td>
                                            <td>{{$result['AZONOSITO']}}</td>
                                            <td>{{$result['EGYEBID']}}</td>
                                            <td>{{$result['BELEPES']}}</td>
                                            <td>{{$result['KILEPES']}}</td>
                                            <td>{{$result['EMAILCIM']}}</td>
                                            <td>{{$result['STATUSZ']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
