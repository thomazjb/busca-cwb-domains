<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Domain;
use Carbon\Carbon;

class UpdateExpiredDomains extends Command
{
    protected $signature = 'domains:update-expired';
    protected $description = 'Atualiza o status de domínios expirados diariamente';

    public function handle()
    {
        $today = Carbon::now()->format('Y-m-d');

        $updated = Domain::where('expire_in', '<', $today)
            ->where('status', 'Ativo') // Apenas os ativos
            ->update(['status' => 'Expirado']);

        $this->info("Domínios atualizados: {$updated}");
    }
}
