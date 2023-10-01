<?php
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'merchant_id'=>env("MERCHANT_ID"),
    'client_key'=>env("CLIENT_KEY"),
    'server_key'=>env('SERVER_KEY')
];