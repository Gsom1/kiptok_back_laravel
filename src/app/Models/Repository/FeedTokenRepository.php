<?php


namespace App\Models\Repository;


use App\Models\FeedCursor;
use Ramsey\Uuid\Uuid;

class FeedTokenRepository extends AbstractRepository
{
    private $model;

    public function __construct(FeedCursor $model)
    {
        $this->model = $model;
    }

    public function create(): FeedCursor
    {
        $cursor = new FeedCursor();
        $cursor->id = Uuid::uuid4();
        $cursor->from = 0;
        $cursor->to = 0;
        $cursor->single = [];

        return $cursor;
    }

    public function findById(string $id): ?FeedCursor
    {
        return $this->model->where(FeedCursor::FIELD_ID, $id)->first();
    }
}
