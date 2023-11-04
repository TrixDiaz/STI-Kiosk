<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Product';

    public static function form(Form $form): Form
    {

        $randomNumber = "" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return $form
            ->schema([
                TextInput::make('product_id')
                    ->readOnly()
                    ->default($randomNumber)
                    ->required(), 
                TextInput::make('product_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('product_price')
                    ->required()
                    ->numeric(),
                TextInput::make('product_quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('product_description')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('product_image')
                    ->image()
                    ->required(),
                TextInput::make('product_classification')
                    ->required()
                    ->maxLength(255),
                Select::make('product_status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->required(),
                DatePicker::make('product_expiration')
                     ->native(false)
                     ->timezone('Asia/Manila')
                     ->displayFormat('d/m/Y')
                     ->required(),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_id')
                    ->searchable(),
                TextColumn::make('product_name')
                    ->searchable(),
                TextColumn::make('product_price')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('product_quantity')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('product_description')
                    ->searchable(),
                ImageColumn::make('product_image'),
                TextColumn::make('product_classification')
                    ->searchable(),
                TextColumn::make('product_status')
                    ->searchable(),
                    TextColumn::make('product_expiration')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->since(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
