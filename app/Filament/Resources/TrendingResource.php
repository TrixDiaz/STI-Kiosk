<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Trending;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TrendingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TrendingResource\RelationManagers;

class TrendingResource extends Resource
{
    protected static ?string $model = Trending::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Suppliers';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Trending Image')->schema([
                TextInput::make('product_name')->label('Name'),
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
                TextColumn::make('product_name')->searchable(),
                ImageColumn::make('product_image')
                ->circular()
                ->label('attachment')
                ->toggleable(isToggledHiddenByDefault: false),
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
            'index' => Pages\ListTrendings::route('/'),
            'create' => Pages\CreateTrending::route('/create'),
            'edit' => Pages\EditTrending::route('/{record}/edit'),
        ];
    }
}
