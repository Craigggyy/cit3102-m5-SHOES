<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    // GET /api/shoes
    public function index(Request $request)
    {
        $query = Shoe::query();

        $allowedFilters = [
            'brand',
            'model',
            'size',
            'color',
            'price',
            'stock',
        ];

        foreach ($allowedFilters as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->input($field));
            }
        }

        return response()->json($query->get(), 200);
    }

    // POST /api/shoes
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
            'color' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $shoe = Shoe::create($validated);

        return response()->json($shoe, 201);
    }

    // GET /api/shoes/{shoe}
    public function show(Shoe $shoe)
    {
        return response()->json($shoe, 200);
    }

    // PUT /api/shoes/{shoe}
    public function update(Request $request, Shoe $shoe)
    {
        $validated = $request->validate([
            'brand' => 'sometimes|required|string|max:255',
            'model' => 'sometimes|required|string|max:255',
            'size' => 'sometimes|required|integer|min:1',
            'color' => 'sometimes|required|string|max:100',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
        ]);

        $shoe->update($validated);

        return response()->json($shoe, 200);
    }

    // DELETE /api/shoes/{shoe}
    public function destroy(Shoe $shoe)
    {
        $shoe->delete();

        return response()->noContent();
    }
}
