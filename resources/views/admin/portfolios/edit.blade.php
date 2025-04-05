@extends('admin.layouts.app')

@section('title', 'Edit Portfolio')

@section('content')
    <h1 class="mb-4">Edit Portfolio</h1>
    <div class="card p-4">
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Heading" class="form-label">Heading</label>
                <input type="text" name="Heading" id="Heading" class="form-control @error('Heading') is-invalid @enderror" value="{{ old('Heading', $portfolio->Heading) }}">
                @error('Heading')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="SubHeading" class="form-label">Sub Heading</label>
                <input type="text" name="SubHeading" id="SubHeading" class="form-control" value="{{ old('SubHeading', $portfolio->SubHeading) }}">
            </div>
            <div class="mb-3">
                <label for="About" class="form-label">About</label>
                <textarea name="About" id="About" class="form-control">{{ old('About', $portfolio->About) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="Link" class="form-label">Link</label>
                <input type="url" name="Link" id="Link" class="form-control @error('Link') is-invalid @enderror" value="{{ old('Link', $portfolio->Link) }}">
                @error('Link')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ServiceID" class="form-label">Service</label>
                <select name="ServiceID" id="ServiceID" class="form-control @error('ServiceID') is-invalid @enderror">
                    <option value="">Select a service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ old('ServiceID', $portfolio->ServiceID) == $service->id ? 'selected' : '' }}>{{ $service->Name }}</option>
                    @endforeach
                </select>
                @error('ServiceID')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Current Media</label>
                <div class="row">
                    @forelse($portfolio->projectMedia as $media)
                        <div class="col-md-3 mb-3">
                            @if($media->media_type == 'image')
                                <img src="{{ Storage::url($media->media_path) }}" alt="Media" class="img-fluid">
                            @else
                                <video controls class="img-fluid">
                                    <source src="{{ Storage::url($media->media_path) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                    @empty
                        <p>No media available.</p>
                    @endforelse
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Add New Media (Images or Videos)</label>
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
            <button type="submit" class="btn btn-update">Update Portfolio</button>
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
