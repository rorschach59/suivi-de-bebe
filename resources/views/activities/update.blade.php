@extends('base')

@section('content')

    <h2 class="text-center font-bold text-xl">Modifier l'activité</h2>

    <form action="" method="POST" class="mt-12">
        @csrf

        <div class="input-group">
            <label for="name" class="label">Activité</label>
            <input type="text" name="name" list="names" class="input" required value="{{ $activity->name }}">
            <datalist id="names">
                @foreach($activitiesNames as $activitiesName)
                    <option value="{{ $activitiesName->name }}">
                @endforeach
            </datalist>
            @error('name')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group">
            <label for="notes" class="label">Note</label>
            <textarea name="notes" id="notes" rows="10"
                      class="input"
            >{{ $activity->notes }}</textarea>
            @error('notes')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group">
            <label for="date" class="label">Quand ?</label>
            <input type="datetime-local" name="date" id="date"
                   class="input" required
                   value="{{ $activity->date }}"
            >
        </div>

        <div class="flex justify-around">
            <button type="submit" class="primary-button">Editer</button>
            <a href="{{ route('home.index') }}" class="secondary-button">Annuler</a>
            <a href="{{ route('activities.delete', ['activity' => $activity->id]) }}"
               class="delete-button">Supprimer</a>
        </div>
    </form>

@endsection
