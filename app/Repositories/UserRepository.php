<?php

namespace App\Repositories\Posting;

use App\Models\Posting\Posting;
use App\Repositories\BaseRepository;

class PostingRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(app());
    }

    public function getFieldsSearchable(): array
    {
        return [
            'company_name',
            'location',
        ];
    }

    public function model(): string
    {
        return Posting::class;
    }

    public function getPosting(): mixed
    {
        return $this->all();
    }

    public function getPostingEdit(): mixed
    {
        return null;
    }

    public function updatePosting(): mixed
    {
        return null;
    }

    public function deletePosting(): mixed
    {
        return null;
    }

}
