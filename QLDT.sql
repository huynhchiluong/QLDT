drop database QLDT
create database QLDT
go

use QLDT
set dateformat dmy
go
create table NhaSanXuat 
(
	MaNSX nvarchar(6) primary key,  
	TenNSX nvarchar(255), 
	QuocGia nvarchar(255), 
)
go
create table DienThoai
(
	MaDT int primary key  identity(1,1),
	MaNSX nvarchar(6), 
    TenDT nvarchar(255) , 
    MoTa nvarchar(Max) , 
    GiaDT money,
    KichThuoc nvarchar(255),
    TrongLuong nvarchar(255),
	MauSac nvarchar(255),
    DungLuong nvarchar(255),
    HDH nvarchar(255),
    CPU nvarchar(255), 
    Camera nvarchar(255), 
    ThoiGianBH nvarchar(255),
	Bluetooth nvarchar(255),
    Wifi nvarchar(255),
    Sim nvarchar(255),
    Pin nvarchar(255),
    NgaySX date,
    foreign key (MaNSX) references NhaSanXuat(MaNSX) 
); 
go
create table KhachHang
(
	MaKH  int  primary key identity(1,1),
    TenKH nvarchar(255),
	Email nvarchar(255),
    SĐT nvarchar(12), 
    DiaChi nvarchar(255) 
);
go

create table Nhanvien
(
	MaNV int  primary key identity(1,1),
    TenNV nvarchar(255) ,
	Email nvarchar(255), 
	NgaySinh date, 
	SDT nvarchar(12), 
	DiaChi nvarchar(255), 
	GioiTinh nvarchar(10)
);
go


create table KhuyenMai
(
	MaKM nvarchar(6) primary key,
    TenKM nvarchar(255),
    NgayBD date,
    NgayKT date, 
	PhanTram int,
)
go
create table HoaDon 
(
	MaHD int  primary key identity(1,1),
    MaNV int ,
    MaKH int , 
	MaKM nvarchar(6), 
    NgayLap date default getdate() ,
	TinhTrang nvarchar(255), 
	TongTien money default 0 , 
    foreign key (MaNV) references NhanVien(MaNV),
    foreign key (MaKH) references KhachHang(MaKH),
	foreign key (MaKM) references KhuyenMai(MaKM)
); 
go
create table CTHD 
(
	MaDT int,
    MaHD int,
	MaKM nvarchar(6),
    SoLuong int, 
	DonGia money,  
	constraint pk_CTHD primary key  (MaDT,MaHD,MaKM),
	constraint fk_CTHD_DienThoai  foreign key (MaDT) references DienThoai(MaDT), 
    constraint fk_CTHD_HoaDon  foreign key (MaHD) references HoaDon(MaHD),
	constraint fk_CTHD_KhuyenMai  foreign key (MaKM) references KhuyenMai(MaKM),
);
go
create table DanhGia 
(
	MaKH int , 
	MaDT int, 
	MaHD int, 
	ChiTiet nvarchar(255), 
	MucDo int , 
	check (MucDo>=1 and MucDo<=5) ,
	constraint pk_DanhGia primary key (MaDT,MaKH,MaHD), 
	constraint fk_DanhGia_DienThoai  foreign key (MaDT) references DienThoai(MaDT), 
    constraint fk_DanhGia_HoaDon  foreign key (MaHD) references HoaDon(MaHD),
	constraint fk_DanhGia_KhachHang  foreign key (MaKH) references KhachHang(MaKH),
);
go

create table TonKho
(	
	MaKho int identity(1,1) primary key, 
	MaDT int , 
	SoLuongTon int , 
	foreign key (MaDT) references DienThoai(MaDT), 
)
go 

