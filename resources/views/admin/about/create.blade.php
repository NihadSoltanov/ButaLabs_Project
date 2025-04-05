@extends('admin.layouts.app')

@section('title', 'Create About')

@section('content')
    <h1 class="mb-4">Create About</h1>
    <div class="card p-4">
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" name="Title" id="Title" class="form-control @error('Title') is-invalid @enderror" value="{{ old('Title') }}">
                @error('Title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="SubTitle" class="form-label">SubTitle</label>
                <input type="text" name="SubTitle" id="SubTitle" class="form-control @error('SubTitle') is-invalid @enderror" value="{{ old('SubTitle') }}">
                @error('SubTitle')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Text" class="form-label">Text</label>
                <textarea name="Text" id="Text" class="form-control @error('Text') is-invalid @enderror">{{ old('Text') }}</textarea>
                @error('Text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Add Media (Images or Videos)</label>
                <div id="media-inputs">
                    <div class="media-input d-flex align-items-center mb-2">
                        <input type="file" name="media[]" class="form-control @error('media.*') is-invalid @enderror" accept="image/jpeg,image/png,video/mp4">
                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-media">x</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm mt-2" id="add-media">+ Add More Media</button>
                @error('media.*')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-create">Add About</button>
        </form>
    </div>

    @push('scripts')
        <script>
            document.getElementById('add-media').addEventListener('click', function () {
                const mediaInputs = document.getElementById('media-inputs');
                const newInput = document.createElement('div');
                newInput.classList.add('media-input', 'd-flex', 'align-items-center', 'mb-2');
                newInput.innerHTML = `
                    <input type="file" name="media[]" class="form-control" accept="image/jpeg,image/png,video/mp4">
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-media">x</button>
                `;
                mediaInputs.appendChild(newInput);
            });

            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-media')) {
                    e.target.parentElement.remove();
                }
            });
        </script>
    @endpush
@endsection
