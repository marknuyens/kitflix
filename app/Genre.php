<?php

namespace App;

enum Genre: string {
    case ACTION          = 'Action';
    case ADVENTURE       = 'Adventure';
    case COMEDY          = 'Comedy';
    case DRAMA           = 'Drama';
    case FANTASY         = 'Fantasy';
    case HORROR          = 'Horror';
    case MYSTERY         = 'Mystery';
    case ROMANCE         = 'Romance';
    case SCIENCE_FICTION = 'Science Fiction';
    case THRILLER        = 'Thriller';
    case CRIME           = 'Crime';
    case DOCUMENTARY     = 'Documentary';
    case BIOGRAPHY       = 'Biography';
    case HISTORICAL      = 'Historical';
    case MUSICAL         = 'Musical';
    case ANIMATION       = 'Animation';
    case FAMILY          = 'Family';
    case WAR             = 'War';
    case WESTERN         = 'Western';
    case SUPERHERO       = 'Superhero';

    /**
     * Get a random genre.
     *
     * @return self
     */
    public static function random(): self
    {
        $count = count(self::cases()) - 1;
        return self::cases()[rand(0, $count)];
    }
}
