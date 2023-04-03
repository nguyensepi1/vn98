<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VN98 Translator</title>
  <style>

  </style>
</head>
<body>

<h1 class="detail_header">VN98 Translator</h1>
            <h4 class="detail_header">Phiên bản dịch End-to-End BETA, hậu xử lý truyện Convert</h4>
            <div>
            <textarea placeholder="Dán nội dung chương CV vào đây..." name="text" id="text"></textarea>
            <button onclick="translator_process(this)">OK</button>
            <textarea placeholder="Kết quả ..." name="text2" id="text2"></textarea>
        </div>
        <input type="text" placeholder='Nhập Name mới' id="name_new">
        <button onclick="add_name()">ADD</button> 
            <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/1545/1545492.png" alt="">
                <div id="huong_dan">
                    <span> 
                        Hướng Dẫn: <br>
                        - Nhập Name cần thêm vào ô: <br>
                        VD: Mục Lương <br>
                        - Nếu Name trong CV khác với ED thì nhập: <br>
                        VD: Thái Âm thành=thành Thái Âm <br>
                    </span>
                </div>
            </div>
            <div id="status"></div>
            
            <br>
            <h3>Chức năng:</h3>
            <ul>
                <li>Auto replace các từ thường gặp trong CV.<br>
                    VD: anh hùng đơn vị -> đơn vị Anh Hùng <br>
                    VD: vật liệu đặc biệt của kiến trúc -> vật liệu kiến trúc đặc biệt <br>
                    VD: trang bị giới thiệu -> giới thiệu trang bị <br>
                    ...
                </li>
                <li>Tự động phát hiện Tên Riêng để xử lý. <br>
                    VD: Lâm Hữu trước mặt -> Trước mặt Lâm Hữu <br>
                    VD: Lâm gia người thừa kế -> Người thừa kế của Lâm gia <br>
                    VD: Về hướng Lâm Hữu công tới -> tấn công về hướng Lâm Hữu <br>
                    VD: cách đó không xa Lâm Hữu -> Lâm Hữu cách đó không xa <br>
                    ...
                </li>
                <li>Đổi đơn vị Vạn/Ức của Trung sang đơn vị Việt Nam.<br>
                    VD: 12 vạn -> 120 ngàn <br>
                    VD: 123 vạn -> 1 triệu 230 ngàn <br>
                    VD: 12 ức -> 1 tỷ 200 triệu <br>
                    ...        
                </li>   
                <li>Auto viết hoa chữ cái đầu câu.</li>
            </ul>

            <h3>Hạn chế:</h3>
            <ul>
                <li>Chưa có khả năng tự học, chỉ có thể hiểu được Tên Riêng và các từ Replace đã thêm trước đó</li>
                <li></li>
                <li></li>
            </ul>

<script>

    // translator_process
    async function translator_process(a) {
      a.innerText = 'Running...'
      document.getElementById('text2').value = 'Đang xử lý . . .'
      x = document.getElementById('text')
      let formData = new FormData();
      formData.append("text", x.value);
      const response = await fetch('index.php', {
          method: "POST", 
          body: formData
      }); 
      a.innerText = 'OK'
      document.getElementById('text2').value = await response.text();
    }

    async function add_name() {
    //   document.getElementById('name_new').value = 'Đang xử lý . . .'
      a = document.getElementById('name_new');
      let formData1 = new FormData();
      formData1.append("name_new", a.value);
      const response_status = await fetch('add_name.php', {
          method: "POST", 
          body: formData1
      }); 
      a.value = '';
      document.getElementById('status').innerText = await response_status.text();
    }
</script>

<style>
    form {
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
    textarea {
        display: block;
        width: 100%;
        height: 300px;
        border: 1px solid #f37489;
        border-radius: 10px;
        padding: 12px;
        outline: none;
    }

    textarea::selection {
        background: #f5c1ca;
        color: #ff0000;
    }

    button {
        background-color: #f18497;
        color: #fff;
        font-size: 18px;
        padding: 8px 16px;
        margin: auto 4px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        height: fit-content;
    }
    .detail_header {
        text-align: center;
    }
    input {
        width: 300px;
        border: 1px solid #f37489;
        border-radius: 10px;
        padding: 12px;
        outline: none;
	    margin: 8px;
    }

    input::selection {
        background: #f5c1ca;
        color: #ff0000;
    }
    #status {margin: 16px 0;}

    .icon {
        position: relative;
        width: 30px;
        height: 30px;
    }
    .icon img {
        width: 100%;
    }

    #huong_dan {
        display: none;
        width: 250px;
        height: 130px;
        padding: 6px;
        border-radius: 5px;
        box-shadow: 1px 0 5px #333;
        background: #f5c1ca;
        color: #ff0000;
        position: absolute;
    }
    #huong_dan span {
        position: relative;
    }
    #huong_dan::before {
        content: '';
        display: block;
        position: relative;
        top: -10px;
        left: -20px;
        width: 50px;
        height: 10px;
    }
    .icon:hover #huong_dan {
        display: block;
    }
</style>
</body>
</html>