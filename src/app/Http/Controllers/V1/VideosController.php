<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Models\Repository\VideoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function getVideos(Request $request)
    {
        $videos = $this->videoRepository->getVideos();

        return new JsonResponse(['data' => $videos]);
    }
}
