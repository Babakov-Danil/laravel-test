<div>
    @extends('.Layouts.MainLayout')

    @section('title')
        Vacancy {{ $vacancy->id }}
    @endsection

    @section('app')
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">salary</th>
                        <th scope="col" colspan="2">actions</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <th scope="row">
                            {{ $vacancy->id }}
                        </th>
                        <td>{{ $vacancy->name }}</td>
                        <td>{{ $vacancy->description }}</td>
                        <td>{{ number_format($vacancy->salary, 0, ',', ' ') }} руб.</td>
                        <td>
                            <a href="{{ $vacancy->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ $vacancy->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
</div>