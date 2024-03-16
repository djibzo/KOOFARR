@extends('layout.app')
@section('content')
    <div class="container-xl">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-guichetier-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un guichetier</h1>
                            </div>
                            <form class="user" method="post" action="{{route('createguichetier_traitment')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="lastnameUser"
                                            placeholder="Nom">
                                        @if ($errors->has('lastnameUser'))
                                            <p class="text-danger">{{ $errors->first('lastnameUser') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" placeholder="Prenom"
                                            name="firstnameUser">
                                        @if ($errors->has('firstnameUser'))
                                            <p class="text-danger">{{ $errors->first('firstnameUser') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            name="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Mot de passe">
                                        @if ($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Ajouter
                                </button>
                            </div>
                        </form>
                        @if (session('status'))
                            <div class="text-center">
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
