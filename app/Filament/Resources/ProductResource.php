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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms\Components\Textarea;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Product';

    public static function form(Form $form): Form
    {

        $randomNumber = "PID" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        return $form
            ->schema([
                TextInput::make('product_id')
                    ->label('PID')
                    ->readOnly()
                    ->default($randomNumber)
                    ->columnSpanFull()
                    ->required(),

                Section::make('New Product')
                    ->description('The items you have selected for purchase')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        TextInput::make('product_name')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('product_description')
                            ->label('Description')
                            ->required()
                            ->maxLength(255),

                    ]),
                Fieldset::make('Product Information')
                    ->schema([
                        TextInput::make('product_price')
                            ->label('Price')
                            ->required()
                            ->numeric(),
                        TextInput::make('product_classification')
                            ->label('Category')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('product_stock')
                            ->label('Stocks')
                            ->required()
                            ->numeric(),
                    ])
                    ->columns(3),

                Fieldset::make(' Information')
                    ->schema([
                        Select::make('product_status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required(),
                        DatePicker::make('product_expiration')
                            ->label('Expiry')
                            ->native(false)
                            ->timezone('Asia/Manila')
                            ->displayFormat('d/m/Y')
                            ->required(),
                    ])->columns(2),
                FileUpload::make('product_image')
                    ->label('attachment')
                    ->image()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_id')
                    ->label('PID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('product_price')
                    ->label('Price')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('product_stock')
                    ->label('Stocks')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('product_description')
                    ->label('Description')
                    ->searchable()
                    ->words(10)
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('product_image')
                    ->circular()
                    ->label('attachment')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_classification')
                    ->label('Category')
                    ->searchable()
                    ->words(10)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_status')
                    ->label('Status')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_expiration')
                    ->label('Expiry')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->since(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
