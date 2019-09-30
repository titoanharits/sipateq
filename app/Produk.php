<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $nama_produk
 * @property Produksi[] $produksis
 */
class Produk extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'produk';

    /**
     * @var array
     */
    protected $fillable = ['nama_produk'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produksis()
    {
        return $this->hasMany('App\Produksi', 'id_produk');
    }
}
