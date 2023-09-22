<?php

namespace App\DTO\Feedbacks;

use App\Http\Requests\StoreUpdateFeedback;

class UpdateFeedbackDTO {

    public function __construct(
        public string $id,
        public string $user_id = auth()->user()->id,
        public string $message,
    ) {}

    public static function makeFromRequest(StoreUpdateFeedback $request, string $id = null): self {
        return new self(
            $id ?? $request->id,
            $request->user_id,
            $request->message
        );
    }
}
