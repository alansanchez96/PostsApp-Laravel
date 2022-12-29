<?php

namespace Src\Categories\Infrastructure\Eloquent\Repositories;

use Src\Categories\Domain\ValueObjects\CategoryId;
use Src\Categories\Domain\ValueObjects\CategorySlug;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;
use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class CategoryRepository implements CategoryRepositoryContract
{
    private CategoryModel $model;

    public function __construct()
    {
        $this->model = new CategoryModel;
    }

    public function getAllCategories()
    {
        return $this->model->all();
    }

    public function getCategory($slug)
    {
        $slug = (new CategorySlug($slug))->value();
        $objectModel = $this->model->firstWhere('slug', $slug);
        $id = (new CategoryId($objectModel->id))->value();

        return $this->model->findOrFail($id);
    }

    public function save($reqName, $reqSlug, int $id = null)
    {
        $objectId = (new CategoryId($id))->value();
        $objectModel = $this->model->find($objectId);

        if (is_null($objectModel)) {
            $this->model->create([
                'name' => $reqName,
                'slug' => $reqSlug
            ]);
        } else {
            $objectModel->update([
                'name' => $reqName,
                'slug' => $reqSlug
            ]);
        }
    }

    public function deleteCategory(int $id)
    {
        $objectId = (new CategoryId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
    }
}
