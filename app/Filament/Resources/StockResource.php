<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use App\Filament\Resources\StockResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StockResource\RelationManagers;

class StockResource extends Resource
{
    protected static ?string $model = Stock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return $form->schema([
            Fieldset::make('Product Information')->schema([
                TextInput::make('product_id')
                    ->label('Product ID')
                    ->readOnly()
                    ->default($randomNumber)
                    ->columnSpanFull()
                    ->required()
                    ->columnSpanFull(),
                Select::make('product_name')
                    ->label('Name')
                    ->searchable()
                    ->required('create')
                    ->options(Product::all()->pluck('product_name', 'product_name'))
                    ->live(),
                TextInput::make('product_price')
                    ->label('Price')
                    ->required()
                    ->numeric(),
            ]),
            Fieldset::make('Stock Information')->schema([
                TextInput::make('product_stock')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Select::make('product_category')
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

                Select::make('product_status')
                    ->label('Status')
                    ->options([
                        'In Stock' => 'In Stock',
                        'Low Stock' => 'Low Stock',
                        'Critical' => 'Critical',
                    ])
                    ->native(false)
                    ->required(),
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
                Tables\Columns\TextColumn::make('product_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_name')->searchable(),
                ImageColumn::make('product_image')
                    ->circular()
                    ->label('attachment')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('product_stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_status')->searchable(),
                Tables\Columns\TextColumn::make('product_category')->searchable(),
                Tables\Columns\TextColumn::make('product_expiration')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }
}
