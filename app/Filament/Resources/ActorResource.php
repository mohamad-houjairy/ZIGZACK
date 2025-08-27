<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActorResource\Pages;
use App\Filament\Resources\ActorResource\RelationManagers;
use App\Models\Actor;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActorResource extends Resource
{
    protected static ?string $model = Actor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(255),

            Textarea::make('bio')
                ->label('Biography')
                ->required()
                ->maxLength(1000),

            FileUpload::make('profile_image')
                ->label('Profile Image')
                ->image()                  // restrict to images
                ->directory('profile_images')  // stored in storage/app/public/profile_images
                ->disk('public')           // make sure you run `php artisan storage:link`
                ->required()
                ->imagePreviewHeight('150'), // optional: show preview

            DatePicker::make('birth_date')
                ->label('Date of Birth')
                ->required()
                ->maxDate(now()),           // can't select future dates
        ])
        ->columns(2);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('bio'),
                Tables\Columns\TextColumn::make('birth_date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActors::route('/'),
            'create' => Pages\CreateActor::route('/create'),
            'edit' => Pages\EditActor::route('/{record}/edit'),
        ];
    }
}
