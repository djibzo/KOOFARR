@extends('layout.app')
@section('content')
    <div class="container-xl m-3 ml-3">
        <table class="table  m-4">
          <center><h3>Liste des guichetiers</h3></center>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @forelse ($guichietiers as $user)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $user->firstnameUser }}</td>
                        <td>{{ $user->lastnameUser }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status == 1)
                                <a class="btn btn-danger btn-lg" href="{{ route('disableg', $user) }}"
                                    role="button">Desactiver le compte</a>
                            @endif
                            @if ($user->status == 0)
                                <a class="btn btn-success btn-lg" href="{{ route('enableg', $user) }}" role="button">Activer
                                    le compte</a>
                            @endif
                        </td>
                    </tr>
                    @php
                        $num++;
                    @endphp
                @empty
                @endforelse
            </tbody>
        </table>
        @if (session('status'))
            <h4>{{ session('status') }}</h2>
        @endif
    </div>
@endsection
