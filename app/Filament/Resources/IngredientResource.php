<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use App\Models\Ingredient;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IngredientResource\Pages;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\IngredientResource\RelationManagers;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Product Information')->schema([
                TextInput::make('ingredient_stock')
                    ->label('Ingredients Name'),
                TextInput::make('ingredient_price')
                    ->label('Price')
                    ->required()
                    ->numeric(),
            ]),
            Fieldset::make('Stock Information')->schema([
                TextInput::make('ingredient_stock')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Select::make('ingredient_category')
                    ->label('Category')
                    ->searchable()
                    // ->required('create')
                    ->options(Category::all()->pluck('product_category', 'product_category')),
            ]),
            Fieldset::make('Status Information')->schema([
                Datepicker::make('product_expiration')
                    ->minDate(now()->format('Y-m-d')) // Set the minimum date in 'Y-m-d' format
                    ->format('Y-m-d')
                    ->rules(['date', 'after_or_equal:' . now()->format('Y-m-d')])
                    ->required('create')
                    ->visibleOn('create', 'view')
                    ->native(false),

                Select::make('ingredient_status')
                    ->label('Status')
                    ->options([
                        'In Stock' => 'In Stock',
                        'Low Stock' => 'Low Stock',
                        'Critical' => 'Critical',
                    ])
                    ->native(false)
                    ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ingredient_stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ingredient_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ingredient_status')->searchable(),
                Tables\Columns\TextColumn::make('ingredient_category')->searchable(),
                Tables\Columns\TextColumn::make('ingredient_expiration')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([Tables\Filters\TrashedFilter::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make(), Tables\Actions\ForceDeleteAction::make(), Tables\Actions\RestoreAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(), Tables\Actions\ForceDeleteBulkAction::make(), Tables\Actions\RestoreBulkAction::make()])
        ])->poll('1s');
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIngredients::route('/'),
            'create' => Pages\CreateIngredient::route('/create'),
            'edit' => Pages\EditIngredient::route('/{record}/edit'),
        ];
    }
}
