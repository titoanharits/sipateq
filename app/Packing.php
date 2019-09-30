<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $produk_id
 * @property string $tgl_expired
 * @property string $tgl_produksi
 * @property string $created_at
 * @property string $updated_at
 * @property Produk $produk
 * @property StokProduk[] $stokProduks
 */
class Packing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packing';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_produksi', 'tgl_expired', 'tgl_produksi', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produksi()
    {
        return $this->belongsTo('App\Produksi', 'id_produksi');
    }

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stokProduk()
    {
        return $this->hasMany('App\StokProduk');
    }
}
