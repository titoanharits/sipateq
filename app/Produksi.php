<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $id_produk
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property int $jumlah_produksi
 * @property string $created_at
 * @property string $updated_at
 * @property Produk $produk
 * @property DetailProduksi[] $detailProduksis
 * @property Packing[] $packings
 */
class Produksi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produksi';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_produk', 'tgl_mulai', 'tgl_selesai', 'jumlah_produksi','status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailProduksis()
    {
        return $this->hasMany('App\DetailProduksi', 'id_produksi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packings()
    {
        return $this->hasMany('App\Packing', 'produk_id');
    }
}
