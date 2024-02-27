@extends('layouts.index')
@section('admin')
    <div class="col">
        <div class="d-flex justify-content-between align-center my-5">
            <div>
                <h2>I miei progetti</h2>
            </div>
            <div class="mx-3 align-self-center">
                <a href="{{ route('admin.projects.create') }}">
                    <button type="button" class="btn btn-sm btn-success">Add new project</button>
                </a>

            </div>

        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">description</th>
                    <th scope="col">slug</th>
                    <th scope="col">languages</th>
                    <th scope="col">relese_date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 30, '...') }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->languages }}</td>
                        <td>{{ $project->relese_date }}</td>
                        <td class=" width_ d-flex">
                            <span class="mx-1">
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-eye" style="color: #000000;"></i>
                                    </button>
                                </a>
                            </span>

                            <span class="mx-1">
                                <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">
                                    <button class="btn btn-warning">
                                        <i class="fa-solid fa-pen " style="color: #000000;"></i>
                                    </button>
                                </a>
                            </span>
                            <span class="mx-1">
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                    method="post"
                                    onsubmit="return confirm('sei sicuro di voler eliminare {{ $project->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                    </button>
                                </form>
                            </span>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
