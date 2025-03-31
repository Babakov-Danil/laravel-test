<div>
    @extends('.Layouts.MainLayout')

    @section('title')
        Create vacancy
    @endsection

    @section('app')
        <form method="post" action="{{ route('vacancies.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nameLabel" class="form-label">Vacancy name</label>
                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id="nameLabel" placeholder="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descriptionLabel" class="form-label">Vacancy description</label>
                <input name="description" type="text"
                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="descriptionLabel"
                    placeholder="description" value="{{ old('description') }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="requirementsLabel" class="form-label">Vacancy requirements</label>
                <input name="requirements" type="text"
                    class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" id="requirementsLabel"
                    value="{{ old('requirements') }}" placeholder=" requirements">
                @error('requirements')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="salaryLabel" class="form-label">Vacancy salary</label>
                <input name="salary" type="number" min="0"
                    class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" id="salaryLabel"
                    placeholder="salary" value="{{ old('salary') }}">
                @error('salary')
                    <div class=" text-danger">{{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                Create
            </button>
        </form>
    @endsection
</div>