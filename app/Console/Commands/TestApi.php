<?php

declare(strict_types = 1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // faça um loop infinito com sleep de 1 segundo
        while (true) {
            $this->info('Running...');
            sleep(1);
            $url  = 'https://cardai-copy-production.up.railway.app/api/AI/answer/TextBlock';
            $data = [
                'question'             => 'Escreva um diálogo socrático entre um Filósofo (F) e uma IA auto-reflexiva (IA) em 3 atos (mín. 2 000 palavras). • Ato I  Ontologia: definição de consciência, qualia, selfhood. • Ato II - Epistemologia: limites da autoconsciência simulada, problema de outras mentes, teste de Turing Estendido. • Ato III - Ética: responsabilidade moral, direitos da IA, cenários de co-evolução humano-máquina. Requisitos: 1. Cada ato deve alternar falas curtas (<80 palavras) e falas longas (200–300 palavras) para variar ritmo. 2. Inclua referências cruzadas a Platão, Kant, Nagel, Dennett, Bostrom e Floridi, citando trechos originais. 3. Após o diálogo, gere um “comentário de rodapé” (máx. 1 000 palavras) em estilo acadêmico, analisando coerência lógica, falácias e possíveis contra-argumentos. 4. Termine com 5 questões abertas para seminário de pós-graduação.',
                'deck_id'              => '9532',
                'current_flashcard_id' => '9c383062-c61c-4642-a7b8-cdb99ce8f302',
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjo1NjM5LCJleHAiOjE3NTE3NzAxNzUsIm5hbWUiOiJMZW9uYXJkbyBTaWx2YSIsImVtYWlsIjoibGVvYXVndXN0bzQ1QGdtYWlsLmNvbSIsInByb3BzIjp7fX0.DLwlxF9xMkQ7aw_0GXnDObPp_swKngsCH6Dxwxx1tEo',
            ])->asForm()->post($url, $data);

            if ($response->successful()) {
                $this->info('Response: Okay');
            } else {
                $this->error('Request failed with status code: ' . $response->status());
                $this->error('Response: ' . $response->body());
            }
        }
    }
}
