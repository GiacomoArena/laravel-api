@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">New</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input id="title" class="form-control @error('title') is-invalid @enderror" name="title"
                    type="text" placeholder="title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id">
                    <option selected>Select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($technologies as $tech)
                <input type="checkbox" class="btn-check" id="{{$tech->id}}" autocomplete="off" name="technologies[]" value="{{$tech->id}}">
                <label class="btn btn-outline-primary" for="{{$tech->id}}">{{$tech->name}}</label>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                    placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input id="surname" class="form-control @error('surname') is-invalid @enderror" name="surname"
                    type="text" placeholder="Surname" value="{{ old('surname') }}">
                @error('surname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="form-control @error('gender') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Choose Img</label>
                <input id="image" class="form-control @error('image') is-invalid @enderror" name="image"
                    type="file" placeholder="Url Image" value="{{ old('image') }}">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-dark">Submit</button>

        </form>


    </div>
@endsection
