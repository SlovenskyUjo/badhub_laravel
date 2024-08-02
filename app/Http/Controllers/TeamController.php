<?php

namespace App\Http\Controllers;

use App\Models\AuthMe;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index()
    {
        $owners = Player::where('primary_group', 'Owner')->get();
        $developers = Player::where('primary_group', 'Developer')->get();
        $helpers = Player::where('primary_group', 'Helper')->get();
        $builders = Player::where('primary_group', 'Builder')->get();
        $youtubers = Player::where('primary_group', 'Youtuber')->get();


        $ownersWithDetails = $this->addRealNames($owners)->map(function ($owner) {
            return [
                'username' => $owner->username,
                'primary_group' => $owner->primary_group,
                'uuid' => $owner->uuid,
                'skinUrl' => $this->getSkinUrl($owner->uuid),
                'realname' => $owner->realname,
                'isLogged' => $owner->isLogged,
            ];
        });

        $developersWithDetails = $this->addRealNames($developers)->map(function ($developer) {
            return [
                'username' => $developer->username,
                'primary_group' => $developer->primary_group,
                'uuid' => $developer->uuid,
                'skinUrl' => $this->getSkinUrl($developer->uuid),
                'realname' => $developer->realname,
                'isLogged' => $developer->isLogged,
            ];
        });

        $helpersWithDetails = $this->addRealNames($helpers)->map(function ($helper) {
            return [
                'username' => $helper->username,
                'primary_group' => $helper->primary_group,
                'uuid' => $helper->uuid,
                'skinUrl' => $this->getSkinUrl($helper->uuid),
                'realname' => $helper->realname,
                'isLogged' => $helper->isLogged,
            ];
        });

        $buildersWithDetails = $this->addRealNames($builders)->map(function ($builder) {
            return [
                'username' => $builder->username,
                'primary_group' => $builder->primary_group,
                'uuid' => $builder->uuid,
                'skinUrl' => $this->getSkinUrl($builder->uuid),
                'realname' => $builder->realname,
                'isLogged' => $builder->isLogged,
            ];
        });

        $youtubersWithDetails = $this->addRealNames($youtubers)->map(function ($youtuber) {
            return [
                'username' => $youtuber->username,
                'primary_group' => $youtuber->primary_group,
                'uuid' => $youtuber->uuid,
                'skinUrl' => $this->getSkinUrl($youtuber->uuid),
                'realname' => $youtuber->realname,
                'isLogged' => $youtuber->isLogged,
            ];
        });


        return Inertia::render('Team/Team', [
            'owners' => $ownersWithDetails,
            'developers' => $developersWithDetails,
            'helpers' => $helpersWithDetails,
            'builders' => $buildersWithDetails,
            'youtubers' => $youtubersWithDetails
        ]);
    }

    private function addRealNames($players)
    {
        return $players->map(function ($player) {
            // Získať `realname` z tabuľky `AuthMe` na základe `username`
            $authMe = AuthMe::where('username', $player->username)->first();
            $player->realname = $authMe ? $authMe->realname : 'Unknown';
            $player->isLogged = $authMe ? $authMe->isLogged : 0;
            return $player;
        });
    }

    private function getSkinUrl($uuid)
    {
        $url = "https://visage.surgeplay.com/bust/256/{$uuid}";
        if ($this->urlExists($url)) {
            return $url;
        } else {
            return "https://visage.surgeplay.com/bust/256/X-Steve";
        }
    }

    private function urlExists($url)
    {
        $headers = @get_headers($url);
        return stripos($headers[0], "200 OK") ? true : false;
    }
}
