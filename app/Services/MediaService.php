<?php

namespace App\Services;

use App\Models\Media;

class MediaService
{
    public function getAllMedia()
    {
        return Media::all();
    }

    public function getMediaById($id)
    {
        return Media::findOrFail($id);
    }

    public function createMedia($data)
    {
        return Media::create($data);
    }

    public function deleteMedia($id)
    {
        return Media::destroy($id);
    }
}
