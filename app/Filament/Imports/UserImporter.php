<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('salutation')->rules(['required']),
            ImportColumn::make('name')->rules(['required']),
            ImportColumn::make('email')->rules(['required']),
            ImportColumn::make('telephone')->rules(['required']),
            ImportColumn::make('company')->rules(['required']),
            ImportColumn::make('job')->rules(['required']),
            ImportColumn::make('interest')->rules(['required']),
        ];
    }

    public function resolveRecord(): ?User
    {
        if (User::where('email', $this->data['email'])->exists()) {
            return null; // tidak disimpan
        }

        return User::firstOrNew([
            'salutation'        => $this->data['salutation'] ?? 'Mr.',
            'name'              => $this->data['name'] ?? null,
            'email'             => $this->data['email'] ?? null,
            'email_verified_at' => $this->data['email_verified_at'] ?? null,
            'role_id'           => $this->data['role_id'] ?? 'user',
            'telephone'         => $this->data['telephone'] ?? null,
            'company'           => $this->data['company'] ?? null,
            'job'               => $this->data['job'] ?? null,
            'interest'          => $this->data['interest'] ?? null,
            'password'          => $this->data['password'] ?? 'password',
            'barcode'           => $this->generateBarcode(),
            'created_at'        => $this->generateCreatedAt(),
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your user import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    private function generateBarcode()
    {
        $barcode = rand(100000000, 999999999);
        while (User::where('barcode', $barcode)->exists()) {
            $barcode = rand(100000000, 999999999);
        }
        return $barcode;
    }

    protected function generateCreatedAt(): \Carbon\Carbon
    {
        // Random time between 08:00 and 20:00 today
        $start = now()->setTime(8, 0);
        $end = now()->setTime(20, 0);

        return $start->copy()->addSeconds(rand(0, $end->diffInSeconds($start)));
    }
}
