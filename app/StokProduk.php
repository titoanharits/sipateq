<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $packing_id
 * @property int $ukuran_kemasan
 * @property int $stok_pakan
 * @property string $created_at
 * @property string $updated_at
 * @property Packing $packing
 */
class StokProduk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'stok_produk';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['packing_id', 'ukuran_kemasan', 'stok_pakan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packing()
    {
        return $this->belongsTo('App\Packing');
    }
}
