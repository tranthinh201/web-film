<?php
require('../config/db.php');
session_start();
if (!isset($_SESSION['user-client'])) {
    echo '<script>confirm("dang nhap di cu")</script>';
    header("Location: ./login.php");
}


    
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT suat_chieu.phong_chieu_id, suat_chieu.ngay_chieu,suat_chieu.gio_bat_dau,suat_chieu.gio_ket_thuc,
    suat_chieu.dinh_dang_phim_id,phim.gioi_han_tuoi,phim.ten,phim.hinh_anh,TIME(gio_ket_thuc), TIME(gio_bat_dau) FROM  suat_chieu, phim WHERE suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';

    $query = mysqli_query($connect, $sql);    
    // var_dump($query);
    // die();
    $item  = mysqli_fetch_assoc($query);

    // $data2="select * from ghe_ngoi "

    $length = count($_POST['is-seat']);


    $_SESSION['counter'] = ($_POST['is-seat']);

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include './include/library.php'
?>
    <link rel="stylesheet" href="../css/checkout.css">
    <title>thanh toán</title>
</head>
<body>
    <?php include './include/header.php' ?>
    <div id="container" class="sub">
        <div id="content">
            <div class="orderPayment">
                <div class="ad-banner wing_banner left_banner">
                        <div class="wrap_banner">
                            <a target="_blank"  href="https://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-Detail-View.aspx?movie=10848"><img src="https://media.lottecinemavn.com/Media/WebAdmin/0cd75a89aea04679b76fc7416c5cb6ca.png" width="160" border="0" alt="Banner Tinh"></a>
                        </div>
                </div>
                <div class="ad-banner wing_banner right_banner">
                        <div class="wrap_banner">
                            <a target="_blank" href="https://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-Detail-View.aspx?movie=10848"><img src="https://media.lottecinemavn.com/Media/WebAdmin/0cd75a89aea04679b76fc7416c5cb6ca.png" width="160" border="0" alt="Banner Tinh"></a>
                        </div>
                </div>
                <div class="orderCont">
                    <h2 class="order-tit">
                        Đặt hàng/ Thanh toán
                    </h2>
                    <fieldset>
                        <table class="tableRet">
                            <colgroup>
                                <col style="width: 784px;">
                                <col style="width: 196px;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>   
                                        <span class="thumImg">   
                                            <img src="../image/phim/<?= $item['hinh_anh'] ?>" alt="EM VA TRINH">
                                        </span>
                                        <div class="order_Lbox2">
                                            <strong class="order_title"><?= $item['ten']; ?></strong>
                                            <ul class="order_tList">
                                                <li class="bg_none">
                                                    <em class="Lang-LBL0055">Ngày chiếu</em> <?= $item['ngay_chieu']; ?>
                                                </li>
                                                <li>
                                                    <em class="Lang-LBL1029">Lịch chiếu phim</em> &nbsp;<?= $item['TIME(gio_bat_dau)']; ?> ~ <?= $item['TIME(gio_ket_thuc)'] ?>
                                                </li>
                                                <li>
                                                    <em class="Lang-LBL1030">Rạp chiếu</em> &nbsp;Bắc Ninh</li>
                                                <li>
                                                    <em class="Lang-LBL1037">Phòng chiếu</em> &nbsp;<?= $item['phong_chieu_id']; ?></li>
                                                <li>
                                                    <em class="Lang-LBL0038">Số lượt truy cập</em> &nbsp;HOC SINH, SINH VIEN - 2
                                                </li>
                                                <li>
                                                    <em class="Lang-LBL0033">Ghế ngồi </em>&nbsp;&nbsp;&nbsp;
                                                    <?php
                                                        for($i = 0; $i < $length; $i++) {
                                                            $GHE = "SELECT * FROM ghe_ngoi WHERE id = ".$_POST["is-seat"][$i]."";

                                                            $result = executeResult($GHE);
                                                            
                                                            foreach ($result as $row) {
                                                                echo ''.$row['vi_tri_day'].''.$row['vi_tri_cot'].',';
                                                            }
                                                        
                                                           
                                                        } 
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="sum"> 
                                        <em><strong>
                                            <?php
                                                        for($i = 0; $i < $length; $i++) {
                                                            $tien = "SELECT loai_ghe.phu_thu FROM loai_ghe, ghe_ngoi WHERE loai_ghe.id = ghe_ngoi.loai_ghe_id AND ghe_ngoi.id = ".$_POST["is-seat"][$i]."";
                                                          
                                                            $result = executeResult($tien);
                                                            
                                                            $sum = 0;
                                                            foreach ($result as $row) {
                                                                $sum += $row['phu_thu'] * $length;
                                                            }
                                                        
                                                            
                                                        } 
                                                        echo number_format($sum, 0, '', ',');
                                                    ?>
                                        </strong>₫</em>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>                          
                                <tr>
                                    <td colspan="2">
                                        <dl class="mount">
                                            <dt class="Lang-LBL0039">Tổng số tiền đặt hàng</dt>
                                            <dd class="sum"><em><strong><?=number_format($sum, 0, '', ',');?></strong>₫</em></dd>
                                        </dl>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </fieldset>
                </div>
            </div>
            <div class="dcPayment">
                <div class="dcPayment_inner">
                    <h3 class="dc_tit Lang-LBL0040">Giảm giá</h3>

                    <dl class="stepBox step3" style="display: none;">
                        <!-- 디자인 변경으로 인한 마크업 변경-->
                        <dt class="">
                            <a href="javascript:void(0);" class="Lang-LBL0040_1">L.Point</a>
                        </dt>
                        <dd class="">
                            <ul class="stepKind"></ul>
                            <div class="activeStep"></div>
                        </dd>
                    </dl>

                    <dl class="stepBox step1">
                        <!-- 디자인 변경으로 인한 마크업 변경-->
                        <dt class="">
                            <a href="javascript:void(0);" class="Lang-LBL0041">Vé/phiếu giảm giá/phiếu giảm giá</a>
                        </dt>
                        <dd class="">
                            <ul class="stepKind"><li><a href="javascript:void(0)" class=""><span>Movie Coupon</span></a></li><li><a href="javascript:void(0)" class=""><span>Discount Coupon</span></a></li></ul>
                            <div class="activeStep"></div>
                        </dd>
                    </dl>
                    <dl class="stepBox step4" style="display: none;">
                        <dt class="">
                            <a href="javascript:void(0);" class="Lang-LBL0042_1">Coin</a>
                        </dt>
                        <dd class="">
                            <ul class="stepKind"></ul>
                            <div class="activeStep"></div>
                        </dd>
                    </dl>

                    <dl class="stepBox step2">
                        <dt class="">
                            <a href="javascript:void(0);" class="Lang-LBL0042">Điểm</a>
                            <!--sunho bnk 할인 -->
                        </dt>
                        <dd class="">
                            <ul class="stepKind"><li><a href="javascript:void(0)" class="settle_8900"><span>Cinema Point</span></a></li><li><a href="javascript:void(0)" class="settle_8000"><span>L.POINT</span></a></li></ul>
                            <div class="activeStep"></div>
                        </dd>
                    </dl>

                    <dl class="stepBox payMethod">
                        <dt class="on">
                            <a href="javascript:void(0);" class="Lang-LBL0047">Thanh toán  <i class="fal fa-arrow-alt-square-down"></i></a>
                        </dt>
                        <dd class="on">
                            <ul class="pay_card"><li>    <input type="radio" id="credit" name="card01" checked="" value="credit">    <label for="credit" class="Lang-LBL2005">Thẻ tín dụng quốc tế (Mastercard, Visa, JCB,...)</label></li><li>    <input type="radio" id="atm" name="card01" value="atm">    <label for="atm" class="Lang-LBL2006">Thẻ ATM (Nội địa) / QR</label></li><li>    <input type="radio" id="wallet" name="card01" value="wallet">    <label for="wallet" class="Lang-LBL2007">eWallet(MoMoPay, ZaloPay, ShopeePay, Viettel Money...)</label></li></ul>
                            <div class="pay_cont">
                                <!-- 1218 기획 추가로 인해 div.pay_cont 클래스 추가 -->
                                <dl class="wallet_choice" style="display: block;"> <!-- card_choice -->
                                    <dt class="Lang-LBL0049">Chọn thẻ</dt>
                                    <dd class="wallet_choice_wallet" style="display: block;"> <!-- card_choice_card -->
                                        <ul class="walletKind"><li><a href="javascript:void(0)"><span><img src="https://www.lottecinemavn.com/LCHS/Image/icon/momo.png">&nbsp;MoMo Pay</span></a></li><li><a href="javascript:void(0)"><span><img src="https://www.lottecinemavn.com/LCHS/Image/icon/zalo.png">&nbsp;ZaloPay</span></a></li><li><a href="javascript:void(0)"><span><img src="https://www.lottecinemavn.com/LCHS/Image/icon/airpay.png" style="height: 30px">&nbsp;</span></a></li><li><a href="javascript:void(0)"><span><img src="https://www.lottecinemavn.com/LCHS/Image/icon/viettel.png" style="height: 30px">&nbsp;</span></a></li></ul>
                                    </dd>
                                </dl>

                                <!-- 160705 간편 결제 이용 시 안내문구 추가 -->
                                <ul class="list_dot">
                                      
                                    <!--20170405sunho <a href="javascript:void(0);" id='checkLpoint'> 삭제-->
                                    
                                </ul>

                                <!--// 1218  Lpay 3 : APP 설치 후 결제수단 미등록 시-->
                                <div id="tempCreditCardKeyIn">
                                    <div class="activeStep" id="cardKeyInActiveStep">
                                    </div>
                                </div>

                                <div class="tCont_kbcard on">
                                    <div class="ck_point" id="card_point_list">
                                    </div>

                                    <div class="activeStep" id="cardPointActiveStep">
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </dl>
                    <!-- 선택 버튼 20161026 -->
                    <div class="wrap_btn_right">
                    </div>
                    <!--// 선택 버튼 20161026 -->
                <div id="agreeBoxLL" class="agree_box mt20">
                    <strong>ĐIỀU KIỆN VÀ ĐIỀU KHOẢN KHI ĐẶT VÉ</strong>
                    <p>Xin vui lòng đọc các điều khoản sau cẩn thận trước khi sử dụng dịch vụ thanh toán trực tuyến. Với việc truy cập vào phần này của website, bạn đã đồng ý với các điều khoản sử dụng của chúng tôi. Các điều khoản này có thể thay đổi theo thời gian và bạn sẽ phải tuân theo các điều khoản được hiển thị từ thời điểm bạn đọc được các điều khoản này. Lotte Cinema luôn luôn mong muốn đem đến những giây phút giải trí tuyệt vời cho khách hàng với chất lượng dịch vụ tốt nhất. Dưới đây sẽ là một số hướng dẫn cho chính sách thanh toán vé trực tuyến.</p>
                    <ul>
                        <li>
                            <strong>1. Đối tượng áp dụng </strong>
                            <p>Chương trình thanh toán online chỉ áp dụng cho các suất chiếu quy định tại Lotte Cinema. Mỗi giao dịch đặt vé có thể thanh toán trực tuyến tối đa 8 vé cho một lần. Nếu bạn có nhu cầu mua vé với số lượng lớn hơn, vui lòng liên hệ với bộ phận Quan Hệ Khách Hàng của chúng tôi qua số điện thoại +84.28.3775.2521 - ext 161.</p>
                        </li>
                        <li>
                            <strong>2. Chính sách Hoàn Vé hay Đổi Vé</strong>
                            <p>Trên website, giá vé được quy định là giá vé dành cho người lớn, trừ trường hợp có thông báo khác.</p>
                            <p>Lotte Cinema không chấp nhận hoàn tiền hoặc đổi vé đã thanh toán thành công trên website của Lotte Cinema.</p>
                            <p>Lotte Cinema chỉ thực hiện hoàn tiền trong trường hợp khi giao dịch, tài khoản của bạn đã bị trừ tiền nhưng hệ thống của chúng tôi không ghi nhận việc đặt vé của bạn, và bạn không nhận được xác nhận đặt vé thành công. Khi đó, bạn vui lòng liên hệ với rạp Lotte Cinema mà bạn vừa chọn để mua vé bằng cách bấm vào đây hoặc bạn có thể liên hệ với chúng tôi qua địa chỉ email cs@lotte.vn</p>
                            <p>Sau khi đã xác nhận các thông tin của khách hàng cung cấp về giao dịch không thành công, tùy theo từng loại tài khoản khách hàng sử dụng mà việc hoàn tiền sẽ có thời gian khác nhau:</p>
                            <ul>
                                <li>1. Thẻ ATM (Nội địa): hoàn tiền trong 1 tuần làm việc </li>
                                <li>2. Thẻ VISA/ MasterCard (Nội địa): hoàn tiền trong 1 tháng làm việc</li>
                                <li>3. Thẻ ATM của ngân hàng Vietcombank: hoàn tiền trong vòng 48 giờ làm việc.</li>
                            </ul>
                            <p>Trước khi thanh toán vé trực tuyến, chúng tôi khuyên bạn nên xác nhận lại Tên phim, Giờ chiếu và Rạp chiếu của bộ phim bạn muốn xem.</p>
                        </li>
                        <li>
                            <strong>3. Tin nhắn xác nhận đặt vé</strong>
                            <p>Sau khi hoàn thành việc thanh toán vé trực tuyến, bạn sẽ nhận được một tin nhắn miễn phí, xác nhận mã số đặt vé và các thông tin vé đã đặt đến số điện thoại bạn đã đăng ký. Chúng tôi không chịu trách nhiệm trong trường hợp bạn khai sai số điện thoại/ thông tin cá nhân dẫn đến không nhận được tin nhắn xác nhận mã vé. Vì vậy, vui lòng kiểm tra kỹ thông tin cá nhân/ số điện thoại trước khi thực hiện thanh toán. Lưu ý rằng tin nhắn này chỉ có tính chất dự phòng và chúng tôi chỉ chấp nhận số điện thoại di động tại Việt Nam. Do đó, chúng tôi đề nghị bạn khi tiến hành các bước thanh toán, cần đọc kĩ các thông tin trên màn hình về rạp chiếu phim, tên phim, suất chiếu, chỗ ngồi trước khi hoàn tất việc xác nhận tất cả các thông tin về vé.</p>
                            <p>Nếu bạn cần hỗ trợ hay thắc mắc, khiếu nại về nội dung xác nhận mã vé thì vui lòng gửi email đến địa chỉ email cs@lotte.vn để được hỗ trợ. Chúng tôi chỉ chấp nhận khi khiếu nại được gửi từ email. Sau 60 phút kể từ khi giao dịch thanh toán thành công, nếu chúng tôi không nhận được email nào từ phía bạn thì coi như mọi trách nhiệm của chúng tôi đã hoàn thành. Chúng tôi không chấp nhận giải quyết bất kỳ khiếu nại, khiếu kiện nào sau khoảng thời gian trên.</p>
                            <p>Chúng tôi không hỗ trợ xử lý và sẽ không chịu trách nhiệm trong trường hợp đã gửi thư xác nhận mã vé đến số điện thoại của bạn nhưng vì một lý do nào đó mà bạn không thể đến xem phim (no-show).</p>
                        </li>
                        <li>
                            <strong>4. Nhận Vé</strong>
                            <p>Hiện tại chúng tôi chưa có dịch vụ hủy hoặc thay đổi thông tin vé thanh toán trực tuyến. Vui lòng kiểm tra lại những xác nhận trực tuyến và/hoặc trên di động của bạn một cách cẩn thận vì chúng sẽ cung cấp cho bạn những thông tin quan trọng để nhận vé cho suất chiếu bạn đã chọn. Hãy nhớ mang tin nhắn xác nhận đặt vé đến rạp Lotte Cinema. Khi tới rạp, bạn hãy tìm các bảng chỉ dẫn tới khu vực dành riêng cho khách hàng đặt vé xem phim online.</p>
                            <p>Bên cạnh đó, bạn cần mang theo giấy tờ tùy thân có ảnh của bạn như CMND, thẻ sinh viên hoặc passport.</p>
                            <p>Nếu bạn sử dụng thẻ tín dụng không phải phát hành ở Việt Nam, ngoài giấy tờ tùy thân có ảnh, xin vui lòng mang theo thẻ tín dụng để xuất trình khi lấy vé. </p>
                            <p>Bằng việc thanh toán qua website này, bạn chấp nhận vị trí ghế ngồi mà bạn đã đặt. Bạn đồng ý rằng, trong những trường hợp có sự thay đổi về chương trình phim hoặc bất khả kháng, chúng tôi có quyền hoàn trả lại bất kỳ vé nào từ việc mua bán qua trang web này hoặc thực hiện việc chuyển vé cho bạn qua suất chiếu khác theo yêu cầu của bạn.</p>
                        </li>
                        <li>
                            <strong>5. Phí Đặt Vé</strong>
                            <p>Những vé thanh toán trên website Lotte Cinema sẽ phải chấp nhận một phụ phí không hoàn lại gọi là Phí Đặt Vé, ngoại trừ các trường hợp đặc biệt khi Lotte Cinema không thể cung cấp cho bạn vé đã đặt Hiện tại mức phí này là 0 ₫ cho tất cả các giao dịch thanh toán vé online. Tuy nhiên, mức phí này có thể thay đổi bất cứ khi nào. Chúng tôi sẽ thông báo đến bạn khi có thay đổi.</p>
                        </li>
                        <li>
                            <strong>6. Phân Loại Phim</strong>
                            <p>Mức độ phổ biến phim được duyệt bởi Cục Điện Ảnh thuộc Bộ Văn Hóa Thể Thao và Du Lịch Việt Nam. Do đó, khi bạn tiến hành đặt vé và thanh toán, bạn phải hoàn toàn chịu trách nhiệm với việc độ tuổi của bạn được phép xem bộ phim mà bạn lựa chọn. Khi đến lấy vé tại quầy vé, nhân viên Lotte Cinema có thể yêu cầu bạn xuất trình giấy tờ tùy thân để chứng minh độ tuổi quy định.</p>
                        </li>
                        <li>
                            <strong>7. Thuế Giá Trị Gia Tăng</strong>
                            <p>Thuế giá trị gia tăng (GTGT) được áp dụng cho tất cả các mặt hàng và dịch vụ trên trang mạng này. Các đơn giá trên trang mạng này đã bao gồm GTGT nếu có.</p>
                        </li>
                        <li>
                            <strong>8. Chức năng chống gian lận</strong>
                            <p>Lotte Cinema (hoặc bên thứ ba - nhà cung cấp cổng thanh toán điện tử, hoặc/và các bên ký kết khác) sẽ sử dụng các công nghệ đặc biệt để nhận biết các hoạt động giả mạo trên trang mạng, ví dụ: sử dụng thẻ tín dụng giả. Sự chấp nhận hợp tác của bạn cùng với nỗ lực của Lotte Cinema là rất cần thiết. Bạn chấp chận rằng Lotte Cinema có thể chấm dứt quyền truy cập và sử dụng trang mạng của Lotte Cinema nếu bạn hoặc người khác hành động nhân danh bạn vì lý do nào đó nằm trong diện nghi vấn có gian lận hoặc vi phạm các điều khoản này.</p>
                        </li>
                        <li>
                            <strong>9. Sử dụng thẻ tín dụng/ thẻ ghi nợ.</strong>
                            <p>Nếu bạn phát hiện thẻ của mình bị sử dụng giả mạo để mua hàng trên trang mạng này, bạn hãy lập tức liên hệ với ngân hàng phát hành thẻ của bạn theo qui trình.</p>
                        </li>
                        <li>
                            <strong>10. Cảnh Báo An Ninh</strong>
                            <p>Lotte Cinema sẽ hết sức cố gắng sử dụng mọi biện pháp và tuân theo mọi cách thức có thể để giữ an toàn cho tất cả các thông tin cá nhân của bạn, và chúng tôi cũng sẽ thường xuyên cập nhật những thông tin chính xác nhất. Trang mạng này có những công nghệ an ninh đảm bảo việc bảo vệ các thông tin bị thất lạc, lạm dụng hoặc thay đổi. Mặc dù vậy, không phải tất cả các dữ liệu truyền qua Internet đều có thể đảm bảo 100%, vì thế chúng tôi không thể đưa ra một sự đảm bảo tuyệt đối rằng mọi thông tin bạn cung cấp đều được bảo vệ tât cả mọi lúc.</p>
                        </li>
                        <li>
                            <strong>11. Chính sách bảo mật thông tin</strong>
                            <p>• Mục đích và phạm vi thu thập thông tin:<br>Thông tin cá nhân của Quý khách mà chúng tôi có được trong quá trình giao dịch chỉ dùng vào các mục đích sau:<br>- Hỗ trợ và giải đáp các thắc mắc của Quý khách;<br>- Cập nhật các thông tin mới nhất về các chương trình, dịch vụ ... của Lotte Cinema đến Quý khách;</p>
                            <p>• Thông tin thu thập bao gồm: tên, số điện thoại, email.</p>
                            <p>• Phạm vi sử dụng thông tin:<br>Chúng tôi thu thập và sử dụng thông tin cá nhân của Quý khách phù hợp với mục đích đã nêu bên trên và hoàn toàn tuân thủ nội dung của “Chính sách bảo mật” này. Tuy nhiên, Quý khách có quyền yêu cầu chúng tôi ngừng sử dụng thông tin cá nhân của Quý khách bất kỳ lúc nào.</p>
                            <p>• Thời gian lưu trữ thông tin:<br>Thông tin của Quý khách sẽ được lưu trữ đến khi Quý khách có yêu cầu Chúng tôi ngừng sử dụng các thông tin này.</p>
                            <p>• Địa chỉ của đơn vị thu thập và quản lý thông tin cá nhân:<br>Công Ty TNHH Lotte Cinema Việt Nam.<br>Địa chỉ: Tầng 3 TTTM Lotte Số 469 Đường Nguyễn Hữu Thọ, P Tân Hưng Quận 7, TPHCM, Việt Nam.</p>
                            <p>• Phương tiện và công cụ để người dùng tiếp cận và chỉnh sửa dữ liệu cá nhân của mình:<br>Website.</p>
                            <p>• Cam kết bảo mật thông tin cá nhân khách hàng:<br>Chúng tôi cam kết chỉ sử dụng cho mục đích và phạm vi đã nêu và không tiết lộ cho bất kỳ bên thứ ba nào khi chưa có sự đồng ý bằng văn bản của Quý khách.</p>
                        </li>
                    </ul>
                    <p>* Xin lưu ý chúng tôi được quyền cung cấp thông tin cá nhân của Quý khách trong trường hợp khi có yêu cầu từ các cơ quan Nhà nước có thẩm quyền.</p>
                    <strong>LIÊN HỆ</strong>
                    <p>Quý khách cần hỗ trợ hoặc tư vấn về dịch vụ và các vấn đề có liên quan, mong quý khách liên hệ trực tiếp với chúng tôi để nhận được sự trợ giúp nhanh chóng nhất qua địa chỉ: cs@lotte.vn</p>
                    </div>
                    <div id="devMessage" class="mt10 mb10">
                        <input type="checkbox" id="settleAgree" name="settleAgree" value="Y">
                        <label id="settleAgreeLL" for="settleAgree">cam kết mua vé xem phim này cho người xem ở độ tuổi quy định và tôi đã đọc và đồng ý với Điều Kiện và Điều Khoản.</label>
                        <label id="settleAgreeEN" for="settleAgree" style="display: none;">Yes, I agree to the Terms and Conditions and am purchasing age-appropriate tickets with this order.</label>
                        <!---->
                    </div>
                </div>             
               
            </div>

        </div>                 

                <!-- ----------------------TOTAL-MOVIE------------------------- -->