insert into NhaSanXuat values('NSX001','APPLE','Hoa Ky');
insert into NhaSanXuat values('NSX002','SAMSUNG','Han Quoc');
insert into NhaSanXuat values('NSX003','HUAWEI','Trung Quoc');
insert into NhaSanXuat values('NSX004','XIAOMI','Trung Quoc');
insert into NhaSanXuat values('NSX005','OPPO','Trung Quoc');
go
insert into DienThoai values('NSX001','iPhone 11 Pro Max 512GB',N'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 512GB mới ra mắt trong năm 2019 của Apple.','43990000',N'Dài 158 mm - Ngang 77.8 mm - Dày 8.1 mm','Green','226 g','512GB','iOS 13',N'Apple A13 Bionic 6 nhân','3 camera 12 MP & 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3969 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 Pro Max 256GB',N'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 256GB mới ra mắt trong năm 2019 của Apple.','37990000',N'Dài 158 mm - Ngang 77.8 mm - Dày 8.1 mm','Black','226 g','256GB','iOS 13',N'Apple A13 Bionic 6 nhân','3 camera 12 MP & 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3969 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 Pro Max 64GB',N'Để tìm kiếm một chiếc smartphone có hiệu năng mạnh mẽ và có thể sử dụng mượt mà trong 2-3 năm tới thì không có chiếc máy nào xứng đang hơn chiếc iPhone 11 Pro Max 64GB mới ra mắt trong năm 2019 của Apple.','33990000',N'Dài 158 mm - Ngang 77.8 mm - Dày 8.1 mm','Gold','226 g','64GB','iOS 13',N'Apple A13 Bionic 6 nhân','3 camera 12 MP & 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3969 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 Pro 256GB',N'iPhone 11 Pro 256GB có lẽ sẽ là chiếc iPhone được nhiều người dùng lựa chọn khi nó sở hữu mức giá tốt hơn chiếc iPhone 11 Pro Max nhưng vẫn sở hữu tất cả những ưu điểm trên người anh em của mình.','34990000',N'Dài 144 mm - Ngang 71.4 mm - Dày 8.1 mm','Gold','188 g','256GB','iOS 13',N'Apple A13 Bionic 6 nhân','3 camera 12 MP & 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3046 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 Pro 64GB',N'iPhone 11 Pro 256GB có lẽ sẽ là chiếc iPhone được nhiều người dùng lựa chọn khi nó sở hữu mức giá tốt hơn chiếc iPhone 11 Pro Max nhưng vẫn sở hữu tất cả những ưu điểm trên người anh em của mình.','30990000',N'Dài 144 mm - Ngang 71.4 mm - Dày 8.1 mm','Gold','188 g','64GB','iOS 13',N'Apple A13 Bionic 6 nhân','3 camera 12 MP & 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3046 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 64GB',N'Sau bao nhiêu chờ đợi cũng như đồn đoán thì cuối cùng Apple đã chính thức giới thiệu bộ 3 siêu phẩm iPhone 11 mạnh mẽ nhất của mình vào tháng 9/2019. Có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như chiếc iPhone Xr năm ngoái, đó chính là phiên bản iPhone 11 64GB.','21990000',N'Dài 150.9 mm - Ngang 75.7 mm - Dày 8.3 mm','Black','194 g','64GB','iOS 13',N'Apple A13 Bionic 6 nhân','Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3110 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone 11 128GB',N'Được xem là phiên bản iPhone "giá rẻ" trong bộ 3 iPhone mới ra mắt nhưng iPhone 11 128GB vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.','23990000',N'Dài 150.9 mm - Ngang 75.7 mm - Dày 8.3 mm','Black','194 g','128GB','iOS 13',N'Apple A13 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3110 mAh','01/11/2019')
insert into DienThoai values('NSX001','iPhone Xs Max 64GB',N'Hoàn toàn xứng đáng với những gì được mong chờ, phiên bản cao cấp nhất iPhone Xs Max 64 GB của Apple năm nay nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp.','27990000',N'Dài 157.5 mm - Ngang 77.4 mm - Dày 7.7 mm','Black','208 g','64GB','iOS 12',N'Apple A12 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3174 mAh','01/11/2018')
insert into DienThoai values('NSX001','iPhone Xs Max 128GB',N'Sau 1 năm mong chờ, chiếc smartphone cao cấp nhất của Apple đã chính thức ra mắt mang tên iPhone Xs Max 256 GB. Máy các trang bị các tính năng cao cấp nhất từ chip A12 Bionic, dàn loa đa chiều cho tới camera kép tích hợp trí tuệ nhân tạo.','33990000',N'Dài 157.5 mm - Ngang 77.4 mm - Dày 7.7 mm','Black','208 g','128GB','iOS 12','Apple A12 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','3174 mAh','01/11/2018')
insert into DienThoai values('NSX001','iPhone Xs 256GB',N'Chiếc điện thoại iPhone mới đã chính thức được ra mắt vào đêm 12/9 theo giờ Việt Nam, trong đó có phiên bản iPhone Xs 256GB với bộ nhớ khủng, cấu hình mạnh mẽ với chip Apple A12 và những tính năng đẳng cấp khác.','29990000',N'Dài 143.6 mm - Ngang 70.9 mm - Dày 7.7 mm','Black','177 g','256GB','iOS 12',N'Apple A12 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','2658 mAh','01/11/2018')
insert into DienThoai values('NSX001','iPhone Xs 64GB',N'Đến hẹn lại lên, năm nay Apple giới thiệu tới người dùng thế hệ tiếp theo với 3 phiên bản, trong đó có cái tên iPhone Xs 64 GB với những nâng cấp mạnh mẽ về phần cứng đến hiệu năng, màn hình cùng hàng loạt các trang bị cao cấp khác.','24990000',N'Dài 143.6 mm - Ngang 70.9 mm - Dày 7.7 mm','Black','177 g','64GB','iOS 12',N'Apple A12 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP','1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','2658 mAh','01/11/2018')
insert into DienThoai values('NSX001','iPhone X 64GB',N'iPhone X 64 GB là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.','19990000',N'Dài 143.6 mm - Ngang 70.9 mm - Dày 7.7 mm','Black','174 g','64GB','iOS 12','Apple A11 Bionic 6 nhân',N'Chính 12 MP & Phụ 12 MP',N'1 Năm','LE, A2DP, v5.0','Dual-band, Wi-Fi 802.11 a/b/g/n/ac/ax, Wi-Fi hotspot','Nano SIM & eSIM','2716 mAh','01/09/2017')
insert into DienThoai values('NSX002','Samsung Galaxy Note 10+','Trông ngoại hình khá giống nhau, tuy nhiên Samsung Galaxy Note 10+ sở hữu khá nhiều điểm khác biệt so với Galaxy Note 10 và đây được xem là một trong những chiếc máy đáng mua nhất trong năm 2019, đặc biệt dành cho những người thích một chiếc máy màn hình lớn, camera chất lượng hàng đầu.','23990000','Dài 162.3 mm - Ngang 77.2 mm - Dày 7.9 mm','Black','196 g','256GB','Android 9.0 (Pie)','Exynos 9825 8 nhân 64-bit','Chính 12 MP & Phụ 12 MP, 16 MP, TOF 3D','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4300 mAh','01/08/2019')
insert into DienThoai values('NSX002','Samsung Galaxy S10+ (512GB)','Samsung Galaxy S10+ 512GB - phiên bản kỷ niệm 10 năm chiếc Galaxy S đầu tiên ra mắt, là một chiếc smartphone hội tủ đủ các yếu tố mà bạn cần ở một chiếc máy cao cấp trong năm 2019.','22990000','Dài 157.6 mm - Ngang 74.1 mm - Dày 7.8 mm','Grey','175 g','512GB','Android 9.0 (Pie)','Exynos 9820 8 nhân 64-bit','Chính 12 MP & Phụ 12 MP, 16 MP, TOF 3D','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4300 mAh','01/02/2019')
insert into DienThoai values('NSX002','Samsung Galaxy Note 10','Nếu như từ trước tới nay dòng Galaxy Note của Samsung thường ít được các bạn nữ sử dụng bởi kích thước màn hình khá lớn khiến việc cầm nắm trở nên khó khăn thì Samsung Galaxy Note 10 sẽ là chiếc smartphone nhỏ gọn, phù hợp với cả những bạn có bàn tay nhỏ.','19990000','Dài 151 mm - Ngang 71.8 mm - Dày 7.9 mm','Black','168 g','256GB','Android 9.0 (Pie)','Exynos 9825 8 nhân 64-bit','Chính 12 MP & Phụ 12 MP, 16 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4300 mAh','01/08/2019')
insert into DienThoai values('NSX002','Samsung Galaxy Note 9','Mang lại sự cải tiến đặc biệt trong cây bút S Pen, siêu phẩm Samsung Galaxy Note 9 còn sở hữu dung lượng pin khủng lên tới 4.000 mAh cùng hiệu năng mạnh mẽ vượt bậc, xứng đáng là một trong những chiếc điện thoại cao cấp nhất của Samsung.','22990000','Dài 161.9 mm - Ngang 76.4 mm - Dày 8.8 mm','Black','201 g','128GB','Android 8.1 (Oreo)','Exynos 9810 8 nhân 64-bit','Chính 12 MP & Phụ 12 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4000 mAh','01/08/2018')
insert into DienThoai values('NSX002','Samsung Galaxy A9 (2018)','Samsung Galaxy A9 (2018) là chiếc điện thoại đầu tiên của Samsung sở hữu hệ thống camera ấn tượng với 4 thấu kính cùng hàng loạt các nâng cấp đáng giá về cấu hình và tính năng hiện đại khác.','10990000','Dài 162.5 mm - Ngang 77 mm - Dày 7.8 mm','Black','183 g','128GB','Android 8.0 (Oreo)','Qualcomm Snapdragon 660 8 nhân','Chính 24 MP & Phụ 10 MP, 8 MP, 5 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','3800 mAh','01/08/2018')
insert into DienThoai values('NSX003','Huawei P30 Pro','Huawei P30 Pro là một bước đột phá của Huawei cũng như camera trên smartphone khi đem lại khả năng zoom như một "kính viễn vọng".','20690000','Dài 158 mm - Ngang 73.4 mm - Dày 8.41 mm','Black','192 g','256GB','Android 9.0 (Pie)','Hisilicon Kirin 980 8 nhân 64-bit','Chính 40 MP & Phụ 20 MP, 8 MP, TOF 3D','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','	2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4200 mAh','01/03/2019')
insert into DienThoai values('NSX003','Huawei P30 Lite','Mới đây Huawei đã chính thức giới thiệu chiếc Huawei P30 Lite bên cạnh các sản phẩm khác trong dòng P30 series và chiếc smartphone được định hướng tới phân khúc tầm trung.','6020000','Dài 152.9 mm - Ngang 72.7 mm - Dày 7.4 mm','Black','159 g','128GB','Android 9.0 (Pie)','HiSilicon Kirin 710','Chính 24 MP & Phụ 8 MP, 2 MP','1 Năm','apt-X, EDR, LE, A2DP, v4.2','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','3340 mAh','01/03/2019')
insert into DienThoai values('NSX003','Huawei Y9 Prime (2019)','Huawei Y9 Prime (2019) là phiên bản kế nhiệm của chiếc Y9 Prime (2018) đã ra mắt năm ngoái và cũng là chiếc điện thoại đầu tiên của Huawei được trang bị công nghệ camera trượt và màn hình tràn viền ra bốn cạnh.','5490000','Dài 163.45 mm - Ngang 77.26 mm - Dày 8.85 mm','Black','196.8 g','128GB','Android 9.0 (Pie)','HiSilicon Kirin 710F 8 nhân','Chính 16 MP & Phụ 8 MP, 2 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4000 mAh','01/06/2019')
insert into DienThoai values('NSX003','Huawei Nova 3i','Với những smartphone như Nova 2i hay Nova 3e thì Huawei đã và đang tạo nên những cơn sốt rất lớn trong phân khúc tầm trung và cái tên mới Huawei Nova 3i được cải tiến và nâng cấp nhiều điểm mới, hứa hẹn sẽ mang lại làn gió mới cho thị trường.','5390000','Dài 157.6 mm - Ngang 75.2 mm - Dày 7.6 mm','Black','169 g','128GB','Android 8.1 (Oreo)','HiSilicon Kirin 710','Chính 16 MP & Phụ 2 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','3340 mAh','01/07/2018')
insert into DienThoai values('NSX003','Huawei Y7 Pro (2019)','Hoàn toàn lột xác so với phiên bản tiền nhiệm, Y7 Pro (2019) đã giúp Huawei có thêm điểm cộng trong mắt người dùng nhờ việc đem thiết kế mặt lưng gradient, màn hình giọt nước và pin khủng lên chiếc smartphone giá rẻ của mình.','3140000','Dài 158.9 mm - Ngang 76.9 mm - Dày 8.1 mm','Black','168 g','32GB','Android 8.1 (Oreo)','Qualcomm Snapdragon 450 8 nhân 64-bit','Chính 13 MP & Phụ 2 MP','1 Năm','LE, A2DP, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano (SIM 2 chung khe thẻ nhớ)','4000 mAh','01/12/2018')
insert into DienThoai values('NSX004','Xiaomi Mi 9 SE','Vẫn như thường lệ thì bên cạnh chiếc flagship Xiaomi Mi 9 cao cấp của mình thì Xiaomi cũng giới thiệu thêm phiên bản rút gọn là chiếc Xiaomi Mi 9 SE. Máy vẫn sở hữu cho mình nhiều trang bị cao cấp tương tự đàn anh.','7490000','Dài 147.5 mm - Ngang 70.5 mm - Dày 7.5 mm','Black','155 g','64GB','Android 9.0 (Pie)','Snapdragon 712 8 nhân 64-bit','Chính 48 MP & Phụ 13 MP, 8 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','3070 mAh','01/06/2019')
insert into DienThoai values('NSX004','Xiaomi Mi 9T','Xiaomi Mi 9T (tên khác là Redmi K20) là chiếc smartphone vừa được giới thiệu gây rất nhiều chú ý với người dùng bởi nó hội tụ đủ 3 yếu tố "ngon bổ rẻ".','7990000','Dài 156.7 mm - Ngang 74.3 mm - Dày 8.8 mm','Black','191 g','64GB','Android 9.0 (Pie)','Snapdragon 730 8 nhân','Chính 48 MP & Phụ 13 MP, 8 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4000 mAh','01/07/2019')
insert into DienThoai values('NSX004','Xiaomi Redmi Note 8','Vào đầu tháng 10/2019 Xiaomi đã ra mắt một smartphone tầm trung mới nhất của họ mang tên Xiaomi Redmi Note 8 4GB/128GB. Chiếc điện thoại gây ấn tượng với thiết kế màn hình giọt nước thời trang, bộ 4 camera chất lượng cao, vi xử lý hiệu năng tốt đi kèm giá bán vô cùng hấp dẫn.','5490000','Dài 158.3 mm - Ngang 75.3 mm - Dày 8.4 mm','Black','190 g','128GB','Android 9.0 (Pie)','Qualcomm Snapdragon 665 8 nhân','Chính 48 MP & Phụ 13 MP, 8 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4000 mAh','01/10/2019')
insert into DienThoai values('NSX004','Xiaomi Redmi Note 7','Xiaomi Redmi Note 7 4GB/64GB là chiếc smartphone giá rẻ mới được giới thiệu vào đầu năm 2019 với nhiều trang bị đáng giá như thiết kế notch giọt nước hay camera lên tới 48 MP.','4490000','Dài 159.2 mm - Ngang 75.2 mm - Dày 8.1 mm','Black','186 g','64GB','Android 9.0 (Pie)','Qualcomm Snapdragon 660 8 nhân','Chính 48 MP & Phụ 15 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4000 mAh','01/03/2019')
insert into DienThoai values('NSX004','Xiaomi Mi A3','Xiaomi đã và đang khá thành công với các sản phẩm thuộc dòng Mi A của mình và mới đây hãng đã tiếp tục cho ra mắt phiên bản nâng cấp là chiếc Xiaomi Mi A3 (Mi CC9e) với cải tiến mạnh mẽ về camera và hiệu năng bên trong.','4490000','Dài 153.5 mm - Ngang 71.9 mm - Dày 8.5 mm','Black','173.8 g','64GB','Android 9.0 (Pie)','Qualcomm Snapdragon 665 8 nhân','Chính 48 MP & Phụ 8 MP, 2 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4030 mAh','01/03/2019')
insert into DienThoai values('NSX005','OPPO Reno 10x Zoom Edition','Những chiếc flagship trong năm 2019 không chỉ có một camera chụp ảnh đẹp, chụp xóa phông ảo diệu mà còn phải "chụp thật xa" và với chiếc OPPO Reno 10x Zoom Edition chính thức gia nhập thị trường "smartphone có camera siêu zoom".','16990000','Dài 162 mm - Ngang 77.2 mm - Dày 9.3 mm','Black','210 g','256GB','Android 9.0 (Pie)','Snapdragon 855 8 nhân 64-bit','Chính 48 MP & Phụ 13 MP, 8 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4065 mAh','01/06/2019')
insert into DienThoai values('NSX005','OPPO Reno2','Sau sự thành công của chiếc OPPO Reno với thiết kế mới lạ, camera chất lượng thì mới đây OPPO tiếp tục giới thiệu phiên bản nâng cấp của chiếc smartphone này là chiếc OPPO Reno2.','14990000','Dài 160 mm - Ngang 74.3 mm - Dày 9.5 mm','Black','189 g','256GB','Android 9.0 (Pie)','Snapdragon 730G 8 nhân','Chính 48 MP & Phụ 13 MP, 8 MP, 2 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4000 mAh','01/10/2019')
insert into DienThoai values('NSX005','OPPO Reno','Những năm gần đây OPPO luôn tạo được dấu ấn trên các sản phẩm mới của mình và smartphone vừa ra mắt OPPO Reno là một ví dụ điển hình.','9990000','Dài 156.6 mm - Ngang 74.3 mm - Dày 9 mm','Black','185 g','256GB','Android 9.0 (Pie)','Snapdragon 710 8 nhân 64-bit','	Chính 48 MP & Phụ 5 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','3765 mAh','01/06/2019')
insert into DienThoai values('NSX005','OPPO F11 Pro 128GB','Lâu nay, những chiếc điện thoại của OPPO thường được đánh giá cao ở camera selfie và với OPPO F11 Pro 128GB thì ngoài thế mạnh về camera trước với hệ thống trượt, OPPO làm người ta phải ấn tượng thêm cả về camera sau.','7490000','Dài 161.3 mm - Ngang 76.1 mm - Dày 8.8 mm','Black','190 g','128GB','Android 9.0 (Pie)','MediaTek Helio P70 8 nhân','Chính 48 MP & Phụ 5 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','4000 mAh','01/05/2019')
insert into DienThoai values('NSX005','OPPO A9 (2020)','Kế thừa phiên bản OPPO A7 đã từng gây hot trước đó, OPPO A9 (2020) có nhiều sự cải tiến hơn về màn hình, camera và hiệu năng trải nghiệm.','6990000','Dài 163.6 mm - Ngang 75.6 mm - Dày 9.1 mm','Black','195 g','128GB','Android 9.0 (Pie)','Qualcomm Snapdragon 665 8 nhân','Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP','1 Năm','A2DP, LE, apt-X, v5.0','Wi-Fi 802.11 a/b/g/n/ac/ax, Dual-band, Wi-Fi Direct, Wi-Fi hotspot','2 SIM Nano','5000 mAh','01/09/2019')





