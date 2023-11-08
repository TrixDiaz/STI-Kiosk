<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Stock;
use App\Models\Supplier;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SupplierResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Suppliers';

    public static function form(Form $form): Form
    {
        return $form->schema([
            
                TextInput::make('company')
                ->label('Company Name')
                ->maxLength(255)
                ->columnSpanFull()
                ->required(),

                Fieldset::make('Contact Person')
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
    
                    TextInput::make('contact')
                    ->required()
                    ->maxLength(255),
    
                    TextInput::make('email')
                        ->email()
                        ->required()
                    ->maxLength(255),
                ])->columns(3),
                
                Select::make('product_id')
                ->label('Select a Product')
                ->options(function () {
                    // Retrieve all products and format them for the select dropdown.
                    $products = Product::all();

                    // Create an array of options with product IDs as keys and product names as values.
                    $options = $products->pluck('product_name', 'id')->toArray();

                    return $options;
                })
                 ->multiple(false), // Set to true if you want to allow selecting multiple products
                Select::make('status')
                ->options([
                    'active' => 'ACTIVE',
                    'inactive' => 'INACTIVE'
                ])
                ->required()
                ->native(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('company')
                ->searchable(),
                TextColumn::make('contact')
                ->searchable(),
                TextColumn::make('email')
                ->searchable(),
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
