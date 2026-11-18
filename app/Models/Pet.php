<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
   use HasFactory;

   // Pets only need the user_id when creating a record.
   protected $fillable = [
      'user_id',
      'name',
      'type',
      ];

   public function user(): BelongsTo
   {
      
      return $this->belongsTo(User::class, 'user_id'); //one-to-many relationship with the User model, where each pet belongs to a single user, and the foreign key is 'user_id' in the pets table.
   }
}
