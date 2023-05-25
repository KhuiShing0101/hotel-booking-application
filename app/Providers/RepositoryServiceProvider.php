<?php

namespace App\Providers;

use App\Repository\AmenitiesRepository;
use App\Repository\AmenitiesRepositoryInterface;
use App\Repository\BedRepository;
use App\Repository\BedRepositoryInterface;
use App\Repository\HomeRepository;
use App\Repository\HomeRepositoryInterface;
use App\Repository\RoomAmenitiesRepository;
use App\Repository\RoomAmenitiesRepositoryInterface;

use App\Repository\RoomRepository;
use App\Repository\RoomRepositoryInterface;

use App\Repository\RoomSpecialFeaturesRepository;
use App\Repository\RoomSpecialFeaturesRepositoryInterface;
use App\Repository\SpecialFeatureRepository;
use App\Repository\SpecialFeatureRepositoryInterface;
use App\Repository\ViewRepository;
use App\Repository\ViewRepositoryInterface;

use App\Repository\FrontEndRoomRepository;
use App\Repository\FrontEndRoomRepositoryInterface;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
        $this->app->bind(ViewRepositoryInterface::class, ViewRepository::class);
        $this->app->bind(BedRepositoryInterface::class, BedRepository::class);
        $this->app->bind(SpecialFeatureRepositoryInterface::class, SpecialFeatureRepository::class);
        $this->app->bind(AmenitiesRepositoryInterface::class, AmenitiesRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(RoomSpecialFeaturesRepositoryInterface::class, RoomSpecialFeaturesRepository::class);
        $this->app->bind(RoomAmenitiesRepositoryInterface::class, RoomAmenitiesRepository::class);
        $this->app->bind(FrontEndRoomRepositoryInterface::class, FrontEndRoomRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
