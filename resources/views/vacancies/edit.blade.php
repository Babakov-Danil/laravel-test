<div>
    @extends('.Layouts.MainLayout')

    @section('title')
        Edit vacancy {{ $vacancy->id }}
    @endsection

    @section('app')
        <form method="post" action="{{route('vacancies.update', $vacancy->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="idLabel" class="form-label">Vacancy id</label>
                <input name="id" type="text" class="form-control" id="idLabel" placeholder="{{$vacancy->id}}"
                    value="{{$vacancy->id}}" disabled>
            </div>

            <div class="mb-3">
                <label for="nameLabel" class="form-label">Vacancy name</label>
                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id="nameLabel" placeholder="{{$vacancy->name}}" value="{{$vacancy->name}}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descriptionLabel" class="form-label">Vacancy description</label>
                <input name="description" type="text"
                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="descriptionLabel"
                    placeholder="{{$vacancy->description}}" value="{{$vacancy->description}}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="requirementsLabel" class="form-label">Vacancy requirements</label>
                <input name="requirements" type="text"
                    class="form-control {{ $errors->has('requirements') ? 'is-invalid' : '' }}" id="requirementsLabel"
                    placeholder="{{$vacancy->requirements}}" value="{{$vacancy->requirements}}">
                @error('requirements')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="salaryLabel" class="form-label">Vacancy salary</label>
                <input name="salary" type="text" class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}"
                    id="salaryLabel" placeholder="{{$vacancy->salary}}" value="{{$vacancy->salary}}">
                @error('salary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="createdAtLabel" class="form-label">Vacancy created_at</label>
                <input name="created_at" type="text" class="form-control" id="createdAtLabel"
                    placeholder="{{$vacancy->created_at}}" disabled value="{{$vacancy->created_at}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection

</div>