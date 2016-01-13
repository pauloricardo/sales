<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 09/12/2015
 * Time: 23:25
 */

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;


class CategoriesController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }
    public function index()
    {
        $model = $this->repository->model();
        $categories = $model::orderBy('id','desc')->paginate(8);
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }
    public function store(\CodeDelivery\Http\Requests\CategoryRequest $request){
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }
    public function edit($id){
        $category = $this->repository->find($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update($id, \CodeDelivery\Http\Requests\CategoryRequest $request){
        $this->repository->find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }
    public function delete($id)
    {
        $category = $this->repository->find($id)->delete();
        return redirect()->route('admin.categories.index');


    }
}