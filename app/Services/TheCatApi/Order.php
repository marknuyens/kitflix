<?php

namespace App\Services\TheCatApi;

enum Order: string {
    case RANDOM = 'RAND';
    case ASCENDING = 'ASC';
    case DESCENDING = 'DESC';
}
