<?php

namespace App\Console\Commands;

use App\Actions\Episode\CreateEpisodeAction;
use App\Actions\Podcast\CreatePodcastAction;
use App\Models\ContentUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Vedmant\FeedReader\Facades\FeedReader;

class GetPodcastData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:podcast-data {--url=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Accepts RSS feed url and extracts the feed and then stored in db tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
        $urlString = $this->option('url');

        if (!$urlString) {
            $contentData = ContentUrl::where('status',false)->get();
            if (!$contentData) {
                $this->info('No url to process');
                $this->info('Aborting...');
                return false;
            }
            foreach ($contentData as $data) {
                if ($data->url) {
                    $url = $data->url;
                    $isProcessed = $this->getData($url);

                    if ($isProcessed) {
                        $data->status = true;
                        $data->save();
                        $this->info($url. ' =====> processed successfully');
                    } else {
                        $this->info('unable to process url =====> '.$url);
                    }
                }
            }
        }

        if ($urlString) {
            $isProcessed = $this->getData($urlString);
            $isProcessed ?
                $this->info($urlString. ' =====> processed successfully') :
                $this->info('unable to process url =====> '.$urlString);
        }
        return false;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function getData(string $url): bool
    {
        $podcast = $episodes = null;

        try {
            /** @var \SimplePie $f */
            $f = FeedReader::read($url);
            $website = parse_url($f->get_permalink());
            $result = [
                'title' => $f->get_title(),
                'description' => $f->get_description(),
                'website_url' => $website['host'] ?? $f->get_permalink(),
                'rss_feed_url' => $f->get_link(),
                'copyright' => $f->get_copyright(),
                'language' => $f->get_language(),
                'artwork_url' => $f->get_image_url(),
                'author' => $f->get_author()
            ];

            $podcast = app()->make(CreatePodcastAction::class)
                            ->handle($result);

            foreach ($f->get_items(0, $f->get_item_quantity()) as $episodeItem) {
                $episode['title'] = $episodeItem->get_title();
                $episode['description'] = $episodeItem->get_description();
                $episode['id'] = $episodeItem->get_id();
                $episode['permalink'] = $episodeItem->get_permalink();
                $episode['episode_url'] = $episodeItem->get_link();
                $episode['audio_url'] = $episodeItem->get_enclosure()->get_link();
                $episode['podcast_id'] = $podcast->id;

                $episodes = app()->make(CreateEpisodeAction::class)
                                 ->handle($episode);
            }
        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }
        return $podcast && $episodes;
    }
}
