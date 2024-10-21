<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M008StudentRegistrationResource\Pages;
use App\Filament\Resources\M008StudentRegistrationResource\RelationManagers;
use App\Models\M008StudentRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class M008StudentRegistrationResource extends Resource
{
    protected static ?string $model = M008StudentRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $modelLabel = 'Pendaftaran';

    protected static ?string $pluralModelLabel = 'Pendaftaran';

    protected static ?string $slug = 'gelombang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('gelombang_id')
                    ->relationship('gelombang', 'id'),
                Forms\Components\TextInput::make('nomor_daftar')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_peserta')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_lengkap')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('alamat_di_bandung')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp_handphone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kelurahan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kecamatan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kota')
                    ->maxLength(255),
                Forms\Components\TextInput::make('provinsi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Select::make('agama_id')
                    ->relationship('agama', 'id'),
                Forms\Components\TextInput::make('warga_negara')
                    ->maxLength(255),
                Forms\Components\TextInput::make('asal_sekolah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_sekolah')
                    ->maxLength(255),
                Forms\Components\Select::make('golongan_darah_id')
                    ->relationship('golonganDarah', 'id'),
                Forms\Components\TextInput::make('nik_ayah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ayah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_rumah_ayah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp_handphone_ayah')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email_ayah')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Select::make('pendidikan_ayah_id')
                    ->relationship('pendidikanAyah', 'id'),
                Forms\Components\Select::make('pekerjaan_ayah_id')
                    ->relationship('pekerjaanAyah', 'id'),
                Forms\Components\TextInput::make('nik_ibu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_ibu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat_rumah_ibu')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp_handphone_ibu')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email_ibu')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Select::make('pendidikan_ibu_id')
                    ->relationship('pendidikanIbu', 'id'),
                Forms\Components\Select::make('pekerjaan_ibu_id')
                    ->relationship('pekerjaanIbu', 'id'),
                Forms\Components\TextInput::make('data_prestasi'),
                Forms\Components\TextInput::make('sumbangan_sukarela')
                    ->numeric(),
                Forms\Components\TextInput::make('verifikasi')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('status'),
                Forms\Components\TextInput::make('hasil_seleksi')
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('virtual_account_id')
                    ->relationship('virtualAccount', 'id'),
                Forms\Components\TextInput::make('pilihan_1')
                    ->numeric(),
                Forms\Components\TextInput::make('pilihan_2')
                    ->numeric(),
                Forms\Components\TextInput::make('pilihan_3')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gelombang.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_daftar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_peserta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat_di_bandung')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp_handphone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelurahan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provinsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('warga_negara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal_sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golonganDarah.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_rumah_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp_handphone_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikanAyah.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaanAyah.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_rumah_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp_handphone_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikanIbu.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaanIbu.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sumbangan_sukarela')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('verifikasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('hasil_seleksi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('virtualAccount.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pilihan_1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pilihan_2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pilihan_3')
                    ->numeric()
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
            'index' => Pages\ManageM008StudentRegistrations::route('/'),
        ];
    }
}
