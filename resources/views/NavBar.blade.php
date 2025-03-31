<nav class="navbar navbar-expand-sm bg-body-tertiary" style="border-bottom: 1px solid gray;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto nav-underline">
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'vacancies.index' ? 'active' : '' }}"
                        aria-current="page" href="/vacancies">Vacancies List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'vacancies.create' ? 'active' : ''  }}"
                        href="/vacancies/create">Create Vacancy</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'l5-swagger.default.api' ? 'active' : ''  }}"
                        href="/api/documentation">
                        Api
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>