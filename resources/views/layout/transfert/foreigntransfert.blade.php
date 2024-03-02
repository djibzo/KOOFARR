@extends('layout.app')
@section('content')
    <style>
        body {

            background-color: #4e73df;
        }

        .rows {

            height: 100vh;
        }


        .form-control {
            display: block;
            width: 100%;
            min-height: calc(1.5em + .75rem + 2px);
            padding: .575rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 52px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .card {

            padding: 20px;
            background-color: #eee;
            padding-bottom: 50px;
            padding-top: 50px;

        }


        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #4e73df;
            outline: 0;
            box-shadow: none;
        }


        .border-rad {

            border-top-right-radius: 28px;
            border-bottom-right-radius: 28px;

            color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .border-rad:hover {

            background-color: #4e73df;
            border-color: #4e73df;

        }
    </style>
    <div class="row d-flex justify-content-center align-items-center rows mb-15 p-1">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post">
                    <div class="text-center">
                        <span class="d-block mt-3">Transferer vers votre un autre compte </span>
                        <p>Veuillez saisir le montant a transferer</p>
                        <div class="mx-5">
                            <div class="input-group mb-3 mt-4">
                            <input type="text" name="ribNumber" class="form-control" placeholder="Entrer le RIB du bénéficiaire"
                            aria-label="" aria-describedby="button-addon2">
                            </div>
                            @if ($errors->has('ribNumber'))
                                <p class="text-danger">{{ $errors->first('ribNumber') }}</p>
                            @endif
                            <div class="input-group mb-3 mt-4">
                                @csrf
                               
                                <input type="number" name="ammount" class="form-control" placeholder="Entrer le montant"
                                    aria-label="" aria-describedby="button-addon2">
                                <button class="btn btn-success border-rad" type="submit"
                                    id="button-addon2">Transferer</button>
                            </div>
                            @if ($errors->has('ammount'))
                                <p class="text-danger">{{ $errors->first('ammount') }}</p>
                            @endif
                            @if (session('status'))
                                <p>{{ session('status') }}</p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
