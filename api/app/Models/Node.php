<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Node
 *
 * @property int $id
 * @property string $mac
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereMac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $netboot
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereNetboot($value)
 * @property string|null $arch
 * @property int|null $cpus
 * @property int|null $cpu_max_freq
 * @property int|null $ram_max
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereArch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereCpuMaxFreq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereCpus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereRamMax($value)
 * @property int $online
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereOnline($value)
 * @property string|null $hostname
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereHostname($value)
 * @property int $netbooted
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereNetbooted($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Operation[] $operations
 * @property-read int|null $operations_count
 * @property string $storage_devices
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Node whereStorageDevices($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Operation[] $pendingOperations
 * @property-read int|null $pending_operations_count
 */
class Node extends BaseModel
{
    protected $table = 'nodes';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ip' => 'string',
        'mac' => 'string',
        'netboot' => 'bool',
        'hostname' => 'string',
        'netbooted' => 'bool',
        'online' => 'bool',
        'storage_devices' => 'array'
    ];

    /**
     * @return HasMany
     */
    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }

    /**
     * @return HasMany
     */
    public function pendingOperations(): HasMany
    {
        return $this->operations()->whereNull('finished_at');
    }
}
