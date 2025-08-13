<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentCreatorResource\Pages;
use App\Filament\Resources\ContentCreatorResource\RelationManagers;
use App\Models\ContentCreator;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
   use Filament\Tables\Columns\TextColumn;

class ContentCreatorResource extends Resource
{
    protected static ?string $model = ContentCreator::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

Select::make('user_id')
    ->label('User')
    ->relationship('user', 'name') // العلاقة + العمود المعروض
    ->searchable()                 // يمكن البحث بالاسم
    ->required(),

                Forms\Components\TextInput::make('bio')
                    ->required(),
                Forms\Components\TextInput::make('profile_image')
                    ->required(),

            ])->columns(2);

    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([

TextColumn::make('user.name')
    ->label('User Name')
    ->sortable()      // اختيارية
    ->searchable(),   // اختيارية
                Tables\Columns\TextColumn::make('bio'),
                Tables\Columns\TextColumn::make('profile_image'),
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
            'index' => Pages\ListContentCreators::route('/'),
            'create' => Pages\CreateContentCreator::route('/create'),
            'edit' => Pages\EditContentCreator::route('/{record}/edit'),
        ];
    }
}