go

insert into Nhanvien values ('Phan Trong Nhan','12345@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Tran Trong Nghia','12346@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Nguyen Duong Hieu Han','12347@gmail.com','10/10/1999','0123456789','LongAn','Nu')
insert into Nhanvien values ('Huynh Chi Luong','12348@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Nguyen Thi Ngoc Diep','12349@gmail.com','10/10/1999','0123456789','LongAn','Nu')
insert into Nhanvien values ('Nguyen Thi Ngoc Lan','12345@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Nguyen Thi Lan','12335@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Nguyen Thi Han ','12336@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Nguyen Thi Han Han ','12337@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Tran Bat Nghia','12338@gmail.com','10/10/1999','0123456789','LongAn','Nam')
insert into Nhanvien values ('Huynh Bat Luong','12339@gmail.com','10/10/1999','0123456789','LongAn','Nam')
go

insert into KhuyenMai values ('KM002','Khuyen mai 2%','10/09/2019','30/09/2019',2)
insert into KhuyenMai values ('KM005','Khuyen mai 5%','01/09/2019','30/09/2019',5)
insert into KhuyenMai values ('KM007','Khuyen mai 7%','01/09/2019','30/09/2019',7)
insert into KhuyenMai values ('KM010','Khuyen mai 10%','01/09/2019','30/09/2019',10)
insert into KhuyenMai values ('KM015','Khuyen mai 15%','01/09/2019','30/09/2019',15)
insert into KhuyenMai values ('KM020','Khuyen mai 20%','01/09/2019','30/09/2019',20)
go

