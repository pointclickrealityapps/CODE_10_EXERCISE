<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    /**
     * @param Request $request
     * @param JsonResource|string $instanceOrClass
     * @param mixed|null $model
     * @return MergeValue|mixed
     */
    public function mergeResource($request, $instanceOrClass, $model = null)
    {
        return $this->mergeResourceWhen(true, $request, $instanceOrClass, $model);
    }

    /**
     * @param bool $condition
     * @param Request $request
     * @param JsonResource|string $instanceOrClass
     * @param mixed|null $model
     * @return MergeValue|mixed
     */
    public function mergeResourceWhen($condition, $request, $instanceOrClass, $model = null)
    {
        return $this->mergeResourcesWhen($condition, $request, [$instanceOrClass], $model);
    }

    /**
     * @param bool $condition
     * @param Request $request
     * @param JsonResource[]|string[] $instancesOrClasses
     * @param mixed|null $model
     * @return MergeValue|mixed
     */
    public function mergeResourcesWhen($condition, $request, $instancesOrClasses, $model = null)
    {
        return $this->mergeWhen($condition, function () use ($request, $instancesOrClasses, $model) {
            return array_merge(...array_map(function ($instanceOrClass) use ($model, $request) {
                if ($instanceOrClass instanceof JsonResource) {
                    if ($model) {
                        throw new RuntimeException('$model is specified but not used.');
                    }
                } else {
                    $instanceOrClass = new $instanceOrClass($model ?? $this->resource);
                }
                return $instanceOrClass->toArray($request);
            }, $instancesOrClasses));
        });
    }

    /**
     * @param Request $request
     * @param JsonResource[]|string[] $instancesOrClasses
     * @param mixed|null $model
     * @return MergeValue|mixed
     */
    public function mergeResources($request, $instancesOrClasses, $model = null)
    {
        return $this->mergeResourcesWhen(true, $request, $instancesOrClasses, $model);
    }

}
