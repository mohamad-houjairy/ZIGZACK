<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
   use Filament\Tables\Columns\TextColumn;
   use Filament\Forms\Components\Select;
class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Textarea::make('comment')
                    ->required(),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->required(),
          Select::make('user_id')
    ->label('User')
    ->relationship('user', 'name') // العلاقة + العمود المعروض
    ->searchable()                 // يمكن البحث بالاسم
    ->required(),
                Forms\Components\TextInput::make('video_id')
                    ->numeric()
                    ->required(),
            ])->columns(2);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('comment'),
                Tables\Columns\TextColumn::make('rating'),

TextColumn::make('user.name')
    ->label('User Name')
    ->sortable()      // اختيارية
    ->searchable(),   // اختيارية
                Tables\Columns\TextColumn::make('video_id'),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