insert into KhachHang values(N'Lệ Tư lam','lamtule@gmail.com','0134586258','TPHCM')
insert into KhachHang values(N'Hoàng Thiên minh','lamtule@gmail.com','0928356812',N'Long An')
insert into KhachHang values(N'Trịnh Công cong','congcong152@gmail.com','0325585426',N'Hải Phòng')
insert into KhachHang values(N'Hồ Cẩm Đào','camhodao123@gmail.com','0389562485',N'Lào Cai')
insert into KhachHang values(N'Hoa Văn tuyệt','ngahfisnh@gmail.com','0823568426',N'Nam Định')
insert into KhachHang values(N'Hồ Ánh dương','duonganhhongyet@gmail.com','0632586235',N'Thái Nguyên')
insert into KhachHang values(N'Dương Thùy mị','mimithuy@gmail.com','0124625685','TPHCM')
insert into KhachHang values(N'Kim Tử hoàn','hoanhoantu@gmail.com','0358645236','TPHCM')
insert into KhachHang values(N'Vương Thanh bình','thanhthanhbinh@gmail.com','0456283589','TPHCM')
insert into KhachHang values(N'Nguyễn phương','nnphuong56@gmail.com','0356823459','Long An')
insert into KhachHang values(N'Nguyễn Thị Kim ngân','ngancute@gmail.com','0356842684',N'Hải Phòng')
insert into KhachHang values(N'Phạm An nhiên','nhiennhienan@gmail.com','0782368235',N'Lào Cai')
insert into KhachHang values(N'Nguyễn Phú trọng','trongtorngphu@gmail.com','0895621485',N'Lào Cai')
insert into KhachHang values(N'Nguyễn Dương Ngọc trường','truongtruong56@gmail.com','0256854287',N'Nam Định')
insert into KhachHang values(N'Thới Nguyễn phương','phuonthoinguyen@gmail.com','0723598234',N'Hải Dương')
go 

