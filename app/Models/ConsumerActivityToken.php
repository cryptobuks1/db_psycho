<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Consumer;

class ConsumerActivityToken extends Model
{
    protected $table = "ConsumerActivityTokens";

    protected $primaryKey = "id";

    protected $fillable = ['token', 'email_new', 'email_issue', 'consumer_id', 'status_n','action_id'];

    public function consumer()
    {
        return $this->BelongsTo('App\Models\Consumer', 'consumer_id', 'id');
    }

    public function systemOperations()
    {
        return $this->BelongsTo('App\Models\SystemOperation', 'action_id', 'id');
    }
}
