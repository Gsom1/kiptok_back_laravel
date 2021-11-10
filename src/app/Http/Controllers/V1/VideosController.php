<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Models\Repository\FeedTokenRepository;
use App\UseCases\Feeder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class VideosController extends Controller
{
    public function __construct(
        private Feeder $feeder,
        private FeedTokenRepository $feedTokenRepository
    ) {
    }

    public function getVideos(Request $request)
    {
        $feedToken = $request->cookie(Params::FEED_TOKEN);
        if ($feedToken) {
            $feedToken = $this->feedTokenRepository->findById($feedToken);
        }
        if (!$feedToken) {
            $feedToken = $this->feedTokenRepository->create();
        }

        $result = $this->feeder->getPortion($feedToken);
        $response = new JsonResponse(['data' => $result]);
        $response->cookie(new Cookie(name: Params::FEED_TOKEN, value: (string)$feedToken->id));

        return $response;
    }
}
