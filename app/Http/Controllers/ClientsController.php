<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\ClientRepositoryEloquent;
use CodeDelivery\Repositories\UserRepositoryEloquent;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{

    private $repository;
    private $userRepository;
    private $clientService;

    public function __construct(ClientRepositoryEloquent $repository, UserRepositoryEloquent $userRepository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\ClientRequest $request)
    {
        $model = $this->repository->model();

        if (empty($request->all())) {
            $clients = $model::orderBy('id', 'desc')->paginate(8);
        } else {
            $data = $request->all();
            $data = array_filter($data);
            unset($data['_token']);

            $clients = $model::whereHas('user', function ($q) use ($data) {
                foreach ($data as $key => $value) {
                    $q->where($key, 'like', '%' . $value . '%');
                }
            })->orderBy('id', 'desc')->paginate(8);
        }
        return view('admin.clients.index', compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->lists(['name', 'id']);

        return view('admin.clients.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(\CodeDelivery\Http\Requests\ClientRequest $request)
    {
        $this->clientService->create($request->all());

        return redirect()->route('admin.clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->repository->find($id);
        return view('admin.clients.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = $this->repository->find($id);
        $users = $this->userRepository->lists(['name', 'id']);

        return view('admin.clients.edit', compact('client', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ClientRequest $request, $id)
    {
        $this->clientService->update($request->all(), $id);

        return redirect()->route('admin.clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = $this->repository->find($id);
        $client->delete();
        return redirect()->route('admin.clients.index');

    }
}
