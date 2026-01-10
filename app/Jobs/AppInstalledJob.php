<?php

namespace App\Jobs;

use App\Models\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AppInstalledJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $shopData;

    /**
     * Create a new job instance.
     *
     * @param array $shopData
     */
    public function __construct(array $shopData)
    {
        $this->shopData = $shopData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Save or update the shop in your DB
        $shop = Shop::updateOrCreate(
            ['shopify_domain' => $this->shopData['shop']],
            $this->shopData
        );

        Log::info("Shop installed: " . $this->shopData['shop']);
    }
}
