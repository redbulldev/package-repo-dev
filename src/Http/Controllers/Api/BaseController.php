<?php

namespace Rebbull\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BaseController extends ApiController
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = $this->model->all(['name']);

        return $this->respond([
            'models' => $models
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model->store($request->all());

        return $this->respondCreated();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->model->show($id, ['name']);

        return $this->respond([
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->model->update($id, $request->all());

        return $this->respondUpdated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->destroy($id);

        return $this->respondNoContent();
    }

    /**
     * Get all trashed models.
     *
     * @return Collection
     */
    public function allTrashed()
    {
        $model = $this->model->allTrashed();

        return $this->respond([
            'model' => $model
        ]);
    }

    /**
     * Find trashed model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findTrashedById($id)
    {
        $model = $this->model->findTrashedById($id);

        return $this->respond([
            'model' => $model
        ]);
    }

    /**
     * Find only trashed model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findOnlyTrashedById($id)
    {
        $model = $this->model->findOnlyTrashedById($id);

        return $this->respond([
            'model' => $model
        ]);
    }

    /**
     * Restore model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function restoreById($id)
    {
        $model = $this->model->restoreById($id);

        return $this->respond([
            'model' => $model
        ]);
    }

    /**
     * Permanently delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function permanentlyDeleteById($id)
    {
        $model = $this->model->permanentlyDeleteById($id);

        return $this->respondNoContent();
    }
}
