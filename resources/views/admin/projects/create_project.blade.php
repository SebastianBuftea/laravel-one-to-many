@extends('layouts.app')

@section('content')
    <div class="container bg-dark p-3 my-3 border border-2 border-success-subtle rounded">
        <div class="row">

            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="title" class="text-white"><strong>Titolo</strong></label>
                        <input type="text" name="title" id="title" placeholder="titolo"
                            class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>

                    </div>
                    <div class="form-group my-2">
                        <label for="description" class="text-white"><strong>Descrizione del progetto</strong></label>
                        <textarea name="description" id="description" cols="50" rows="10" placeholder="Description"
                            class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>

                    </div>
                    <div class="form-group my-2">
                        <label for="relese_date" class="text-white"><strong>Data di consegna</strong></label>
                        <input type="date" name="relese_date" id="relese_date" placeholder="data di consegna"
                            class="form-control @error('relese_date') is-invalid @enderror"
                            value="{{ old('relese_date') }}">

                    </div>
                    <div class="form-group my-2">
                        <label for="languages" class="text-white"><strong>Linguaggi di programmazione</strong></label>
                        <input type="text" name="languages" id="languages" placeholder="languages" required
                            class="form-control @error('languages') is-invalid @enderror" value="{{ old('languages') }}">

                    </div>
                    <div class="form-group my-2">
                        <label for="mockup_image" class="text-white"><strong>inserire il mockup del
                                progetto</strong></label>
                        <input type="file" name="mockup_image" id="mockup_image" class="form-control ">

                    </div>
                    <div class="form-group mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
