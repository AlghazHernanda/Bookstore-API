<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorResource;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        $faker = \Faker\Factory::create(1);

        $author = Author::create([
            'name' => $faker->name
        ]);

        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        // return response()->json([
        //     'data' => [
        //         'id' => $author->id,
        //         'type' => 'Authors',
        //         'attributes' => [
        //             'name' => $author->name,
        //             'created_at' => $author->created_at,
        //             'updated_at' => $author->updated_at,
        //         ]
        //     ]
        // ]);

        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        //autorrequest untuk validasi data

        $author->update([
            'name' => $request->input('name')
        ]);

        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response(null, 204);
    }
}
