<?php

namespace App\Filament\Widgets;

use App\Models\Actor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\ContentCreator;
use App\Models\FestivalVideo;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\Video;
use Filament\Actions\Action;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),


            Card::make('Total Actors', Actor::count())
                ->description('Actors in system')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('success'),

            Card::make('Total Categories', Category::count())
                ->description('Categories in system')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('warning'),


            Card::make('Total Content Creators', ContentCreator::count())
                ->description('Content creators in system')
                ->color('danger'),

              Card::make('Total Revenue', Payment::sum('amount'))
    ->description('Total income collected')
    ->descriptionIcon('heroicon-o-cash')
    ->color('success'),

                 Card::make('Total Reviews', Review::count())
                ->description('Reviews in system')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('success'),

                 Card::make('Total Subscriptions', Subscription::count())
                ->description('Subscriptions in system')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('success'),

                 Card::make('Total Videos', Video::count())
                ->description('Videos in system')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('success'),
                Card::make('Total Festival Videos', FestivalVideo::count())
                ->description('Festival videos in system')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('success'),
        ];
    }
}
