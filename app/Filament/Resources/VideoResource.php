<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('video_url')
                    ->url()
                    ->required(),
                Forms\Components\TextInput::make('creator_id')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('category_id')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                    Forms\Components\Select::make('distribution')
                    ->options([
                        'public' => 'Public',
                        'festival_only' => 'Festival Only',
                        'library' => 'Library'
                    ]),
Forms\Components\FileUpload::make('picture')
                    ->image()
                    ->directory('thumbnails')
                    ->disk('public'),
                Forms\Components\TextInput::make('actors')
                    ->helperText('Enter actor names separated by commas')
                    ->placeholder('Actor1, Actor2, Actor3'),


            ])->columns(2);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('video_url'),
                Tables\Columns\TextColumn::make('creator_id'),
                Tables\Columns\TextColumn::make('category_id'),
                Tables\Columns\TextColumn::make('picture'),
                Tables\Columns\TextColumn::make('actors'),

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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
