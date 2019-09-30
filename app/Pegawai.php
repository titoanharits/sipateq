<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nama
 * @property string $domisili
 * @property string $jenis_kelamin
 * @property string $no_hp
 * @property string $foto_ktp
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Pegawai extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pegawai';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'nama', 'domisili', 'jenis_kelamin', 'no_hp', 'foto_ktp', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
