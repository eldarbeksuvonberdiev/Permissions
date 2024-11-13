<?php

namespace App\Jobs;

use App\Models\Car;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateCar implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i=0; $i < 300000 ; $i++) { 
            Car::create([
                'name' => $this->data['name'].$i,
                'model' => $this->data['model'].$i,
                'year' => $this->data['year']
            ]);
        }
    }
}
