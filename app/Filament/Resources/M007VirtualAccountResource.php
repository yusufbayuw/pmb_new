<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M007VirtualAccountResource\Pages;
use App\Filament\Resources\M007VirtualAccountResource\RelationManagers;
use App\Models\M007VirtualAccount;
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

class M007VirtualAccountResource extends Resource
{
    protected static ?string $model = M007VirtualAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Master';

    protected static ?string $navigationLabel = 'Virtual Account';

    protected static ?string $modelLabel = 'Virtual Account';

    protected static ?string $pluralModelLabel = 'VIrtual Account';

    protected static ?string $slug = 'virtual-account';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('gelombang.nama'),
                TextEntry::make('nomor'),
                TextEntry::make('bank'),
                IconEntry::make('status')
                    ->boolean(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('gelombang_id')
                    ->relationship('gelombang', 'id'),
                Forms\Components\TextInput::make('bank')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor')
                    ->maxLength(255),
                Forms\Components\Hidden::make('status')->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gelombang.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bank')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor')
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
            'index' => Pages\ManageM007VirtualAccounts::route('/'),
        ];
    }
}
