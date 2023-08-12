@extends('base')

@section('content')

    <h2 class="text-center font-bold text-xl">Connexion</h2>

    <form action="" method="POST" class="mt-12">
        @csrf
        <div class="input-group">
            <label for="name" class="label">Pseudo</label>
            <input type="text" id="name" name="name"
                   class="input" required value="{{ old('name') }}"
            >
            @error('name')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group">
            <label for="password" class="label">Mot de passe</label>
            <input type="password" id="password" name="password"
                   class="input" required value="{{ old('password') }}"
            >
            @error('password')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-around">
            <button type="submit" class="primary-button">Connexion</button>
        </div>
    </form>

@endsection
