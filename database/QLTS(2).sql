
/* --------------------------------------------- MASTER DATA -----------------------------------------------------------------*/

/* Ngọc */

create table tbl_antivirus (atv_id int not null AUTO_INCREMENT primary key, atv_name varchar(500), status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- frequency: tần xuất backup
create table tbl_backup (backup_id int NOT NULL AUTO_INCREMENT primary key, backup_frequency varchar(500), status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng bảo trì bảo dưỡng
create table tbl_maintains (maintains_id int NOT NULL AUTO_INCREMENT primary key, maintains_frequency varchar(500), status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table tbl_risk_methods (rmet_id int NOT NULL AUTO_INCREMENT primary key, rmet_method varchar(500), status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng khả năng xảy ra
-- evaluate: điểm đánh giá đạt được
create table tbl_possibility (pos_id int NOT NULL AUTO_INCREMENT primary key, pos_evaluate int, status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng tác động
create table tbl_impact (impact_id int NOT NULL AUTO_INCREMENT primary key, impact_evaluate float, status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng tiêu chí chấp nhân rủi ro
create table tbl_risk_acceptance_criteria (ract_id int NOT NULL AUTO_INCREMENT primary key, ract_evaluate float, status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng quá trình nghiệp vụ
create table tbl_business_process (bproc_id int NOT NULL AUTO_INCREMENT primary key, bproc_name varchar(500), status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng đặc tính tài sản
-- type = 1 => Confidentiality (C) / type = 2 => Integrity (I) / type = 3 => Availability (A)
create table tbl_property_characteristics (pchar_id int NOT NULL AUTO_INCREMENT primary key, pchar_evaluate int, pchar_description varchar(500), pchar_type int, status int DEFAULT 1, created_at datetime DEFAULT now(), updated_at datetime ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/* End Ngọc */

/* Trường */

/* tbl_department*/
CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/* tbl_nhomtaisanphanmem */
CREATE TABLE `tbl_software_group` (
  `software_id` int(11) NOT NULL,
  `software_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_software_group`
  ADD PRIMARY KEY (`software_id`);

ALTER TABLE `tbl_software_group`
  MODIFY `software_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


/*tbl_information_group */
CREATE TABLE `tbl_information_group` (
  `information_id` int(11) NOT NULL,
  `information_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_information_group`
  ADD PRIMARY KEY (`information_id`);

ALTER TABLE `tbl_information_group`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*tbl_service_group */
CREATE TABLE `tbl_service_group` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_service_group`
  ADD PRIMARY KEY (`service_id`);

ALTER TABLE `tbl_service_group`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*tbl_status */
CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*tbl_hedieuhanh */
CREATE TABLE `tbl_operating_system` (
  `os_id` int(11) NOT NULL,
  `os_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_operating_system`
  ADD PRIMARY KEY (`os_id`);

ALTER TABLE `tbl_operating_system`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/* End Trường */

/* Hoàng */
/* Bảng Hình thức sở hữu */
CREATE TABLE `tbl_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_owner` varchar(255) NOT NULL,
  `owner_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`);

ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;



/* Bảng Dạng tồn tại */
CREATE TABLE `tbl_form` (
  `form_id` int(11) NOT NULL,
  `form_form` varchar(255) NOT NULL,
  `form_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_form`
  ADD PRIMARY KEY (`form_id`);

ALTER TABLE `tbl_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



/* Bảng Mức độ bảo mật */
CREATE TABLE `tbl_security` (
  `scr_id` int(11) NOT NULL,
  `scr_type` varchar(255) NOT NULL,
  `scr_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_security`
  ADD PRIMARY KEY (`scr_id`);

ALTER TABLE `tbl_security`
  MODIFY `scr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;




/* Bảng Vị trí thông tin được tạo ra/Lưu trữ/ Xử lý/ Truyền tải/ Sử dụng/ Huỷ bỏ */
CREATE TABLE `tbl_informationplace` (
  `place_id` int(11) NOT NULL,
  `place_place` varchar(255) NOT NULL,
  `place_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_informationplace`
  ADD PRIMARY KEY (`place_id`);

ALTER TABLE `tbl_informationplace`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;



/* Bảng Phạm vi sử dụng */
CREATE TABLE `tbl_rangeusable` (
  `range_id` int(11) NOT NULL,
  `range_usable` varchar(255) NOT NULL,
  `runge_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_rangeusable`
  ADD PRIMARY KEY (`range_id`);

ALTER TABLE `tbl_rangeusable`
  MODIFY `range_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



/* Bảng Khu vực */
CREATE TABLE `tbl_spot` (
  `spot_id` int(11) NOT NULL,
  `spot_spot` varchar(255) NOT NULL,
  `spot_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_spot`
  ADD PRIMARY KEY (`spot_id`);

ALTER TABLE `tbl_spot`
  MODIFY `spot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/* tbl_physical_group */
CREATE TABLE `tbl_physical_group` (
  `physical_id` int(11) NOT NULL,
  `physical_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
);

ALTER TABLE `tbl_physical_group`
  ADD PRIMARY KEY (`physical_id`);

ALTER TABLE `tbl_physical_group`
  MODIFY `physical_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


/* Bảng Địa điểm/vị trí */
CREATE TABLE `tbl_location` (
  `lct_id` int(11) NOT NULL,
  `lct_location` varchar(255) DEFAULT NULL,
  `lct_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`lct_id`);

ALTER TABLE `tbl_location`
  MODIFY `lct_id` int(11) NOT NULL AUTO_INCREMENT;

/* End Hoàng */

/* --------------------------------------------- TABLE MANAGEMENT -----------------------------------------------------------------*/
/* Ngọc */
-- Bảng tài sản vật lý

create table tbl_physical_property
(
	id int not null AUTO_INCREMENT primary key,
	physical_group int, -- tbl_nhomtaisanvatly
	physical_name varchar(500),
	physical_id char(20),
	physical_mac_ip_address char(20),
	physical_department int, -- tbl_bophan
	user varchar(500), -- tbl_personnel_assets
	physical_business_process int, -- tbl_business_process
	physical_property_ownership int, -- tbl_hinhthucsohuu
	physical_confidentiality int, -- tbl_property_characteristics / bảo mật
	physical_integrity int, -- tbl_property_characteristics / toàn vẹn
	physical_availability int, -- tbl_property_characteristics / sẵn sàng
	/* mức độ quan trọng phụ thuộc vào tổng 3 cột C I A. 3 => Thấp / 4-5 => Trung Bình / 6-7 => cao / 8-9 => rất cao */
	physical_level_importance varchar(20), -- mức độ quan trọng
	physical_location int, -- tbl_diadiem
	/* vùng an toàn thông tin, phụ thuộc vào mức độ quan trọng. level_importance=trung bình => C / level_importance=cao => B / level_importance=rất cao => A */
	physical_information_security_zone varchar(1), 
	physical_status int, -- tbl_trangthai
	physical_allowed_bring_outside int, -- cho phép mang ra bên ngoài / 1=> cho phép , 0 => không cho 
	physical_scope_of_use int, -- tbl_phamvisudung
	physical_puspose varchar(500), -- mục đích sử dụng
	physical_type_info varchar(500), -- tbl_information_group
	physical_os_type int, -- tbl_hedieuhanh
	physical_os_lisence int, -- os có lisence? 1=>có / 2=>không
  physical_antivirus_type int, -- tbl_antivirus
	physical_antivirus_lisence int, -- antivirus có lisence? 1=>có / 2=>không
	physical_network varchar(500),
	physical_schedual_backup int, -- tbl_backup
	physical_server_backup varchar(500),
	physical_maintains int, -- tbl_maintains
	physical_serial_no char(20),
	physical_config varchar(500),
	physical_purchase_date datetime, -- ngày mua
	physical_price int,
	physical_previous_user varchar(500), -- tbl_personnel_assets
	physical_repair_history datetime,
	physical_description varchar(500),
	created_at datetime DEFAULT now(), 
	updated_at datetime ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng tài sản phần mềm
create table tbl_software_assets
(
	id int not null AUTO_INCREMENT primary key, 
	software_group int, -- tbl_nhomtaisanphanmem
	software_name varchar(500),
	software_id char(20),
	software_department int, -- tbl_bophan
	software_manager varchar(500), -- tbl_personnel_assets
	user varchar(500), -- người sử dụng
	software_business_process int, -- tbl_business_process
	software_property_ownership int, -- tbl_hinhthucsohuu
	software_confidentiality int, -- tbl_property_characteristics / bảo mật
	software_integrity int, -- tbl_property_characteristics / toàn vẹn
	software_availability int, -- tbl_property_characteristics / sẵn sàng
	/* mức độ quan trọng phụ thuộc vào tổng 3 cột C I A. 3 => Thấp / 4-5 => Trung Bình / 6-7 => cao / 8-9 => rất cao */
	software_level_importance varchar(20), -- mức độ quan trọng
	software_storage_location int, -- tbl_vitrithongtin
	software_device_user_id_storage int,
	/* vùng an toàn thông tin, phụ thuộc vào mức độ quan trọng. level_importance=trung bình => C / level_importance=cao => B / level_importance=rất cao => A */
	software_information_security_zone varchar(1), 
	software_status int, -- tbl_trangthai
	software_scope_of_use int, -- tbl_phamvisudung
	software_puspose varchar(500), -- mục đích sử dụng
	software_operating_environment varchar(500), -- môi trường hoạt động
	software_developers varchar(500), -- nhà phát triển
	software_purchase_date datetime, -- ngày mua
	software_expiry_date datetime, -- thời hạn
	software_description varchar(500),
	created_at datetime DEFAULT now(), 
	updated_at datetime ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng tài sản nhân sự

create table tbl_personnel_assets
(
	id int not null AUTO_INCREMENT primary key,
	personnel_name varchar(500),
	personnel_id char(20),
	personnel_department int, -- tbl_bophan
	personnel_head_of_department varchar(500), -- tbl_personnel_assets
	personnel_confidentiality int, -- tbl_property_characteristics / bảo mật
	personnel_integrity int, -- tbl_property_characteristics / toàn vẹn
	personnel_availability int, -- tbl_property_characteristics / sẵn sàng
	/* mức độ quan trọng phụ thuộc vào tổng 3 cột C I A. 3 => Thấp / 4-5 => Trung Bình / 6-7 => cao / 8-9 => rất cao */
	personnel_level_importance varchar(20), -- mức độ quan trọng
	personnel_description varchar(500),
	created_at datetime DEFAULT now(), 
	updated_at datetime ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/* End Ngọc */

/* Trường */
/*create table*/
CREATE TABLE `tbl_information_assets` (
  `id` int(11) NOT NULL,
  `information_group` int(11),
  `existing` int(11),
  `name` varchar(500),
  `information_id` char(50),
  `security_level` int(11),
  `department` int(11),
  `owner` varchar(500),
  `business_process` int(11),
  `property_ownership` int(11),
  `confidentiality` int(11),
  `integrity` int(11),
  `availability` int(11),
  `level_importance` varchar(20),
  `information_place` int(11),
  `spot` int(11),
  `note` varchar(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_information_assets`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_information_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `tbl_service_property` (
  `id` int(11) NOT NULL,
  `service_group` int(11),
  `name` varchar(500),
  `service_id` char(50),
  `department` int(11),
  `manager` varchar(500),
  `user` varchar(500),
  `business_process` int(11),
  `property_ownership` int(11),
  `confidentiality` int(11),
  `integrity` int(11),
  `availability` int(11),
  `level_importance` varchar(20),
  `location` int(11),
  `spot` int(11),
  `status` int(11),
  `scope_of_use` int(11),
  `puspose` varchar(500),
  `supplier_name` varchar(500),
  `supplier_phone` varchar(500),
  `start_date` datetime,
  `expiry_date` datetime,
  `note` varchar(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/* End Trường */


/* --------------------------------------------- INSERT DATA -----------------------------------------------------------------*/

/* Ngọc */

insert into tbl_antivirus (atv_name) VALUE ('Norton'), ('Kaspersky'), ('Microsoft Security Essential'), ('AVAST'), ('BitDefender'), ('BKAV'), ('Avira'), ('Windows Security Essentials'), ('Khác');

insert into tbl_backup (backup_frequency) VALUES ('Hàng ngày'), ('Hàng tuần'), ('2 tuần'), ('Hàng tháng'), ('Hàng quý'), ('6 tháng'), ('Hàng năm'), ('Không');

insert into tbl_maintains (maintains_frequency) VALUES ('Hàng ngày'), ('Hàng tuần'), ('2 tuần'), ('Hàng tháng'), ('Hàng quý'), ('6 tháng'), ('Hàng năm'), ('Không');

insert into tbl_risk_methods (rmet_method) VALUES ('Phòng ngừa'), ('Giảm thiểu'), ('Chuyển giao'), ('Chấp nhận');

insert into tbl_possibility (pos_evaluate) VALUES (1), (2), (3), (4);

insert into tbl_impact (impact_evaluate) VALUES (0.1), (0.5), (1), (2);

insert into tbl_risk_acceptance_criteria (ract_evaluate) VALUES (1), (2), (3), (4), (5);

insert into tbl_business_process (bproc_name) VALUES ('Management'), ('General Affairs'), ('HR - Tuyển dụng'), ('HR - Đào tạo'), ('HR - CMB'), ('Facility Management'), ('Accounting'), 
						('Sale Control'), ('Planning'), ('IT Management'), ('Marketing'), ('Design'), ('Development'), ('QA'), ('Support'), ('BPO'), ('Other');

insert into tbl_property_characteristics (pchar_evaluate, pchar_description, pchar_type) VALUES 
(3, 'Khi tài sản bị mất mát, có ảnh hưởng nghiêm trọng cho việc kinh doanh', '1'), 
(2, 'Khi tài sản bị mất mát, có ảnh hưởng trung bình cho việc kinh doanh', '1'), 
(1, 'Khi tài sản  bị mất mát, có ảnh hưởng nhỏ cho việc kinh doanh', '1'), 
(3, 'Khi tài sản bị thay đổi, có ảnh hưởng nghiêm trọng cho việc kinh doanh', '2'), 
(2, 'Khi tài sản bị thay đổi, có ảnh hưởng trung bình cho việc kinh doanh', '2'), 
(1, 'Khi tài sản  bị thay đổi, có ảnh hưởng nhỏ cho việc kinh doanh', '2'), 
(3, 'Khi tài sản không sẵn có, có ảnh hưởng nghiêm trọng cho kinh doanh; Các tài sản / thông tin được yêu cầu trên cơ sở hoạt động 24/7', '3'), 
(2, 'Khi tài sản không sẵn có, có ảnh hưởng trung bình cho kinh doanh; Có tác động đáng kể về kinh doanh nếu tài sản / thông tin không có sẵn cho đến 24 giờ', '3'), 
(1, 'Khi tài sản không sẵn có, có ảnh hưởng nhỏ cho kinh doanh; Có tác động đáng kể về kinh doanh nếu tài sản / thông tinkhông có sẵn từ 01 ngày đến 30 ngày', '3');


insert into tbl_location (lct_location) VALUES 
('Quận 1'), 
('Quận 2'), 
('Quận 3'), 
('Quận 4'), 
('Quận 5');

INSERT INTO `tbl_physical_property` (`id`, `physical_group`, `physical_name`, `physical_id`, `physical_mac_ip_address`, `physical_department`, `user`, `physical_business_process`, `physical_property_ownership`, `physical_confidentiality`, `physical_integrity`, `physical_availability`, `physical_level_importance`, `physical_location`, `physical_information_security_zone`, `physical_status`, `physical_allowed_bring_outside`, `physical_scope_of_use`, `physical_puspose`, `physical_type_info`, `physical_os_type`, `physical_os_lisence`, `physical_antivirus_type`, `physical_antivirus_lisence`, `physical_network`, `physical_schedual_backup`, `physical_server_backup`, `physical_maintains`, `physical_serial_no`, `physical_config`, `physical_purchase_date`, `physical_price`, `physical_previous_user`, `physical_repair_history`, `physical_description`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Dell OptiPlex 3010 desktop', 'SM01', 'A4-1F-72-79-0B-BC', '3', 'Phạm Thị H', '7', '1', '1', '4', '7', 'Thấp', '1', 'C', '1', '0', '4', 'Làm việc', 'số liệu', '1', '1', '1', '1', 'localhost', '1', 'window', '4', '123456', 'Core i5-3470 3.20GHz,4GB/DDR3  x　2枚,SSD_WD__240G x 1台\r\n500GB　x　1台,HD', '2021-10-11 10:30:59', '500000000', 'Lê Thị Hồng Ngọc', '2021-10-04 10:30:59', 'Không có', current_timestamp(), NULL);
INSERT INTO `tbl_physical_property` (`id`, `physical_group`, `physical_name`, `physical_id`, `physical_mac_ip_address`, `physical_department`, `user`, `physical_business_process`, `physical_property_ownership`, `physical_confidentiality`, `physical_integrity`, `physical_availability`, `physical_level_importance`, `physical_location`, `physical_information_security_zone`, `physical_status`, `physical_allowed_bring_outside`, `physical_scope_of_use`, `physical_puspose`, `physical_type_info`, `physical_os_type`, `physical_os_lisence`, `physical_antivirus_type`, `physical_antivirus_lisence`, `physical_network`, `physical_schedual_backup`, `physical_server_backup`, `physical_maintains`, `physical_serial_no`, `physical_config`, `physical_purchase_date`, `physical_price`, `physical_previous_user`, `physical_repair_history`, `physical_description`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Dell OptiPlex 3010 desktop 1', 'SM01', 'A4-1F-72-79-0B-BC', '3', 'Phạm Thị H', '7', '1', '1', '4', '7', 'Thấp', '1', 'C', '1', '0', '4', 'Làm việc', 'số liệu', '1', '1', '1', '1', 'localhost', '1', 'window', '4', '123456', 'Core i5-3470 3.20GHz,4GB/DDR3  x　2枚,SSD_WD__240G x 1台\r\n500GB　x　1台,HD', '2021-10-11 10:30:59', '500000000', 'Lê Thị Hồng Ngọc', '2021-10-04 10:30:59', 'Không có', current_timestamp(), NULL);
/* End Ngọc */

/* Trường */

INSERT INTO `tbl_department` (`department_id`, `department_name`, `status`) VALUES (NULL, 'Ban giám đốc', '1');

INSERT INTO `tbl_department` (`department_id`, `department_name`, `status`) VALUES (NULL, 'Phòng Hành chính nhân sự', '1');

INSERT INTO `tbl_department` (`department_id`, `department_name`, `status`) VALUES (NULL, 'Bộ phận khai thác Offshore', '1');

INSERT INTO `tbl_department` (`department_id`, `department_name`, `status`) VALUES (NULL, 'Bộ phận khai thác trong nước', '1');

INSERT INTO `tbl_department` (`department_id`, `department_name`, `status`) VALUES (NULL, 'Phòng IT', '1');


INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Server', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị máy tính ', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị mạng', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị truyền thông ', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị lưu trữ', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị công nghệ cao', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Thiết bị văn phòng', '1');

INSERT INTO `tbl_physical_group` (`physical_id`, `physical_name`, `status`) VALUES (NULL, 'Cáp mạng', '1');


INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Windows NT Server', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Windows 2000 Server', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Windows 2003 Server', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Windows 2000', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Windows Xp', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Linux', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Solaris', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'AIX', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'HP-UX', '1');

INSERT INTO `tbl_operating_system` (`os_id`, `os_name`, `status`) VALUES (NULL, 'Appliance', '1');


INSERT INTO `tbl_software_group` (`software_id`, `software_name`, `status`) VALUES (NULL, 'Phần mềm ứng dụng', '1');

INSERT INTO `tbl_software_group` (`software_id`, `software_name`, `status`) VALUES (NULL, 'Phần mềm hệ thống', '1');

INSERT INTO `tbl_software_group` (`software_id`, `software_name`, `status`) VALUES (NULL, 'Phần mềm đóng gói', '1');

INSERT INTO `tbl_software_group` (`software_id`, `software_name`, `status`) VALUES (NULL, 'Phần mềm CSDL', '1');

INSERT INTO `tbl_software_group` (`software_id`, `software_name`, `status`) VALUES (NULL, 'Công cụ và tiện ích', '1');


INSERT INTO `tbl_information_group` (`information_id`, `information_name`, `status`) VALUES (NULL, 'Thông tin nhân sự', '1');

INSERT INTO `tbl_information_group` (`information_id`, `information_name`, `status`) VALUES (NULL, 'Thông tin kế toán', '1');

INSERT INTO `tbl_information_group` (`information_id`, `information_name`, `status`) VALUES (NULL, 'Thông tin dự án', '1');


INSERT INTO `tbl_service_group` (`service_id`, `service_name`, `status`) VALUES (NULL, 'Dịch vụ hạ tầng', '1');

INSERT INTO `tbl_service_group` (`service_id`, `service_name`, `status`) VALUES (NULL, 'Dịch vụ CNTT', '1');

INSERT INTO `tbl_service_group` (`service_id`, `service_name`, `status`) VALUES (NULL, 'Dịch vụ Bảo hiểm', '1');

INSERT INTO `tbl_service_group` (`service_id`, `service_name`, `status`) VALUES (NULL, 'Dịch vụ văn phòng', '1');


INSERT INTO `tbl_status` (`status_id`, `status_name`, `status`) VALUES (NULL, 'Đang sử dụng', '1');

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status`) VALUES (NULL, 'Máy test', '1');

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status`) VALUES (NULL, 'Không sử dụng', '1');

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status`) VALUES (NULL, 'Hỏng', '1');

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status`) VALUES (NULL, 'Đã thanh lý/hủy bỏ ', '1');
/* End Trường */

/* Hoàng */
/* Bảng Hình thức sở hữu */
INSERT INTO `tbl_owner` (`owner_id`, `owner_owner`, `owner_status`) VALUES
(1, 'Tài sản nội bộ', 1),
(2, 'Tài sản khách hàng', 1),
(3, 'Tài sản đối tác', 1),
(4, 'Tài sản cá nhân', 1),
(5, 'Tài sản nội bộ', 1);



/* Bảng Dạng tồn tại */
INSERT INTO `tbl_form` (`form_id`, `form_form`, `form_status`) VALUES
(1, 'Giấy - Vật lý', 1),
(2, 'Số - Điện tử', 1),
(3, 'Hình ảnh bản mẫu', 1),
(4, 'Trí nhớ con người', 1);




/* Bảng Mức độ bảo mật */
INSERT INTO `tbl_security` (`scr_id`, `scr_type`, `scr_status`) VALUES
(1, 'Thông tin công khai', 1),
(2, 'Thông tin nội bộ ', 1),
(3, 'Thông tin mật ', 1),
(4, 'Thông tin tuyệt mật ', 1);




/* Bảng Vị trí thông tin được tạo ra/Lưu trữ/ Xử lý/ Truyền tải/ Sử dụng/ Huỷ bỏ */
INSERT INTO `tbl_informationplace` (`place_id`, `place_place`, `place_status`) VALUES
(1, 'Tủ, ngăn tủ chung… có khóa', 1),
(2, 'Tủ, ngăn tủ chung… không có khóa', 1),
(3, 'Tủ, ngăn tủ cá nhân… có khóa', 1),
(4, 'Tủ, ngăn tủ cá nhân… không có khóa', 1),
(5, 'Phần mềm', 1),
(6, 'Máy chủ quản lý bởi bộ phận', 1),
(7, 'Máy chủ quản lý bởi công ty', 1),
(8, 'Máy chủ chia sẻ chung không được quản lý', 1),
(9, 'Máy tính không thể mang ra ngoài', 1),
(10, 'Máy tính có thể mang ra ngoài', 1),
(11, 'Phòng có khóa', 1),
(12, 'Phòng không có khóa', 1),
(13, 'Trí nhớ con người', 1),
(14, 'Thiết bị mạng', 1),
(15, 'Thiết bị lưu trữ (USB, HDD, …)', 1),
(16, 'Khác', 1);



/* Bảng Phạm vi sử dụng */
INSERT INTO `tbl_rangeusable` (`range_id`, `range_usable`, `runge_status`) VALUES
(1, 'Công ty', 1),
(2, 'Trung tâm', 1),
(3, 'Phòng', 1),
(4, 'Cá nhân', 1);



/* Bảng Khu vực */
INSERT INTO `tbl_spot` (`spot_id`, `spot_spot`, `spot_status`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'Ngoài công ty', 1);

/* End Hoàng */

/**/
/* ------------------------------------------- FOREIGN KEY------------------------------------------------- */
/**/
/* Ngọc */
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_group) REFERENCES tbl_physical_group(physical_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_department) REFERENCES tbl_department(department_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_business_process) REFERENCES tbl_business_process(bproc_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_property_ownership) REFERENCES tbl_owner(owner_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_confidentiality) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_integrity) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_availability) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_location) REFERENCES tbl_location(lct_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_status) REFERENCES tbl_status(status_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_scope_of_use) REFERENCES tbl_rangeusable(range_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_os_type) REFERENCES tbl_operating_system(os_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_antivirus_type) REFERENCES tbl_antivirus(atv_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_schedual_backup) REFERENCES tbl_backup(backup_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_maintains) REFERENCES tbl_maintains(maintains_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_type_info) REFERENCES tbl_information_group(information_id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(user) REFERENCES tbl_personnel_assets(id);
ALTER TABLE tbl_physical_property ADD FOREIGN KEY(physical_previous_user) REFERENCES tbl_personnel_assets(id);



ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_group) REFERENCES tbl_software_group(software_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_department) REFERENCES tbl_department(department_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_business_process) REFERENCES tbl_business_process(bproc_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_property_ownership) REFERENCES tbl_owner(owner_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_confidentiality) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_integrity) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_availability) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_storage_location) REFERENCES tbl_informationplace(place_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_status) REFERENCES tbl_status(status_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_scope_of_use) REFERENCES tbl_rangeusable(range_id);
ALTER TABLE tbl_software_assets ADD FOREIGN KEY(software_manager) REFERENCES tbl_personnel_assets(id);


ALTER TABLE tbl_personnel_assets ADD FOREIGN KEY(personnel_confidentiality) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_personnel_assets ADD FOREIGN KEY(personnel_integrity) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_personnel_assets ADD FOREIGN KEY(personnel_availability) REFERENCES tbl_property_characteristics(pchar_id);
ALTER TABLE tbl_personnel_assets ADD FOREIGN KEY(personnel_head_of_department) REFERENCES tbl_personnel_assets(id);
/* End Ngọc */

/* Trường */
ALTER TABLE `tbl_service_property`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_service_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*create foreign key */
ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(information_group)
REFERENCES tbl_information_group(information_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(existing)
REFERENCES tbl_form(form_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(security_level)
REFERENCES tbl_security(scr_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(department)
REFERENCES tbl_department(department_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(business_process)
REFERENCES tbl_business_process(bproc_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(property_ownership)
REFERENCES tbl_owner(owner_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(integrity)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(availability)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(confidentiality)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(information_place)
REFERENCES tbl_informationplace(place_id);

ALTER TABLE tbl_information_assets
ADD FOREIGN KEY(spot)
REFERENCES tbl_spot(spot_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(service_group)
REFERENCES tbl_service_group(service_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(department)
REFERENCES tbl_department(department_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(business_process)
REFERENCES tbl_business_process(bproc_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(property_ownership)
REFERENCES tbl_owner(owner_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(integrity)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(availability)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(confidentiality)
REFERENCES tbl_property_characteristics(pchar_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(location)
REFERENCES tbl_location(lct_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(spot)
REFERENCES tbl_spot(spot_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(status)
REFERENCES tbl_status(status_id);

ALTER TABLE tbl_service_property
ADD FOREIGN KEY(scope_of_use)
REFERENCES tbl_rangeusable(range_id);
/* End Trường */