insert into HoaDon(MaKH,MaNV,MaKM,TinhTrang) values ('1','1','KM002','Thanh toan')
insert into HoaDon(MaKH,MaNV,MaKM,TinhTrang) values ('1','2','KM005','Thanh toan')
insert into HoaDon(MaKH,MaNV,MaKM,TinhTrang) values ('1','2','KM002','Chua Thanh toan')
insert into HoaDon(MaKH,MaNV,MaKM,TinhTrang) values ('1','2','KM005','Thanh toan')

insert into CTHD values ('1','1','KM010','2','79182000')
insert into CTHD values ('2','2','KM005','2','79182000')
insert into CTHD values ('3','1','KM002','3','79182000')
insert into CTHD values ('4','3','KM010','5','79182000')
insert into CTHD values ('5','4','KM005','2','79182000')
insert into CTHD values ('6','2','KM010','1','79182000')
insert into CTHD values ('7','4','KM015','3','79182000')
insert into CTHD values ('8','4','KM020','2','79182000')
insert into CTHD values ('9','2','KM002','1','79182000')

insert into DanhGia values('1','1','1','khong co gi het','5')
insert into TonKho values ('1','20')
insert into TonKho values ('2','23')
insert into TonKho values ('3','42')
insert into TonKho values ('4','15')
insert into TonKho values ('5','21')
insert into TonKho values ('6','50')
insert into TonKho values ('7','43')
insert into TonKho values ('8','65')
insert into TonKho values ('9','34')
insert into TonKho values ('10','25')
insert into TonKho values ('11','76')
insert into TonKho values ('12','14')
insert into TonKho values ('13','35')
insert into TonKho values ('14','15')
insert into TonKho values ('15','24')
insert into TonKho values ('16','87')
insert into TonKho values ('17','57')
insert into TonKho values ('18','78')
insert into TonKho values ('19','54')
insert into TonKho values ('20','15')
insert into TonKho values ('21','56')
insert into TonKho values ('22','54')
insert into TonKho values ('23','35')
insert into TonKho values ('24','12')
insert into TonKho values ('25','45')
insert into TonKho values ('26','26')
insert into TonKho values ('27','34')
insert into TonKho values ('28','24')
insert into TonKho values ('29','41')
insert into TonKho values ('30','27')
insert into TonKho values ('31','31')
insert into TonKho values ('32','35')
go 
-- câu truy vấn 
-- insert CTHD và tính đơn giá
create proc sp_insertCTHD @MaDT int,  @MaHD int , @MaKM varchar(6), @SoLuong int 
as
begin
	declare @phantram float
	declare @DonGia money
	set @phantram=(select PhanTram from KhuyenMai where @MaKM=MaKM)
	set @DonGia = (select GiaDT from DienThoai where @MaDT=MaDT)*@SoLuong*(1-@phantram/100)
	insert into CTHD values (@MaDT,@MaHD,@MaKM,@SoLuong,@DonGia)

	begin
	declare @TongTien money
	set @TongTien=(select sum(DonGia) 
					from CTHD
					where CTHD.MaHD=@MaHD)
	update HoaDon set TongTien=@TongTien where HoaDon.MaHD=@MaHD
	end 
