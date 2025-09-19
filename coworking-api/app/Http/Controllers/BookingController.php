<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Booking::get();

        return $this->success($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request) {
        $data = $request->validated();
        // TODO: validar no-solapamiento aquí o con Rule custom
        $booking = Booking::create($data);
        return response()->json($booking, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse // Post $post
    {
        //$result = Post::findOrFail($id);
        $result = Booking::find($id);
        if ($result) {
            return $this->success($result);
        } else {
            return $this->error("Todo mal, como NO dijo el Pibe", 404, ['id' => 'No se encontro el recurso con el id']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
