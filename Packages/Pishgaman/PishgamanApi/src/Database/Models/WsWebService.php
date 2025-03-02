<?php

namespace Pishgaman\PishgamanApi\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WsWebService extends Model
{
    use HasFactory;

    public function accesses(): HasMany
    {
        return $this->hasMany(WsWebServiceAccess::class, 'id', 'web_service_id')->with('user');
    }
}
