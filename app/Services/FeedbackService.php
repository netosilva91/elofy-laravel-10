<?php

namespace App\Services;

use App\DTO\Feedbacks\CreateFeedbackDTO;
use App\DTO\Feedbacks\UpdateFeedbackDTO;
use App\Repositories\FeedbackRepositoryInterface;
use stdClass;

class FeedbackService {

    public function __construct(
        protected FeedbackRepositoryInterface $repository
    ) {}

    public function paginate(
        int $page = 1,
        int $totalPerPage = 10,
        string $filter = null,
    ) {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function getAll(string $filter = null): array {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null {
        return $this->repository->findOne($id);
    }

    public function new(CreateFeedbackDTO $dto): stdClass {
        return $this->repository->new($dto);
    }

    public function update(UpdateFeedbackDTO $dto): stdClass|null {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void {
        $this->repository->delete($id);
    }

}
