<?php

namespace App\Repositories;

use App\DTO\Feedbacks\CreateFeedbackDTO;
use App\DTO\Feedbacks\UpdateFeedbackDTO;
use stdClass;

interface FeedbackRepositoryInterface {

    public function paginate(
        int $page = 1,
        int $totalPerPage = 10,
        string $filter = null
    ): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function new(CreateFeedbackDTO $dto): stdClass;
    public function update(UpdateFeedbackDTO $dto): stdClass|null;
    public function delete(string $id): void;

}
