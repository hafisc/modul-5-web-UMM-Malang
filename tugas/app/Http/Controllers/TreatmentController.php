<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index(Request $req)
    {
        $q = Treatment::query();

        // Search in name and description
        if ($s = $req->query('search')) {
            $q->where(fn($qq) => $qq->where('name', 'like', "%$s%")->orWhere('description', 'like', "%$s%"));
        }

        // Filter by category
        if ($category = $req->query('category')) {
            $q->where('category', $category);
        }

        // Filter by status
        if ($status = $req->query('status')) {
            $q->where('status', $status);
        }

        // Filter by price range
        if ($minPrice = $req->query('min_price')) {
            $q->where('price', '>=', $minPrice);
        }
        if ($maxPrice = $req->query('max_price')) {
            $q->where('price', '<=', $maxPrice);
        }

        // Sorting
        $orderBy = $req->query('orderBy', 'created_at');
        $sortBy = $req->query('sortBy', 'desc');
        $q->orderBy($orderBy, $sortBy);

        // Pagination
        $limit = $req->integer('limit', 10);
        $treatments = $q->paginate($limit);

        return response()->json($treatments);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'category' => 'required|in:facial,body_treatment,hair_care,nail_care,makeup',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'popularity' => 'nullable|integer|min:1|max:5',
        ]);

        $treatment = Treatment::create($data);
        return response()->json($treatment, 201);
    }

    public function show(Treatment $treatment)
    {
        return response()->json($treatment);
    }

    public function update(Request $request, Treatment $treatment)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:150',
            'description' => 'sometimes|nullable|string',
            'category' => 'sometimes|required|in:facial,body_treatment,hair_care,nail_care,makeup',
            'price' => 'sometimes|required|numeric|min:0',
            'duration' => 'sometimes|required|integer|min:1',
            'status' => 'sometimes|required|in:active,inactive',
            'popularity' => 'sometimes|nullable|integer|min:1|max:5',
        ]);

        $treatment->update($data);
        return response()->json($treatment);
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();

        return response()->json([
            'message' => 'Treatment berhasil dihapus',
            'id' => $treatment->id
        ], 200);
    }
}
