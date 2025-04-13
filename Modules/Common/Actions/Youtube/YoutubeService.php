<?php

namespace Modules\Common\Actions\Youtube;

use Carbon\CarbonInterval;
use Exception;
use Illuminate\Support\Facades\Http;

trait YoutubeService
{
    /**
     * Get video details from YouTube video url
     *
     * @param  ?string $url
     * @return ?array
     */
    public function getVideoDetails(?string $url)
    {
        try {
            $response = Http::asJson()
                ->get(config('services.youtube.endpoint') . '/videos', [
                    'part' => 'contentDetails,player,snippet',
                    'id' => $this->searchYouTubeId($url),
                    'key' => config('services.youtube.secret'),
                ]);

            return $response->json();
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Get video duration from YouTube video API
     *
     * @param  ?array $value
     * @return ?array
     */
    public function getVideoDuration(?array $value)
    {
        try {
            if (!isset($value['items'][0]['contentDetails']['duration'])) {
                throw new Exception('Kami tidak dapat mendapatkan informasi video karena video tidak ditemukan dari YouTube API', 404);
            }

            $duration = CarbonInterval::make($value['items'][0]['contentDetails']['duration']);
            return [
                'h' => $duration->h,
                'i' => $duration->i,
                's' => $duration->s,
                'total_hours' => $duration->totalHours,
                'total_minutes' => $duration->totalMinutes,
                'total_seconds' => $duration->totalSeconds,
            ];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Get YouTube ID from url
     *
     * @param  string $url
     * @return string
     */
    public function searchYouTubeId($url)
    {
        if (stristr($url, 'youtu.be/')) {
            preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $match);
        } else {
            preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $match);
        }

        return end($match);
    }
}
