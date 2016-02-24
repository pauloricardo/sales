<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 09/12/2015
 * Time: 23:25
 */

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\ProductRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepositoryEloquent;
use CodeDelivery\Services\ProductService;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;
    private $productService;

    public function __construct(ProductRepositoryEloquent $repository, CategoryRepository $categoryRepository, ProductService $productService)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
    }

    /**
     *  Retorna os produtos do banco de dados
     */
    public function getProducts($page)
    {
        $model = $this->repository->model();

        $resultados = $model::with('Category')->get();

        $produtos = [
            'number_rows' => $model::all()->count(),
            'data' => $resultados
        ];
        return response()->json($produtos);
    }

    public function index(ProductRequest $request)
    {
        $model = $this->repository->model();
        if (empty($request->all())) {
            $products = $model::orderBy('id', 'desc')->paginate(8);
        } else {
            $data = $request->all();
            $data = array_filter($data);
            unset($data['_token']);

            $filter = array();
            foreach ($data as $key => $value) {
                $filter[$key] = $value;
            }
            $products = $model::where($filter)->orderBy('id', 'desc')->paginate(8);
        }

        $categories = $this->categoryRepository->lists(['name', 'id'])->toArray();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->lists(['name', 'id']);

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->productService->create($request->all());

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->lists(['name', 'id']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update($id, ProductRequest $request)
    {
        $this->productService->update($request->all(), $id);
        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = $this->repository->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
        $produto = $this->repository->find($id);
        return view('admin.products.show', compact('produto'));
    }
}