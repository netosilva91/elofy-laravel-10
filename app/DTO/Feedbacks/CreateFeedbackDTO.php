<?php

namespace App\DTO\Feedbacks;

use App\Http\Requests\StoreUpdateFeedback;
use App\Models\User;

class CreateFeedbackDTO {

    public function __construct(
        public string $user_id,
        public string $message,
    ) {}

    public static function makeFromRequest(StoreUpdateFeedback $request): self {
        return new self(
            auth()->user()->id,
            $request->message
        );
    }
}
