<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalProperty extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'physical_group', 'physical_name', 'physical_id', 'physical_mac_ip_address', 'physical_department', 'user',
        'physical_business_process', 'physical_property_ownership', 'physical_confidentiality', 'physical_integrity',
        'physical_availability', 'physical_level_importance', 'physical_location', 'physical_information_security_zone', 'physical_status',
        'physical_allowed_bring_outside', 'physical_scope_of_use', 'physical_puspose', 'physical_type_info', 'physical_os_type',
        'physical_os_lisence', 'physical_antivirus_type', 'physical_antivirus_lisence', 'physical_network', 'physical_schedual_backup',
        'physical_server_backup', 'physical_maintains', 'physical_serial_no', 'physical_config', 'physical_purchase_date', 'physical_price',
        'physical_previous_user', 'physical_repair_history', 'physical_description', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'id';
    protected $table = 'tbl_physical_property';

    public function PhysicalGroup() {
        return $this->hasOne(PhysicalGroup::class);
    }
}
