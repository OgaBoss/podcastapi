<?php
/**
 * Created by PhpStorm.
 * User: adebayooluwadamilola
 * Date: 8/30/17
 * Time: 1:49 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

class FractalServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $fractal = $this->app->make('League\Fractal\Manager');

        response()->macro('item', function ($item,  TransformerAbstract $transformer, $status = 200, array $headers = []) use ($fractal) {
            $resource = new Item($item, $transformer);

            return response()->json(
                $fractal->createData($resource)->toArray(),
                $status,
                $headers
            );
        });

        response()->macro('collection', function ($collection, TransformerAbstract $transformer, $status = 200, array $headers = []) use ($fractal) {
            $resource = new Collection($collection, $transformer);

            return response()->json(
                $fractal->createData($resource)->toArray(),
                $status,
                $headers
            );
        });
    }
}