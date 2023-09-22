<?php

namespace App\Repositories;

use App\DTO\Feedbacks\CreateFeedbackDTO;
use App\DTO\Feedbacks\UpdateFeedbackDTO;
use App\Models\Feedback;
use App\Repositories\FeedbackRepositoryInterface;
use stdClass;

class FeedbackEloquentORM implements FeedbackRepositoryInterface {

    public function __construct(
        protected Feedback $model
    ){}

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null,
    ): PaginationInterface {
        $results = $this->model
                    ->join('users', 'users.id', '=', 'feedbacks.user_id')
                    ->where(function ($query) use ($filter){
                        if($filter) {
                            $query->where('users.type', $filter);
                        }
                    })
                    ->paginate($totalPerPage, ["*"], 'page', $page);
        return new PaginationPresenter($results);
    }

    public function getAll(string $filter = null): array {
        return $this->model
                    ->join('users', 'users.id', '=', 'feedbacks.user_id')
                    ->where(function ($query) use ($filter){
                        if($filter) {
                            $query->where('users.type', $filter);
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id): stdClass|null {
        $feedback = $this->model->find($id);

        if(!$feedback) {
            return null;
        }

        return (object) $feedback->toArray();
    }

    public function delete(string $id): void {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateFeedbackDTO $dto): stdClass {
        $feedback = $this->model->create(
            (array) $dto
        );

        return (object) $feedback->toArray();
    }

    public function update(UpdateFeedbackDTO $dto): stdClass|null {
        if(!$feedback = $this->model->find($dto->id)){
            return null;
        }
        $feedback->update(
            (array) $dto
        );

        return (object) $feedback->toArray();
    }

}
