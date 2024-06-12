<?php

namespace App\Helpers;

use App\Settings\DetailsSetting;

class Instagram
{
    public static function getLatestFeeds($count = 6, $output = '<span class="instagram-image"><a href="{link}" target="_blank"><img src="{image}"/></a></span>')
    {
        try {
            $AccessToken = (new DetailsSetting())->instagram_access_token;
            $instagramUserId = (new DetailsSetting())->instagram_user_id;
            if ($AccessToken == null or $instagramUserId == null) {
                return [];
            }
            return Cache()->remember('instagram-feeds-' . $count, (new DetailsSetting())->instagram_cache_time ?? 1 , function () use ($count, $output , $AccessToken , $instagramUserId) {
                $counter = 0;
                $result = self::getMedia();
                $return = [];
                foreach ($result->data as $media_id) {
                    $id = $media_id->id;
                    $counter++;
                    if ($counter <= $count && $id) {
                        $url = 'https://graph.instagram.com/'.$id.'?fields=media_type,thumbnail_url,media_url,permalink&amp&access_token='.$AccessToken;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                        curl_setopt($ch, CURLOPT_USERAGENT, 'Instagram Gallery');
                        $result_image = curl_exec($ch);
                        curl_close($ch);
                        $result_image = json_decode($result_image);
                        if( $result_image->media_type != "VIDEO") {
                            $result_image->html = str_replace(['{link}', '{image}'], [$result_image->permalink, ($result_image->thumbnail_url ?? $result_image->media_url)], $output);
                            $result_image->image = $result_image->thumbnail_url ?? $result_image->media_url;
                            $return[] = $result_image;
                        }
                    }
                }
                return $return;
            });
        } catch (\Exception $exception) {
            \Log::error($exception);
            return [];
        }
    }

    private static function getMedia()
    {
        try {
            $AccessToken = (new DetailsSetting())->instagram_access_token;
            $instagramUserId = (new DetailsSetting())->instagram_user_id;
            if ($AccessToken == null or $instagramUserId == null) {
                return [];
            }
            $url = "https://graph.instagram.com/{$instagramUserId}/media?access_token={$AccessToken}";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Instagram Gallery');
            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return collect( [
                'data' => [],
            ]);
        }
    }
}
