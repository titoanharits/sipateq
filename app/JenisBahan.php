<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nama_bahan
 * @property string $created_at
 * @property string $updated_at
 * @property BahanBaku[] $bahanBakus
 */
class JenisBahan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'jenisbahan';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nama_bahan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bahanBakus()
    {
        return $this->hasMany('App\BahanBaku');
    }
}
