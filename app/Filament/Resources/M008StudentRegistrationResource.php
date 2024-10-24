<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\M005MasterAgama;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\M004MasterJurusan;
use App\Models\M001MasterGelombang;
use App\Models\M003MasterPekerjaan;
use Filament\Tables\Actions\Action;
use App\Models\M002MasterPendidikan;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use App\Models\M006MasterGolonganDarah;
use App\Models\M008StudentRegistration;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Infolists\Components\RepeatableEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Section as SectionEntry;
use App\Filament\Resources\M008StudentRegistrationResource\Pages;
use Filament\Infolists\Components\Fieldset as ComponentsFieldset;
use App\Filament\Resources\M008StudentRegistrationResource\RelationManagers;
use App\Filament\Resources\M008StudentRegistrationResource\Pages\ManageM008StudentRegistrations;

class M008StudentRegistrationResource extends Resource
{
    protected static ?string $model = M008StudentRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $modelLabel = 'Pendaftaran';

    protected static ?string $pluralModelLabel = 'Pendaftaran';

    protected static ?string $slug = 'pendaftaran';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                SectionEntry::make('PILIHAN PROGRAM STUDI')
                    ->icon('heroicon-o-academic-cap')
                    //->description('Pilihlah tiga Program Studi')
                    ->schema([
                        TextEntry::make('pilihan1.nama')
                            ->label('Pilihan Ke-1')
                            ->inlineLabel(),
                        TextEntry::make('pilihan2.nama')
                            ->label('Pilihan Ke-2')
                            ->inlineLabel(),
                        TextEntry::make('pilihan3.nama')
                            ->label('Pilihan Ke-3')
                            ->inlineLabel(),
                    ]),
                SectionEntry::make('DATA DIRI')
                    //->description('Isi data diri')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextEntry::make('nik')
                            ->label('NIK'),
                        TextEntry::make('nama_lengkap')
                            ->label('Nama Lengkap'),
                        TextEntry::make('tempat_lahir'),
                        TextEntry::make('tanggal_lahir')
                            ->label('Tanggal Lahir'),
                        TextEntry::make('no_telp_handphone')
                            ->label('Nomor Telp/HP'),
                        TextEntry::make('email'),
                        TextEntry::make('agama.nama')
                            ->label('Agama'),
                        TextEntry::make('warga_negara')
                            ->label('Warga Negara'),
                        TextEntry::make('golonganDarah.nama')
                            ->label('Golongan Darah'),
                        ComponentsFieldset::make('DATA ALAMAT')
                            ->schema([
                                TextEntry::make('alamat_di_bandung')
                                    ->label('Alamat di Bandung'),
                                TextEntry::make('kelurahan'),
                                TextEntry::make('kecamatan'),
                                TextEntry::make('kota'),
                                TextEntry::make('provinsi'),
                            ]),

