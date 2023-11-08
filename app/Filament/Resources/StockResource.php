<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Stock;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StockResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StockResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\Select;

class StockResource extends Resource
{
    protected static ?string $model = Stock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        $randomNumber = "" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        return $form
            ->schema([
                TextInput::make('product_id')
                    ->label('Product ID')
                    ->readOnly()
                    ->default($randomNumber)
                    ->columnSpanFull()
                    ->required(),
                Select::make('product_name')
                    ->label('Name')
                    ->searchable()
                    ->required('create')
                    ->options(Product::all()->pluck('product_name', 'product_name'))
                    ->live(),
                TextInput::make('product_stock')
                    ->label('Stock')
                    ->required()
                    ->numeric(),
                DatePicker::make('product_expiration')
                    ->label('Expiration')
                    ->required()
                    ->disabledOn('edit')
                    ->native(false),
                Select::make('product_status')
                    ->label('Status')
                    ->options([
                        'inStock' => 'IN Stock',
                        'lowStock' => 'Low Stock',
                        'critical' => 'Critical',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('category')
                    ->label('Category')
                    ->searchable()
                    ->required('create')
                    ->options(Category::all()->pluck('category', 'category'))
                    ->live(),
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
                TextColumn::make('product_stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('product_status')
                    ->searchable(),
                TextColumn::make('product_expiration')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }    
}
