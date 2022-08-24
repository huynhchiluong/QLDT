<footer id="footer">
                <div class="footer-content">
                        <div class="footer-block">
                            <p class="title">Thông tin liên hệ</p>
                            <p><i style="color: rgb(202, 199, 199);">Nếu có ý kiến đóng góp xây dựng trang web hãy liên hệ chúng tôi qua các cổng sau:</i></p>
                            <div class="info-link">
                                <p><i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/nhan10091999">  Phan Trọng Nhân</a></p>
                                <p><i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/luong.huynh.73700">  Huỳnh Chí Lương</a></p>
                                <p><i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/VanTich.99">  Nguyễn Dương Hiếu Hân</a></p><br>
                                <p style="margin:1%"><i class="fas fa-graduation-cap"></i> University of Information Technology</p>
                            </div>
                        </div>
                        <div class="footer-block">
                                <p class="title">Liên hệ nhanh</p><br>
                                <div class="contact-detail">
                                    <h6 id="tell">Tư vấn mua hàng: <a href="tel:+8413306056827"> +8413.306.056.827</a></h6>
                                    <h6 id="tell">Liên hệ bảo hành: <a href="tel:+8413306056827"> +8413.306.056.827</a></h6>
                                    <h6>Email: 
                                        <ul>
                                            <li><a  href="mailto:175200435@gm.uit.edu.vn"> Nguyễn Dương Hiếu Hân</a></li>
                                            <li><a href="mailto:17520844@gm.uit.edu.vn"> Phan Trọng Nhân</a></li>
                                            <li><a href="mailto:17520728@gm.uit.edu.vn"> Huỳnh Chí Lương</a></li>
                                        </ul>
                                    </h6>
                                    <h6 id="tell">Liên hệ báo giá: <a href="tel:+8413306056827"> +8413.306.056.827</a></h6>
                                </div>
                        </div>
                        <div class="footer-block">
                            <p class="title">Bản đồ</p>
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2299074785715!2d106.80135925059757!3d10.870110392219999!2m3!1f0!2f
                                    0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5n
                                    IHRpbiDEkEhRRyBUUC5IQ00!5e0!3m2!1svi!2s!4v1572595810809!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" 
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                </div>
                <div class="ft-bottom">
                    <p>Copyright ® 2019 - <a href="https://student.uit.edu.vn/">University of Information Technology</a> - Design by PTN-NDHH-HCL</p>
                </div>
            </footer>
                
                
                
                
               

        
    </body> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Home.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script>
        var countDownDate = new Date("Jan 1, 2020 15:37:25").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("time").innerHTML =  days + '<span style="color:black;"> Ngày </span>'+ hours + '<span style="color:black;"> Giờ </span>'
            + minutes + '<span style="color:black;"> Phút </span>' + seconds + '<span style="color:black;"> Giây </span>';
            if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</html>