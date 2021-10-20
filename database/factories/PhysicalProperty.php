<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PhysicalProperty;
use App\PhysicalGroup;
use Faker\Generator as Faker;

$factory->define(PhysicalProperty::class, function (Faker $faker) {
    return [
        'physical_group' => function() {
            return factory(PhysicalGroup::class)->create()->id;
        },
        'physical_name' => $faker->physical_name,
        'physical_id' => $faker->physical_id,
        'phphysical_idysical_mac_ip_address' => $faker->phphysical_idysical_mac_ip_address,
        'physical_department' => $faker->physical_department,
        'user' => $faker->user,
        'physical_business_process' => $faker->physical_business_process,
        'physical_property_ownership' => $faker->physical_property_ownership,
        'physical_confidentiality' => $faker->physical_confidentiality,
        'physical_integrity' => $faker->physical_integrity,
        'physical_availability' => $faker->physical_availability,
        'physical_level_importance' => $faker->physical_level_importance,
        'physical_location' => $faker->physical_location,
        'physical_information_security_zone' => $faker->physical_information_security_zone,
        'physical_status' => $faker->physical_status,
        'physical_allowed_bring_outside' => $faker->physical_allowed_bring_outside,
        'physical_scope_of_use' => $faker->physical_scope_of_use,
        'physical_puspose' => $faker->physical_puspose,
        'physical_type_info' => $faker->physical_type_info,
        'physical_os_type' => $faker->physical_os_type,
        'physical_os_lisence' => $faker->physical_os_lisence,
        'physical_antivirus_type' => $faker->physical_antivirus_type,
        'physical_antivirus_lisence' => $faker->physical_antivirus_lisence,
        'physical_network' => $faker->physical_network,
        'physical_schedual_backup' => $faker->physical_schedual_backup,
        'physical_server_backup' => $faker->physical_server_backup,
        'physical_maintains' => $faker->physical_maintains,
        'physical_serial_no' => $faker->physical_serial_no,
        'physical_purchase_date' => $faker->physical_purchase_date,
        'physical_price' => $faker->physical_price,
        'physical_previous_user' => $faker->physical_previous_user,
        'physical_repair_history' => $faker->physical_repair_history,
        'physical_description' => $faker->physical_description,
    ];
});
