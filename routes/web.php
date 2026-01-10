<?php

use App\Jobs\AppInstalledJob;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/app', function () {
    return view('app');
});


Route::get('/auth/callback', function(Request $request) {

    // Verify Shopify HMAC here
    // (The Kyon middleware can do this automatically)

    $shopData = [
        'shopify_domain' => $request->get('shop'),
        'name' => $request->get('name') ?? null,
        'email' => $request->get('email') ?? null,
        'plan_id' => $request->get('plan_id') ?? null,
    ];

    AppInstalledJob::dispatch($shopData);

    return redirect('/'); // or your embedded app dashboard
});