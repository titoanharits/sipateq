<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $id_bahan
 * @property integer $id_produk
 * @property int $jumlah_bahan
 * @property string $created_at
 * @property string $updated_at
 * @property Produksi $produksi
 * @property BahanBaku $bahanBaku
 */
class DetailProduksi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_produksi';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_bahan', 'id_produksi', 'jumlah_bahan', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produksi()
    {
        return $this->belongsTo('App\Produksi', 'id_produk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bahanBaku()
    {
        return $this->belongsTo('App\JenisBahan', 'id_bahan');
    }
}
html