end
	
	exec sp_insertCTHD 1,10,KM002,2

--cap nhat so luong ton sau khi mua hang 
create trigger tg_update_slton on CTHD
after insert,update
as 
begin
	update TonKho
	set SoLuongTon= TonKho.SoLuongTon -(select CTHD.SoLuong from inserted,CTHD where CTHD.MaDT=inserted.MaDT)
	from TonKho,inserted
	where TonKho.MaDT=inserted.MaDT
end 

------Tìm top 10 điện thoại có doanh thu cao nhất---
create proc search_DTmax
as
begin
select top 10 DienThoai.MaDT ,DienThoai.TenDT, DienThoai.GiaDT
 from DienThoai , CTHD
 where DienThoai.MaDT = CTHD.MaDT
 Group by DienThoai.MaDT,DienThoai.TenDT, DienThoai.GiaDT
 order by sum(CTHD.SoLuong) DESC
end

exec search_DTmax


--Tìm top 10 điện thoại mới ra---
create proc search_New
as
begin
select top 10 MaDT, TenDT, GiaDT, NgaySX
from DienThoai
order by NgaySX DESC
end

exec search_New

---Cập nhật giá điện thoại sau khi giảm giá.---
create trigger price_sp
on CTHD
for insert,update 
as begin
  declare @MaKM int, @pt int, @gia money
  select @pt =PhanTram, @gia= GiaDT
  from KhuyenMai,CTHD, DienThoai
  where CTHD.MaDT=DienThoai.MaDT 
  and CTHD.MaKM=KhuyenMai.MaKM 
  and CTHD.MaKM=@MaKM
  update CTHD
  set DonGia = @pt*@gia
end


 --Viết thủ tục in ra tất cả các sản phẩm có số lượng tồn kho lớn hơn 0
 create proc printTK
 as Begin 
  Select  DienThoai.TenDT , TonKho.SoLuongTon
  from TonKho , DienThoai
  where TonKho.SoLuongTon > 0
  and TonKho.MaDT = DienThoai.MaDT
 end

 exec printTK






delete from CTHD
delete from HoaDon
delete from DanhGia

select * from HoaDon
select * from Nhanvien
select * from KhachHang
select * from DienThoai
select * from CTHD
select * from KhuyenMai
select * from TonKho

