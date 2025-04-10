<?php

namespace App\Http\Controllers;

use App\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function index()
    {
        return response()->json($this->mediaService->getAllMedia());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'case_id' => 'required|exists:test_cases,id',
            'media_type' => 'required|in:image,video',
            'media_post' => 'required|in:case,comment',
            'media_link' => 'required|string|max:500'
        ]);

        return response()->json($this->mediaService->createMedia($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->mediaService->getMediaById($id));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->mediaService->deleteMedia($id)]);
    }
}
