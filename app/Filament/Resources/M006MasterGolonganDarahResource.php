<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M006MasterGolonganDarahResource\Pages;
use App\Filament\Resources\M006MasterGolonganDarahResource\RelationManagers;
use App\Models\M006MasterGolonganDarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M006MasterGolonganDarahResource extends Resource
{
    protected static ?string $model = M006MasterGolonganDarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationLabel = 'Golongan Darah';

    protected static ?string $modelLabel = 'Golongan Darah';

    protected static ?string $pluralModelLabel = 'Golongan Darah';

    protected static ?string $slug = 'golongan-darah';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('nama'),
                IconEntry::make('status')
                    ->boolean(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\Hidden::make('status')->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageM006MasterGolonganDarahs::route('/'),
        ];
    }
}