<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'company_interest_id' => 1,
            'documentType' => 'proposal',
            'documentName' => 'Proposal Kerja',
            'pathUrl' => 'example.pdf',
            'mime' => 'application/pdf' 
        ]);
    }
}
