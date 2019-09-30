<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $jenisbahan_id
 * @property string $Pemasok
 * @property int $stok
 * @property string $created_at
 * @property string $updated_at
 * @property Jenisbahan $jenisbahan
 * @property Produksi[] $produksis
 */
class BahanBaku extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bahan_baku';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['jenisbahan_id', 'Pemasok', 'stok', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisbahan()
    {
        return $this->belongsTo('App\Jenisbahan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produksis()
    {
        return $this->hasMany('App\Produksi', 'id_bahan');
    }
}