                        ComponentsFieldset::make('DATA SEKOLAH ASAL')
                            ->schema([
                                TextEntry::make('asal_sekolah')
                                    ->label('Asal Sekolah'),
                                TextEntry::make('alamat_sekolah')
                                    ->label('Alamat Sekolah'),
                            ]),
                    ])->columns(2),
                SectionEntry::make('DATA PRESTASI')
                    ->icon('heroicon-o-trophy')
                    ->schema([
                        RepeatableEntry::make('data_prestasi')
                            ->label('')
                            ->schema([
                                TextEntry::make('prestasi')
                                    ->columnSpan(1),
                                TextEntry::make('tingkat')
                                    ->columnSpan(1)
                            ])
                            ->columns(2),
                    ]),
                SectionEntry::make('SUMBANGAN SUKARELA')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        TextEntry::make('sumbangan_sukarela')
                            ->label('Nominal')
                            ->inlineLabel()
                            ->formatStateUsing(fn($state) => "Rp " . number_format($state, 0, ',', '.')),
                    ]),

            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('PILIHAN PROGRAM STUDI')
                    ->icon('heroicon-o-academic-cap')
                    //->description('Pilihlah tiga Program Studi')
                    ->schema([
                        Select::make('pilihan_1')
                            ->label('Pilihan Ke-1')
                            ->options(M004MasterJurusan::where('status', 1)->pluck('nama', 'id'))
                            ->required(),
                        Select::make('pilihan_2')
                            ->label('Pilihan Ke-2')
                            ->options(M004MasterJurusan::where('status', 1)->pluck('nama', 'id'))
                            ->required(),
                        Select::make('pilihan_3')
                            ->label('Pilihan Ke-3')
                            ->options(M004MasterJurusan::where('status', 1)->pluck('nama', 'id'))
                            ->required(),
                    ]),
                Section::make('DATA DIRI')
                    //->description('Isi data diri')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tempat_lahir')
                            ->maxLength(255)
                            ->required(),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->placeholder('klik untuk memilih tanggal')
                            ->displayFormat('d F Y')
                            ->closeOnDateSelection()
                            ->required(),
                        TextInput::make('no_telp_handphone')
                            ->label('Nomor Telp/HP')
                            ->required()
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        Select::make('agama_id')
                            ->required()
                            ->label('Agama')
                            ->options(M005MasterAgama::where('status', 1)->pluck('nama', 'id')),
                        Select::make('warga_negara')
                            ->label('Warga Negara')
                            ->required()
                            ->options([
                                'WNI' => 'WNI',
                                'WNA' => 'WNA'
                            ])
                            ->default('WNI'),
                        Select::make('golongan_darah_id')
                            ->label('Golongan Darah')
                            ->options(M006MasterGolonganDarah::where('status', 1)->pluck('nama', 'id')),
                        Fieldset::make('DATA ALAMAT')
                            ->schema([
                                Textarea::make('alamat_di_bandung')
                                    ->label('Alamat di Bandung')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('kelurahan')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('kecamatan')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('kota')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('provinsi')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        Fieldset::make('DATA SEKOLAH ASAL')
                            ->schema([
                                TextInput::make('asal_sekolah')
                                    ->label('Asal Sekolah')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('alamat_sekolah')
                                    ->label('Alamat Sekolah')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ])->columns(2),
                Hidden::make('gelombang_id')
                    ->default(M001MasterGelombang::where('status', true)->first()->id ?? null),
                Hidden::make('nomor_daftar'),
                Hidden::make('nomor_peserta'),
                Section::make('DATA ORANG TUA')
                    //->description('Isi data Ayah & Ibu')
                    ->icon('heroicon-o-users')
                    ->schema([
                        Fieldset::make('DATA AYAH')
                            ->schema([
                                TextInput::make('nik_ayah')
                                    ->label('NIK Ayah')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('nama_ayah')
                                    ->label('Nama Ayah')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('no_telp_handphone_ayah')
                                    ->label('No Telp/HP Ayah')
                                    ->required()
                                    ->tel()
                                    ->maxLength(255),
                                TextInput::make('email_ayah')
                                    ->label('Email Ayah')
                                    ->email()
                                    ->maxLength(255),
                                Select::make('pendidikan_ayah_id')
                                    ->label('Pendidikan Ayah')
                                    ->required()
                                    ->options(M002MasterPendidikan::where('status', 1)->pluck('nama', 'id')),
                                Select::make('pekerjaan_ayah_id')
                                    ->label('Pekerjaan Ayah')
                                    ->required()
                                    ->options(M003MasterPekerjaan::where('status', 1)->pluck('nama', 'id')),
                                Textarea::make('alamat_rumah_ayah')
                                    ->label('Alamat Rumah Ayah')
                                    ->required()
                                    ->maxLength(255),
                            ])->columnSpan(1),
                        Fieldset::make('DATA IBU')
                            ->schema([
                                TextInput::make('nik_ibu')
                                    ->label('NIK Ibu')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('nama_ibu')
                                    ->label('Nama Ibu')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('no_telp_handphone_ibu')
                                    ->label('No Telp/HP Ibu')
                                    ->required()
                                    ->tel()
                                    ->maxLength(255),
                                TextInput::make('email_ibu')
                                    ->label('Email Ibu')
                                    ->email()
                                    ->maxLength(255),
                                Select::make('pendidikan_ibu_id')
                                    ->label('Pendidikan Ibu')
                                    ->required()
                                    ->options(M002MasterPendidikan::where('status', 1)->pluck('nama', 'id')),
                                Select::make('pekerjaan_ibu_id')
                                    ->label('Pekerjaan Ibu')
                                    ->required()
                                    ->options(M003MasterPekerjaan::where('status', 1)->pluck('nama', 'id')),
                                Textarea::make('alamat_rumah_ibu')
                                    ->label('Alamat Rumah Ibu')
                                    ->required()
                                    ->maxLength(255),
                            ])->columnSpan(1),
                    ])->columns(2),
                Section::make('DATA PRESTASI')
                    ->icon('heroicon-o-trophy')
                    ->schema([
                        Repeater::make('data_prestasi')
                            ->label('')
                            ->schema([
                                TextInput::make('prestasi')
                                    ->columnSpan(1),
                                Select::make('tingkat')
                                    ->options([
                                        'Kabupaten/Kota' => 'Kabupaten/Kota',
                                        'Provinsi' => 'Provinsi',
                                        'Nasional' => 'Nasional',
                                        'Internasional' => 'Internasional'
                                    ])->columnSpan(1)
                            ])
                            ->reorderable(false)
                            ->columns(2),
                    ]),
                Section::make('SUMBANGAN SUKARELA')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        TextInput::make('sumbangan_sukarela')
                            ->label('Minimal Rp 1.000.000,- dan kelipatannya')
                            ->numeric()
                            ->step(1000000)
                            ->minValue(1000000)
                            ->default(1000000),
                    ]),
                Hidden::make('verifikasi')
                    ->default(0),
                Hidden::make('status')->default(1),
                Hidden::make('berkas_pembayaran')
                    ->default(0),
                Hidden::make('virtual_account_id'),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gelombang.nama')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nomor_daftar')
                    ->label('No. Daftar')
                    ->searchable(),
                TextColumn::make('nomor_peserta')
                    ->label('No. Peserta')
                    ->searchable(),
                TextColumn::make('nik')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('tempat_lahir')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alamat_di_bandung')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('no_telp_handphone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('kelurahan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('kecamatan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('kota')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('provinsi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('agama.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('warga_negara')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('asal_sekolah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alamat_sekolah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('golonganDarah.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nik_ayah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nama_ayah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alamat_rumah_ayah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('no_telp_handphone_ayah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_ayah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pendidikanAyah.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pekerjaanAyah.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nik_ibu')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('nama_ibu')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alamat_rumah_ibu')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('no_telp_handphone_ibu')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_ibu')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pendidikanIbu.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pekerjaanIbu.nama')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('sumbangan_sukarela')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('berkas_pembayaran')
                    ->label('Pembayaran VA')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('virtualAccount.nomor')
                    ->label('Nomor VA')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pilihan1.nama')
                    ->label('Pilihan 1')
                    ->sortable(),
                TextColumn::make('pilihan2.nama')
                    ->label('Pilihan 2')
                    ->sortable(),
                TextColumn::make('pilihan3.nama')
                    ->label('Pilihan 3')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('status')
                    ->label('Aktif')
                    ->boolean()
                    ->action(function ($record, $column, $livewire) {
                        $name = $column->getName();
                        $record->update([
                            $name => !$record->$name
                        ]);
                        $livewire->dispatch('refreshTab');
                    })
                    ->tooltip(fn($state) => $state ? 'Non-Aktifkan' : 'Aktifkan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('diterima')
                    ->label('')
                    ->icon('heroicon-m-check-badge')
                    ->iconSize('md')
                    ->tooltip('Diterima')
                    ->hidden(fn($record) => ($record->verifikasi != 3))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 4,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('menunggu')
                    ->label('')
                    ->icon('heroicon-m-clock')
                    ->iconSize('md')
                    ->color('warning')
                    ->tooltip('Menunggu')
                    ->hidden(fn($record) => ($record->verifikasi != 3))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 5,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('ditolak')
                    ->label('')
                    ->icon('heroicon-m-x-circle')
                    ->iconSize('md')
                    ->color('danger')
                    ->tooltip('Ditolak')
                    ->hidden(fn($record) => ($record->verifikasi != 3))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 6,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('batalkan_seleksi')
                    ->label('')
                    ->icon('heroicon-o-archive-box-x-mark')
                    ->iconSize('md')
                    ->color('danger')
                    ->tooltip('Batalkan Validasi')
                    ->hidden(fn($record) => ($record->verifikasi != 3))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 2,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('seleksi')
                    ->label('')
                    ->icon('heroicon-m-archive-box-arrow-down')
                    ->iconSize('md')
                    ->tooltip('Masukkan ke Tahap Seleksi')
                    ->hidden(fn($record) => ($record->verifikasi != 2))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 3,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('batalkan_validasi')
                    ->label('')
                    ->icon('heroicon-m-x-circle')
                    ->iconSize('md')
                    ->color('danger')
                    ->tooltip('Batalkan Validasi')
                    ->hidden(fn($record) => ($record->verifikasi != 2))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 1,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('validasi')
                    ->label('')
                    ->icon('heroicon-m-document-check')
                    ->iconSize('md')
                    ->tooltip('Validasikan Data')
                    ->hidden(fn($record) => ($record->verifikasi != 1))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 2,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('batal_verifikasi')
                    ->label('')
                    ->icon('heroicon-m-hand-thumb-down')
                    ->iconSize('md')
                    ->color('danger')
                    ->tooltip('Batalkan Verifikasi')
                    ->hidden(fn($record) => ($record->verifikasi != 1))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 0,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                Action::make('verifikasi')
                    ->label('')
                    ->icon('heroicon-m-hand-thumb-up')
                    ->iconSize('md')
                    ->tooltip('Verifikasikan Data')
                    ->hidden(fn($record) => ($record->verifikasi != false))
                    ->action(function ($record, $livewire) {
                        $record->update([
                            'verifikasi' => 1,
                        ]);
                        $livewire->dispatch('refreshTab');
                    }),
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->tooltip('Lihat'),
                    EditAction::make()
                        ->label('Edit')
                        ->tooltip('Edit'),
                    DeleteAction::make()
                        ->label('Hapus')
                        ->tooltip('Hapus'),
                ])->tooltip('Lihat, Edit, Hapus'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
