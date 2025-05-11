<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * Main Article class definition
 *
 * @property int $id basic article id
 * @property string $role article title
 * @property string $tags article tags
 * @property string $text article description or text
 * @property string $user_id id of creator
 * @property string $created_at when created
 * @property string $updated_at when updated
 */
class Article extends Model
{
	use HasFactory;
}
