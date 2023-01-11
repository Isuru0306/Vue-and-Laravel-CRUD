<?php

namespace App\Modules\Product\Contracts;
use App\Contracts\MainRepositoryInterface;

interface ProductRepoInterface extends MainRepositoryInterface
{

    public function save_products(array $data);
    public function get_products();
    public function get_products_by_id($id);
    public function delete_products($id);
    public function update_products($id, array $data);
}

