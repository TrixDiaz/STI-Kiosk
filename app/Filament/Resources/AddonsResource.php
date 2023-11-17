<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Addons;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
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
        $randomNumber = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

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
                    ->columnSpanFull(),
                Select::make('product_category')
                    ->label('Category')
                    ->searchable()
                    // ->required('create')
                    ->default('Addons')
                    ->visibleOn('view'),

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
                    ->image()
                    ->columnSpanFull(),
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
                    ->toggleable(isToggledHiddenByDefault: false),
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
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
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
            'index' => Pages\ListAddons::route('/'),
            'create' => Pages\CreateAddons::route('/create'),
            'edit' => Pages\EditAddons::route('/{record}/edit'),
        ];
    }
}
