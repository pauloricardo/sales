<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 09/12/2015
 * Time: 23:25
 */

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepositoryEloquent;
use CodeDelivery\Services\ProductService;


class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;
    private $productService;

    public function __construct(ProductRepositoryEloquent $repository, CategoryRepository $categoryRepository, ProductService $productService){
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
    }
    public function index()
    {
        $model = $this->repository->model();
        $products = $model::orderBy('id','desc')->paginate(8);
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $categories = $this->categoryRepository->lists(['name', 'id']);

        return view('admin.products.create', compact('categories'));
    }
    public function store(\CodeDelivery\Http\Requests\ProductRequest $request){
        $this->productService->create($request->all());

        return redirect()->route('admin.products.index');
    }
    public function edit($id){
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists(['name', 'id']);

        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update($id, \CodeDelivery\Http\Requests\ProductRequest $request){
        $this->productService->update($request->all(), $id);
        return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        $product = $this->repository->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

    public function show($id){
        $produto = $this->repository->find($id);
        return view('admin.products.show', compact('produto'));
    }
}