<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Filament\Forms\Form;
use App\Models\M001MasterGelombang;
use App\Models\M002MasterPendidikan;
use App\Models\M003MasterPekerjaan;
use App\Models\M004MasterJurusan;
use App\Models\M005MasterAgama;
use App\Models\M006MasterGolonganDarah;
use App\Models\M008StudentRegistration;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Concerns\InteractsWithForms;

class Utb extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function create()
    {
        $pendaftar = M008StudentRegistration::create($this->form->getState());

        return redirect(route('landing'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('PILIHAN PROGRAM STUDI')
                    ->icon('heroicon-o-academic-cap')
                    ->description('Pilihlah tiga Program Studi')
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
                    ->description('Isi data diri')
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
                    ->description('Isi data Ayah & Ibu')
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
                Repeater::make('data_prestasi')
                    ->label('Data Prestasi')
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
                TextInput::make('sumbangan_sukarela')
                    ->label('SUMBANGAN SUKARELA')
                    ->numeric()
                    ->step(1000000)
                    ->minValue(1000000)
                    ->default(1000000)
                    ->hint('Minimal Rp 1.000.000,- dan kelipatannya'),
                Hidden::make('verifikasi')
                    ->default(0),
                Hidden::make('status')->default(1),
                Hidden::make('hasil_seleksi')
                    ->default(0),
                Hidden::make('virtual_account_id'),
            ])->columns(2)
            ->statePath('data');
    }

    public function render()
    {
        return view('livewire.forms.utb');
    }
}
