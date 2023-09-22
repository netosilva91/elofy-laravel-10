<?php

namespace App\Http\Controllers\Api\Feedback;

use App\DTO\Feedbacks\CreateFeedbackDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFeedback;
use App\Http\Resources\FeedbackResource;
use App\Services\FeedbackService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct(
        protected FeedbackService $service,
    ) {}

    public function index(Request $request)
    {
        $feedbacks = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 10),
            filter: $request->get('type', null),
        );

        return FeedbackResource::collection($feedbacks->items())->additional(
            [
                'meta' => [
                    'total' => $feedbacks->total(),
                    'is_first_page' => $feedbacks->isFirstPage(),
                    'is_last_page' => $feedbacks->isLastPage(),
                    'current_page' => $feedbacks->currentPage(),
                    'next_page' => $feedbacks->getNumberNextPage(),
                    'previous_page' => $feedbacks->getNumberPreviousPage(),
                ]
            ]
        );
    }

    public function store(StoreUpdateFeedback $request)
    {
        // dd($request);
        $feedback = $this->service->new(
            CreateFeedbackDTO::makeFromRequest($request)
        );

        return new FeedbackResource($feedback);
    }
}
