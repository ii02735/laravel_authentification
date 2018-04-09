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
		    @if(Auth::user()->provider == "facebook")
                    	Vous êtes connecté depuis votre <strong>compte facebook</strong>.<br/>
			Si vous souhaitez modifier vos informations vous devrez le faire
			depuis vos configurations de votre compte du réseau social.
		    @else
			Vous êtes connecté
			<ul class="list-group">Que souhaitez-vous faire ?
            <div id="accordion" class="my-2">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Changer votre nom
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <form method="post" action="{{ route('chgName') }}">
                        @csrf
                      <div class="form-group">
                        <label for="nom">Votre nouveau nom : </label>
                        <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="nom">
                        @if ($errors->has('nom'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>     
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Changer votre prénom
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <form method="post" action="{{ route('chgFirstname') }}">
                        @csrf
                      <div class="form-group">
                        <label for="prenom">Votre nouveau prénom : </label>
                        <input type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" id="prenom">
                        @if ($errors->has('prenom'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('prenom') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form> 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Changer votre nouvelle adresse
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <form method="post" action="{{ route('chgAddr') }}">
                        @csrf
                      <div class="form-group">
                        <label for="address">Votre nouveau numéro de téléphone : </label>
                        <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form> 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Changer votre numéro de mobile
                    </button>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                  <div class="card-body">
                    <form method="post" action="{{ route('chgNumTel') }}">
                        @csrf
                      <div class="form-group">
                        <label for="phone_number">Votre nouveau numéro de téléphone : </label>
                        <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="phone_number">
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Changer votre email
                    </button>
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                  <div class="card-body">
                    <form method="post" action="{{ route('chgEmail') }}">
                        @csrf
                      <div class="form-group">
                        <label for="email">Votre nouvelle adresse mail : </label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingSix">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      Changer votre mot de passe
                    </button>
                  </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('chgPassword') }}">
                        @csrf

                      <div class="form-group">
                        <label for="password_old">Votre ancien mot de passe : </label>
                        <input type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}" name="password_old" id="password_old">
                        @if ($errors->has('password_old'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_old') }}</strong>
                        </span>
                        @endif
                      </div>
                        <div class="form-group">
                        <label for="email">Votre nouveau mot de passe : </label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        </div>
                        <div class="form-group">
                         <label for="password_confirmation">Confirmation : </label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
              </div>
            </div>
                @endif
		        </div>
            </div>
        </div>
    </div>
</div>
@endsection
