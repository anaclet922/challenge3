<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ImageModel extends Model
{
    protected $table = 'tbl_images';
    protected $allowedFields = [
        'ImageId',
        'AlbumId',
        'Title',
        'ImageURL',
        'Created_at',
        'Updated_at',     
    ];
    protected $primaryKey = 'ImageId';
    protected $createdField  = 'Created_at';
    protected $updatedField = 'Updated_at';

}
