<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancies\IndexRequest;
use App\Http\Requests\Vacancies\StoreRequest;
use App\Http\Requests\Vacancies\UpdateRequest;
use App\Http\Resources\VacanciesResource;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $vacancies = VacanciesResource::collection(Vacancies::sortBy($validated))->response()->getData();

        if (request()->expectsJson()) {
            return $vacancies;
        }

        return view(
            'vacancies.index',
            ['vacancies' => $vacancies]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $id = Vacancies::create($validated)->id;

        if (request()->expectsJson()) {
            return response([
                'status' => 'ok',
                'data' => $id
            ]);
        }

        return redirect()->to('/vacancies')->with('message', 'Successfully stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancies $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancies $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {

        $vacancy = Vacancies::find($id);

        if (!$vacancy) {
            return response([
                'status' => 'error',
                'data' => 'no query results with id = ' . $id,
            ], 404);
        }

        $vacancy->update($request->validated());

        if (request()->expectsJson()) {
            return response(
                [
                    'status' => 'ok',
                    'data' => $vacancy->id
                ]
            );
        }

        return redirect()->back()->with('message', 'Successfully update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        dd($id);

        $vacancy = Vacancies::find($id);

        if (!$vacancy) {
            return response([
                'status' => 'error',
                'data' => 'no query results with id = ' . $id,
            ], 404);
        }

        $vacancy->delete();

        if (request()->expectsJson()) {
            return response(
                [
                    'status' => 'ok',
                    'data' => $vacancy->id
                ]
            );
        }

        return redirect()->route('vacancies.index')->with('message', 'Successfully deleted');
    }
}
