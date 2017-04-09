<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Events\Album;
use Hifone\Models\AlbumPhoto;

final class AlbumPhotoWasRemovedEvent implements AlbumPhotoEventInterface
{

    public function __construct(AlbumPhoto $photo)
    {
        $this->photo = $photo;
    }
}
