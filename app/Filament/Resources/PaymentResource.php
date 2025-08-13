<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
   use Filament\Tables\Columns\TextColumn;
   use Filament\Forms\Components\Select;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
 Forms\Components\TextInput::make('id')
                    ->numeric(),

                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),

Select::make('user_id')
    ->label('User')
    ->relationship('user', 'name') // العلاقة + العمود المعروض
    ->searchable()                 // يمكن البحث بالاسم
    ->required(),

                Forms\Components\TextInput::make('subscription_id')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('payment_method')
                    ->options([
                        'credit_card' => 'Credit Card',
                        'paypal' => 'PayPal',
                        'bank_transfer' => 'Bank Transfer',
                    ])
                    ->required(),
                    Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ])
                    ->required(),

            ])->columns(2);

    }

    public static function table(Table $table): Table
    {

        $uid =  Tables\Columns\TextColumn::make('user_id');

        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('amount'),

TextColumn::make('user.name')
    ->label('User Name')
    ->sortable()      // اختيارية
    ->searchable(),   // اختيارية

                Tables\Columns\TextColumn::make('subscription_id'),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
