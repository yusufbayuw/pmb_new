<?php

namespace App\Filament\Resources;

use App\Filament\Resources\M008StudentRegistrationResource\Pages;
use App\Filament\Resources\M008StudentRegistrationResource\RelationManagers;
use App\Models\M001MasterGelombang;
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

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $modelLabel = 'Pendaftaran';

    protected static ?string $pluralModelLabel = 'Pendaftaran';

    protected static ?string $slug = 'pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pilihan Program Studi')
                    ->description('Pilihlah tiga Program Studi')
                    ->schema([
                        Forms\Components\Select::make('pilihan_1')
                            ->label('Pilihan Ke-1')
                            ->relationship('pilihan1', 'nama')
                            ->required(),
                        Forms\Components\Select::make('pilihan_2')
                            ->label('Pilihan Ke-2')
                            ->relationship('pilihan2', 'nama')
                            ->required(),
                        Forms\Components\Select::make('pilihan_3')
                            ->label('Pilihan Ke-3')
                            ->relationship('pilihan3', 'nama')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Data Diri')
                    ->description('Isi data diri')
                    ->schema([
                        Forms\Components\TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->placeholder('klik untuk memilih tanggal')
                            ->displayFormat('d F Y')
                            ->closeOnDateSelection()
                            ->required(),
                        Forms\Components\TextInput::make('no_telp_handphone')
                            ->label('Nomor Telp/HP')
                            ->required()
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        Forms\Components\Select::make('agama_id')
                            ->required()
                            ->label('Agama')
                            ->relationship('agama', 'nama'),
                        Forms\Components\Select::make('warga_negara')
                            ->label('Warga Negara')
                            ->required()
                            ->options([
                                'WNI' => 'WNI',
                                'WNA' => 'WNA'
                            ])
                            ->default('WNI'),
                        Forms\Components\Select::make('golongan_darah_id')
                            ->label('Golongan Darah')
                            ->relationship('golonganDarah', 'nama'),
                        Forms\Components\Fieldset::make('Data Alamat')
                            ->schema([
                                Forms\Components\Textarea::make('alamat_di_bandung')
                                    ->label('Alamat di Bandung')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kelurahan')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kecamatan')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('kota')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('provinsi')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Fieldset::make('Data Sekolah Asal')
                            ->schema([
                                Forms\Components\TextInput::make('asal_sekolah')
                                    ->label('Asal Sekolah')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('alamat_sekolah')
                                    ->label('Alamat Sekolah')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
                Forms\Components\Hidden::make('gelombang_id')
                    ->default(M001MasterGelombang::where('status', true)->first()->id ?? null),
                Forms\Components\Hidden::make('nomor_daftar'),
                Forms\Components\Hidden::make('nomor_peserta'),
                Forms\Components\Section::make('Data Orang Tua')
                    ->description('Isi data Ayah & Ibu')
                    ->schema([
                        Forms\Components\Fieldset::make('Data Ayah')
                            ->schema([
                                Forms\Components\TextInput::make('nik_ayah')
                                    ->label('NIK Ayah')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nama_ayah')
                                    ->label('Nama Ayah')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('no_telp_handphone_ayah')
                                    ->label('No Telp/HP Ayah')
                                    ->required()
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email_ayah')
                                    ->label('Email Ayah')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\Select::make('pendidikan_ayah_id')
                                    ->label('Pendidikan Ayah')
                                    ->required()
                                    ->relationship('pendidikanAyah', 'nama'),
                                Forms\Components\Select::make('pekerjaan_ayah_id')
                                    ->label('Pekerjaan Ayah')
                                    ->required()
                                    ->relationship('pekerjaanAyah', 'nama'),
                                Forms\Components\Textarea::make('alamat_rumah_ayah')
                                    ->label('Alamat Rumah Ayah')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Fieldset::make('Data Ibu')
                            ->schema([
                                Forms\Components\TextInput::make('nik_ibu')
                                    ->label('NIK Ibu')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nama_ibu')
                                    ->label('Nama Ibu')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('no_telp_handphone_ibu')
                                    ->label('No Telp/HP Ibu')
                                    ->required()
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email_ibu')
                                    ->label('Email Ibu')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\Select::make('pendidikan_ibu_id')
                                    ->label('Pendidikan Ibu')
                                    ->required()
                                    ->relationship('pendidikanIbu', 'nama'),
                                Forms\Components\Select::make('pekerjaan_ibu_id')
                                    ->label('Pekerjaan Ibu')
                                    ->required()
                                    ->relationship('pekerjaanIbu', 'nama'),
                                Forms\Components\Textarea::make('alamat_rumah_ibu')
                                    ->label('Alamat Rumah Ibu')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
                Forms\Components\TextInput::make('data_prestasi'),
                Forms\Components\TextInput::make('sumbangan_sukarela')
                    ->numeric(),
                Forms\Components\Hidden::make('verifikasi')
                    ->default(0),
                Forms\Components\Hidden::make('status')->default(1),
                Forms\Components\Hidden::make('hasil_seleksi')
                    ->default(0),
                Forms\Components\Hidden::make('virtual_account_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gelombang.nama')
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
                Tables\Columns\TextColumn::make('agama.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('warga_negara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal_sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golonganDarah.nama')
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
                Tables\Columns\TextColumn::make('pendidikanAyah.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaanAyah.nama')
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
                Tables\Columns\TextColumn::make('pendidikanIbu.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pekerjaanIbu.nama')
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
                Tables\Columns\TextColumn::make('virtualAccount.nama')
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
