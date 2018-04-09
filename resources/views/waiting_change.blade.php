@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Vous avez demandé de changer d'adresse mail. Veuillez la confirmer depuis le mail qui vous été envoyé sur la nouvelle adresse.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
