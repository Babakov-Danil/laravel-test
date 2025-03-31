<div>
    @extends('.Layouts.MainLayout')

    @php($fields = request()->get('fields') ?? [])
    @php($sortBy = request()->get('sort_by'))
    @php($sortType = request()->get('sort_type'))
    @php($queryString = $sortBy && $sortType ? ('&sort_by=' . $sortBy . '&sort_type=' . $sortType) : '')

    @section('title')
        Vacancies
    @endsection

    @section('app')

        <form method="get" action="">
            <div class="row g-3">
                <div class="col">
                    <select name="sort_by" class="form-select form-select-md mb-3" aria-label="Sort By">
                        <option {{ !$sortBy ? 'selected' : '' }} value="null">Сортировка</option>
                        <option {{ $sortBy == 'salary' ? 'selected' : '' }} value="salary">Зарплата</option>
                        <option {{ $sortBy == 'created_at' ? 'selected' : '' }} value="created_at">Дата создания
                        </option>
                    </select>
                </div>
                <div class="col">
                    <select name="sort_type" class="form-select form-select-md mb-3" aria-label="Sort By">
                        <option {{ !$sortType ? 'selected' : '' }} value="null">Тип сортировки</option>
                        <option {{ $sortType == 'asc' ? 'selected' : '' }} value="asc">Возрастание</option>
                        <option {{ $sortType == 'desc' ? 'selected' : '' }} value="desc">Убывание</option>
                    </select>
                </div>

                <div class="col">
                    <select name="fields[]" class="form-select" id="multiple-select-field"
                        data-placeholder="Choose anything" multiple>
                        <option {{ in_array('requirements', $fields) ? 'selected' : '' }} value="requirements">
                            requirements</option>
                        <option {{ in_array('created_at', $fields) ? 'selected' : '' }} value="created_at">
                            created_at
                        </option>
                        <option {{ in_array('updated_at', $fields) ? 'selected' : '' }} value="updated_at">
                            updated_at
                        </option>
                    </select>
                </div>

                <div class="col">
                    <button class="btn btn-primary"> Submit </button>
                </div>
            </div>



        </form>

        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover table-striped-columns">
                <thead>
                    <tr>
                        @foreach (get_object_vars($vacancies->data[0]) as $key => $value)
                            <th scope="col">{{$key}}</th>
                        @endforeach
                        <th scope="col" colspan="3">actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vacancies->data as $key => $vacancy)
                        <tr>
                            @foreach (get_object_vars($vacancy) as $key => $value)
                                <td scope="row">
                                    {{ $key == 'salary' ? number_format($vacancy->salary, 0, ',', ' ') . 'руб.' : $value }}
                                </td>
                            @endforeach

                            <td>
                                <a href="vacancies/{{ $vacancy->id }}" class="btn btn-primary btn-sm">Show</a>
                            </td>
                            <td>
                                <a href="vacancies/{{ $vacancy->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="vacancies/{{ $vacancy->id }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link {{ $vacancies->links->prev ? '' : 'disabled' }}"
                            href="{{ $vacancies->links->first . $queryString }}">
                            First
                        </a>
                    </li>

                    @foreach($vacancies->meta->links as $key => $value)
                        <li class="page-item {{ $value->active ? 'active' : '' }}">
                            <a class="page-link {{ $value->url ? '' : 'disabled' }}" href="{{ $value->url . $queryString }}">
                                {{ str_replace(["&laquo; Previous", "Next &raquo;"], ['<', '>'], $value->label) }}
                            </a>
                        </li>
                    @endforeach

                    <li class="page-item">
                        <a class="page-link {{ $vacancies->links->next ? '' : 'disabled' }}"
                            href="{{ $vacancies->links->last . $queryString }}">
                            Last
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @endsection
</div>