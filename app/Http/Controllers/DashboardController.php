<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepositoryEloquent;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryEloquent $order){
        $this->orderRepository = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderModel = $this->orderRepository->model();
        $orders = $orderModel::orderBy('id','desc')->paginate(10);
        return view('admin.dashboard.index',compact('orders'));
    }
}