<div class="total-movie">
    <div class="container">
        <div class="item-movie">
            <p class="title-item-movie">Phim chiếu rạp</p>
            <div class="box-item-movie">
                <div class="image-box-item-movie">
                    <img style="width: 70%;" src="../image/phim/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten'] ?>">
                </div>
                <div class="infor-movie">
                    <div class="name-mocie">
                        <p><?= $item['ten'] ?></p>
                    </div>
                    <div class="type-movie">
                        <p><?= $item['dinh_dang_phim_id'] ?></p>
                    </div>
                    <div class="age-watch-movie">
                        <p><?= $item['gioi_han_tuoi'] ?> tuổi trở lên</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Thông tin vé đặt</p>
            <div class="infor-ticket">
                <div class="detail-ticket">
                    <ul>
                        <li>
                            Ngày chiếu
                        </li>
                        <li>
                            Giờ chiếu
                        </li>
                        <li>
                            Rạp chiếu
                        </li>
                        <li>
                            Ghế ngồi
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <?= $item['ngay_chieu'] ?>
                        </li>
                        <li>
                            <?= $item['TIME(gio_bat_dau)'] ?> ~ <?= $item['TIME(gio_ket_thuc)'] ?>
                        </li>
                        <li>
                            Vincom Bắc Ninh
                        </li>
                        <li id="value-list">
                            <?php
                                for($i = 0; $i < $length; $i++) {
                                    $GHE = "SELECT * FROM ghe_ngoi WHERE id = ".$_POST["is-seat"][$i]."";

                                    $result = executeResult($GHE);
                                    
                                    foreach ($result as $row) {
                                        echo ''.$row['vi_tri_day'].''.$row['vi_tri_cot'].',';
                                    }
                                
                                   
                                } 
                            ?>                                                   
                        </li>
                    </ul>
                </div>
                <div class="total-price-tiket">
                    
                </div>
            </div>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Thông tin sản phẩm</p>
            <p class="price-ticket">vui lòng chọn sản phẩm</p>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Tổng tiền đơn hàng</p>
            <div class="detail-ticket">
                    <ul>
                        <li>
                            Đặt trước phim
                        </li>
                        <li style="margin-top: 0;">
                            Đồ uống
                        </li>
                    </ul>
                    <ul>
                        <li id="price-ticket">
                            0
                        </li>
                        <li style="margin-top: 0;">
                            0
                        </li>
                    </ul>
            </div>
            <div class="total-price-tiket" style="margin-top: 60px;">
                <span style="margin-top:-30px"><?= number_format($sum, 0, '', ',');?>đ</span>
                <a class="btn_purchase" href="./final.php?id=<?=$id?>&sum=<?=$sum?>">
                    THANH TOÁN
                </a>
            </div>
        </div>
    </div>
<!-- ----------------------TOTAL-MOVIE------------------------- -->
</div>

    <div class="footBnImg">
        <div class="bnBxMain">
             <a target="_blank" href="https://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-Detail-View.aspx?movie=10835"><img src="https://media.lottecinemavn.com/Media/WebAdmin/7c75bc213f8b439fbf0ea7d4f7a3bf41.jpg" width="980" alt="Bottom 1 JW3"></a>
             <a  target="_blank" href="https://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-Detail-View.aspx?movie=10848"><img src="https://media.lottecinemavn.com/Media/WebAdmin/a7a22994983946c99da56432ab2d7633.jpg" width="980" height="372" alt="Bottom 2 EVT"></a>
        </div>
    </div>
</body>

    <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <?php include './include/footer.php' ?>
    <!-- jQuery library -->
    <script src="../js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- Paralax.js -->
    <script src="../parallax.js/parallax.js"></script>
    <!-- Waypoints -->
    <script src="../waypoints/jquery.waypoints.min.js"></script>
    <!-- Slick carousel -->
    <script src="../slick/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="../magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Inits product scripts -->
    <script src="../js/script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
    <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
    <script type="text/javascript">
        var list = document.getElementById('value-list');
    </script>
</html>