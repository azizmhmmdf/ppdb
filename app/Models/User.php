<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Document;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'nisn',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'asal_sekolah',
        'tahun_lulus',
        'agama',
        'jurusan',
        'catatan',
        'tanggal_wawancara',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function document()
    {
        return $this->hasOne(Document::class, 'id_user', 'id');
    }

    public function wawancara()
    {
        return $this->hasOne(wawancara::class, 'id_wawancara', 'id');
    }

    public function FormatTanggal(){
        return Carbon::parse($this->attributes['tanggal_wawancara'])->translatedFormat('I, D F Y');
    }
}
