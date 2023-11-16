<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Addons;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AddonsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AddonsResource\RelationManagers;

class AddonsResource extends Resource
{
    protected static ?string $model = Addons::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Products'; 

    public static function form(Form $form): Form
    {
        $randomNumber = "" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return $form
            ->schema([
                Section::make('New Product')
                    ->description('The items you have selected for purchase')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                     Fieldset::make('Product')
                        ->schema([
                            TextInput::make('product_id')
                            ->label('ID')
                            ->readOnly()
                            ->default($randomNumber)
                            ->required(),
                            TextInput::make('product_name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                     ]),
                        FileUpload::make('product_image')
                        ->label('Attachment')
                        ->image(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('order_id'),
              TextColumn::make('product_name'),
              TextColumn::make('product_price'),
              TextColumn::make('quantity'),
              TextColumn::make('order_type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAddons::route('/'),
            'create' => Pages\CreateAddons::route('/create'),
            'edit' => Pages\EditAddons::route('/{record}/edit'),
        ];
    }
}
