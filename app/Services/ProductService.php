<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 13/01/2016
 * Time: 18:33
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ProductRepositoryEloquent;
use Illuminate\Support\Facades\Input;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepositoryEloquent $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(array $data)
    {
        $file = Input::file('image');
        if (!is_null($file)) {
            if ($file->isValid()) {
                $pasta = 'uploads/produtos';
                $extension = $file->getClientOriginalExtension();
                $filename = rand(1111, 9999) . '.' . $extension;
                $file->move($pasta, $filename);
                $data['foto'] = $filename;
                unset($data['image']);
                $this->productRepository->create($data);
            }
        }else{
            $this->productRepository->create($data);
        }
    }
    public function update(array $data, $id){
        $file = Input::file('image');
        if (!is_null($file)) {
            if ($file->isValid()) {
                $pasta = 'uploads/produtos';
                $extension = $file->getClientOriginalExtension();
                $filename = rand(1111, 9999) . '.' . $extension;
                $file->move($pasta, $filename);
                $data['foto'] = $filename;
                unset($data['image']);
                $this->productRepository->update($data, $id);
            }
        }else{
            $this->productRepository->update($data, $id);
        }
    }

    }