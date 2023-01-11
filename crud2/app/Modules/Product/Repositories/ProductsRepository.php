<?php
namespace App\Modules\Product\Repositories;

use App\Models\Product;
use App\Modules\Product\Contracts\ProductRepoInterface;
use App\Repositories\MainRepository;

class ProductsRepository extends MainRepository implements ProductRepoInterface
{
    function model()
    {
        return 'App\Models\Product';
    }


    public function save_products(array $data)
    {
        return Product::create($data);
    }

    public function get_products()
    {
        return Product::all();
    }

    public function get_products_by_id($id)
    {
        return Product::findOrFail($id);
    }

    public function delete_products($id)
    {
        return Product::destroy($id);
    }

    public function update_products($id, array $data)
    {
        return Product::where($id)->update($data);
    }

}
