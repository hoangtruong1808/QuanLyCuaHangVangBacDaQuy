<?php

namespace App\Imports;

use App\PhysicalProperty;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportsPhysicalProperty implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PhysicalProperty([
            'physical_group' => $row[0], 
            'physical_name' => $row[1], 
            'physical_id' => $row[2],
            'physical_mac_ip_address' => $row[3],
            'physical_department' => $row[4],
            'user' => $row[5],
            'physical_business_process' => $row[6], 
            'physical_property_ownership' => $row[7], 
            'physical_confidentiality' => $row[8],
            'physical_integrity' => $row[9],
            'physical_availability' => $row[10],
            'physical_level_importance' => $row[11],
            'physical_location' => $row[12], 
            'physical_information_security_zone' => $row[13], 
            'physical_status' => $row[14],
            'physical_allowed_bring_outside' => $row[15],
            'physical_scope_of_use' => $row[16],
            'physical_puspose' => $row[17],
            'physical_type_info' => $row[18],
            'physical_os_type' => $row[19],
            'physical_os_lisence' => $row[20],
            'physical_antivirus_type' => $row[21],
            'physical_antivirus_lisence' => $row[22],
            'physical_network' => $row[23],
            'physical_schedual_backup' => $row[24],
            'physical_server_backup' => $row[25],
            'physical_maintains' => $row[26],
            'physical_serial_no' => $row[27],
            'physical_config' => $row[28],
            'physical_purchase_date' => $row[29],
            'physical_price' => $row[30],
            'physical_previous_user' => $row[31],
            'physical_repair_history' => $row[32],
            'physical_description' => $row[33],
            'created_at datetime' => $row[34],
        ]);
    }
}
