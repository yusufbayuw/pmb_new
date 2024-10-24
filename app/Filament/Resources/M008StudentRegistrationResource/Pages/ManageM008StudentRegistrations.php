<?php

namespace App\Filament\Resources\M008StudentRegistrationResource\Pages;

use App\Filament\Resources\M008StudentRegistrationResource;
use App\Models\M001MasterGelombang;
use App\Models\M008StudentRegistration;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class ManageM008StudentRegistrations extends ManageRecords
{
    protected static string $resource = M008StudentRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    #[On('refreshTab')]
    public function getTabs(): array
    {
        $gelombang_id = M001MasterGelombang::where('status', 1)->first()->id;

        // Query the database once for all needed registration counts and filter by gelombang_id and status
        $registrations = M008StudentRegistration::where('gelombang_id', $gelombang_id)
            ->select('verifikasi', 'status', DB::raw('count(*) as count'))
            ->groupBy('verifikasi', 'status')
            ->get()
            ->groupBy(function ($item) {
                return $item->status == 0 ? 'non_aktif' : $item->verifikasi;
            });

        return [
            null => Tab::make('Daftar')
                ->icon('heroicon-o-users')
                ->badge($registrations[0][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 0)), // pendaftar aktif
            'Verifikasi' => Tab::make()
                ->icon('heroicon-o-check-circle')
                ->badge($registrations[1][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 1)), // verifikasi
            'Validasi' => Tab::make()
                ->icon('heroicon-o-banknotes')
                ->badge($registrations[2][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 2)), // bukti bayar
            'Seleksi' => Tab::make()
                ->icon('heroicon-o-document-text')
                ->badge($registrations[3][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 3)), // hasil berkas offline
            'Diterima' => Tab::make()
                ->icon('heroicon-m-check-badge')
                ->badge($registrations[4][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 4)), // lolos
            'Tunggu' => Tab::make()
                ->icon('heroicon-o-clock')
                ->badge($registrations[5][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 5)), // waiting list
            'Tolak' => Tab::make()
                ->icon('heroicon-o-x-circle')
                ->badge($registrations[6][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 1)->where('verifikasi', 6)), // gagal
            'Non-Aktif' => Tab::make()
                ->icon('heroicon-o-trash')
                ->badge($registrations['non_aktif'][0]->count ?? 0)
                ->query(fn($query) => $query->where('status', 0)), // non-aktif
        ];
    }
}
