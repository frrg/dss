<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $response)
    {
        $response->macro('jsonApi',function($code = 200,$message= '',$data = null) use($response){
            $format = [
                'code' => $code,
                'message' => $message,
                'data' => $data
            ];   
            return $response->make($format);
        });
    }
}
