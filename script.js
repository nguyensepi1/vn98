truyens = [
  {
    id: 'gia-vien',
    name: 'Ta Xây Gia Viên Trên Lưng Huyền Vũ (Dịch)',
    sortname: 'Gia Viên',
    img: 'gia-vien.webp',
    drive: 'https://docs.google.com/spreadsheets/d/11KvdEa0d_tMfUlXNBjf62YcfV_ToOTPjH03WVfrcAXk/edit?usp=share_link',
    content: '',
    raw: ''
  },
  {
    id: 'tien-vuc',
    name: 'Lãnh Chúa Toàn Dân: Bắt Đầu Xây Dựng Tiên Vực Bất Hủ (Dịch)',
    sortname: 'Tiên Vực',
    img: 'tien-vuc.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1GPywfg07HiqG7VEAlejXK0DMlIvarO-4CPcudeHHlEY/edit?usp=share_link',
    content: '',
    raw: ''
  },
  {
    id: 'khi-van',
    name: 'Phản Phái Vô Địch: Mang Theo Đồ Đệ Đi Săn Khí Vận (Dịch)',
    sortname: 'Khí Vận',
    img: 'khi-van.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1nM5OfscRzoIz6CNoo3K1SRsEg1357H4bnugmDOm0VFI/edit?usp=share_link',
    content: '',
    raw: ''
  },
    {
    id: 'than-khi',
    name: 'Lãnh Chúa Toàn Dân: Điểm Danh Nhận Giảm Giá Thần Khí (Dịch)',
    sortname: 'Thần Khí',
    img: 'than-khi.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1-Y4CJJGjjbKtaSlTpK1zpGV-gHsUT_oKW9DuXaRlCkg/edit?usp=share_link',
    content: '',
    raw: ''
  },
    {
    id: 'may-moc',
    name: 'Máy Móc Toàn Cầu Tiến Hóa (Dịch)',
    sortname: 'Máy Móc',
    img: 'may-moc.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1-Y4CJJGjjbKtaSlTpK1zpGV-gHsUT_oKW9DuXaRlCkg/edit?usp=share_link',
    content: '',
    raw: 'https://www.69shu.com/txt/46601.htm'
  },
  {
    id: 'binh-chung',
    name: 'Lãnh Chúa Toàn Dân: Binh Chủng Của Ta Biến Dị (Dịch - Hoàn)',
    sortname: 'Binh Chủng',
    img: 'binh-chung.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1lfNt7ExrCAhcBemDwtMsQt60GxZeGu8IBvv_mKfY1t0/edit?usp=share_link',
    content: '',
    raw: 'https://www.69shu.com/txt/40575.htm'
  },
  {
    id: 'thien-dao',
    name: 'Treo Máy Ngàn Tỷ Năm, Ta Còn Có Tiền Hơn Thiên Đạo (Dịch - Hoàn)',
    sortname: 'Thiên Đạo',
    img: 'thien-dao.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1FU2rHGchQ5IIkPE9-hA0XcJe1pjMIE8bN9B_A04JN34/edit?usp=share_link',
    content: '',
    raw: ''
  },
  {
    id: 'bac-si',
    name: 'Khi Bác Sĩ Mở Hack (Dịch - Hoàn)',
    sortname: 'Bác Sĩ',
    img: 'bac-si.webp',
    drive: '',
    content: '',
    raw: ''
  },
  {
    id: 'cau-dao',
    name: 'Cẩu Đạo: Lập Gia Tộc Ở Yêu Ma Giới (Dịch - Hoàn)',
    sortname: 'Cẩu Đạo',
    img: 'cau-dao.webp',
    drive: 'https://docs.google.com/spreadsheets/d/1bd_wGWBpPJ3GQS5fUU8YUduS7vjSfco2zzu4wFuzb5g/edit?usp=share_link',
    content: '',
    raw: ''
  }
]

// -----------------------------------------------------------------------
    home()
// -----------------------------------------------------------------------

  // create nav
  function header() {
    vn98 = document.getElementById('vn98')
    vn98.innerHTML = ''
    vn98 = document.getElementById('vn98')
    nav = document.createElement('nav')
    nav.innerHTML = `<div class="header">
                    <a class="nav_item" onclick="home()">VN98</a>
                    <div class="list">
                      <a class="nav_item" href="#" style="width: max-content">Nhận Chương</a>
                      <div class="list_truyen" id="nhan_chuong"></div>        
                    </div>
                    <div class="list">
                      <a class="nav_item" href="#">List Truyện</a>
                      <div class="list_truyen" id="list_truyen"></div>        
                    </div>
			  <div class="list">
                      <a class="nav_item" onclick="translator()">VN98 Translator</a>       
                    </div>
                    <div class="list" style="float:right">
                        <a class="nav_item" href="#" id="username"></a>
                        <div class="list_truyen" style="width: 100%">
                            <a class="nav_item" href="login/logout.php">Đăng Xuất</a>
                        </div>
                    </div>  
                    <div class="list" style="position: relative; float:right">
                        <a onclick="thong_bao(10)" class="nav_item" id="so_thong_bao_moi" style="position: relative" href="#"><img src="img/bell.webp" style="width: 24px"></a>
                        <div class="list_truyen" id="thong_bao" style=""></div>
                    </div>
                    <div id="admin"></div>     
                  </div>`
    vn98.appendChild(nav)

    truyens.map(truyen => {
    //   list truyện
      nav_item = document.createElement('a')
      nav_item.className = 'nav_item'
      nav_item.setAttribute('onclick', `detail('${truyen.id}')`)
      nav_item.innerHTML = '<img src="img/' + truyen.img + '" loading="lazy" width="20px"> ' + truyen.name
      list_truyen = document.getElementById('list_truyen')
      list_truyen.appendChild(nav_item)

    // Nhận chương
      nav_item_1 = document.createElement('a')
      nav_item_1.className = 'nav_item'
      nav_item_1.href = truyen.drive
      nav_item_1.target = '_blank'
      nav_item_1.innerHTML = '<img src="img/sheets.webp" loading="lazy" width="20px"> ' + truyen.name
      nhan_chuong = document.getElementById('nhan_chuong')
      nhan_chuong.appendChild(nav_item_1)
    })

    thong_bao(10);
    
    // body
    body = document.createElement('div')
    body.id = 'body'

    if (getCookie('admin') == 1) {
        admin()
        cho_duyet()
    }

    // -----------------------------------------------------------------------
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    document.getElementById('username').innerHTML = 'Hello, ' + getCookie('username') + '!'
    img_tet()
  }

// -----------------------------------------------------------------------

  function home() {
    header()
    vn98.appendChild(body)
    document.title = 'TEAM VN98'
    container = document.createElement('div')
    container.className = 'container'
    truyens.map((truyen) => {
      container_item = document.createElement('a')
      container_item.setAttribute('onclick', `detail('${truyen.id}')`)
      container_item.className = 'container_item'
      container_item.innerHTML = `
        <div class="item_img_div">
          <img class="item_img" src="./img/${truyen.img}" alt="${truyen.name}" title="${truyen.name}" loading="lazy">
        </div>
        <div class="item_info">
          <h2 class="item_header">${truyen.name}</h2>
          <div class="item_content">
            ${truyen.content}
          </div>
        </div>`
      container.appendChild(container_item)
    })
    body.appendChild(container)
  }

// -----------------------------------------------------------------------

  function detail(id) {
    header()
    vn98.appendChild(body)
    music_bg()
    
    $username = getCookie('username')
    truyen = truyens.find(truyen => truyen.id === `${id}`)
    document.title = truyen.name
    container = document.createElement('div')
    container.className = 'container'
    container_detail = document.createElement('div')
    container_detail.className = 'container_detail'
    container_detail.innerHTML = `
      <div class="detail_img_div">
        <img class="detail_img" src="./img/${truyen.img}" alt="${truyen.name}" title="${truyen.name}" loading="lazy">
      </div>
      <div class="detail_info">
        <h2 class="detail_header">${truyen.name} </h2>
        <div class="detail_content">
          ${truyen.content}
        </div>
        <div class="chapter">
          <div class="chapter_upload">
            <label class="chapter_upload_label" id="chapter_upload_label" for="fileupload">Upload chương tại đây!</label>
            <input id="fileupload" type="file" name="fileupload" onchange="uploadFile()" multiple/> 
            <div id="upload-status"></div>
            <div class="kitty">
                <img width="100%" src="img/tet.webp" loading="lazy">
            </div>

            <div class="mobile">
                <p>Click vào nút bên dưới để up chương nếu form upload ở trên bị lỗi</p>
                <button class="btn" onclick="show_div()">Upload V2</button>

                <div id="uploadv2">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <label class="chapter_upload_label" id="chapter_upload_label" for="file">Upload chương V2 - Mobile!</label>
                        <input style="display: none" name="id" value="${truyen.id}">
                        <input style="display: none" name="sortname" value="${truyen.sortname}">
                        <input style="display: none" name="auth" value="$username">
                        <input id="file" type="file" name="file">
                        <button class="btn" style="margin-top: 60px;">Upload Chương</button>
                    </form>
                </div>
            </div>
          </div>
          
          <div class="chapter_listchap">
            <span style="font-size: 26px;">Danh sách chương</span>
                <select name="so_chuong" id="so_chuong" onchange="listChap(this.value)">
                    <option value="10">10</option>
                    <option selected value="50">50</option>
                    <option value="100">100</option>
                </select>
            <div id="list_chap"></div>
          </div>
        </div>
      </div>`
    

    container.appendChild(container_detail)
    body.appendChild(container)
    let raw = truyen.raw
    if (raw == '') {}
    else {
        console.log(raw)
        $('.detail_header').append('<a target="_blank" href="' + raw + '"><img width="25px" src="img/raw.webp"></a>')
    } 

    listChap (50)
  }

// -----------------------------------------------------------------------
function translator() {
	header()
    	vn98.appendChild(body)
    	document.title = 'VN98 TRANSLATOR'
    	container = document.createElement('div')
    	container.className = 'container'
        var x = document.createElement("div");
	  x.style = 'width: 100%';
        x.innerHTML = `
            <h1 class="detail_header">VN98 Translator</h1>
            <h4 class="detail_header">Phiên bản dịch End-to-End BETA, hậu xử lý truyện Convert</h4>
	      <div class="container_detail">      
		<textarea placeholder="Dán nội dung chương CV vào đây..." name="text" id="text" onkeypress="press_ctrl_enter(event)"></textarea>
            <button id="run" onclick="translator_process()">OK</button>
            <textarea placeholder="Kết quả ..." name="text2" id="text2" onchange="save_chapter_ed()"></textarea>
		</div>
            <input type="text" placeholder='Nhập Name mới' id="name_new" onkeypress="press_enter(event)">
            <button onclick="add_name()">ADD</button>
            <div class="icon">
                <img src="img/questions.webp" alt="Hướng D">
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
            <ul style="padding: 4px;">
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
<style>
    .container_detail {
        height: auto;
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
      width: 330px;
    	height: 150px;
    	padding: 6px;
    	font-size: 16px;
    	border-radius: 5px;
    	box-shadow: 1px 0 5px #333;
    	background: #ffb2c0;
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
        `
        container.appendChild(x)
        body.appendChild(container)
	  if (chap_ed !== undefined) { $("#text").val(chap_ed); }
	  if (chap_beta !== undefined) { $("#text2").val(chap_beta); }
    }

// Press Ctrl + Enter to run Translate
function press_ctrl_enter(event) {
  if (event.ctrlKey && event.keyCode  == '13'){
    // Ctrl Enter pressed
	translator_process();
  }
}

// Press Enter to run Add Replace
function press_enter(event) {
  if (event.keyCode  == '13'){
    // Enter pressed
	add_name();
  }
}
    // Translator Process
    async function translator_process() {
	a = document.getElementById('run');
      a.innerText = 'Running...'
      document.getElementById('text2').value = 'Đang xử lý . . .'
      x = document.getElementById('text')
      let formData = new FormData();
      formData.append("text", x.value);
      const response = await fetch('translator/index.php', {
          method: "POST", 
          body: formData
      }); 
      a.innerText = 'OK'
      document.getElementById('text2').value = await response.text();
	save_chapter_ed()
    }

    async function add_name() {
      a = document.getElementById('name_new');
      let formData1 = new FormData();
      formData1.append("name_new", a.value);
      const response_status = await fetch('translator/add_name.php', {
          method: "POST", 
          body: formData1
      }); 
      a.value = '';
      document.getElementById('status').innerText = await response_status.text();
    }

	// Lưu chương đang ed vào cookie
	function save_chapter_ed() {
		chap_ed = $("#text").val()
		chap_beta = $("#text2").val()
	}
// -----------------------------------------------------------------------


  // Upload file
    async function uploadFile() {
        document.getElementById('chapter_upload_label').innerHTML = `Đã chọn ${fileupload.files.length} chương!`
        let formData = new FormData(); 
        for (i = 0; i < fileupload.files.length; i++) {
	    document.getElementById('upload-status').innerText = `Đang tải chương lên... (${i}/${fileupload.files.length})`
            formData.append("file", fileupload.files[i]);
            formData.append("id", `${truyen.id}`);
	    formData.append("sortname", `${truyen.sortname}`);
            formData.append('auth', getCookie('username'))
            await fetch('upload.php', {
                method: "POST", 
                body: formData
            }); 
	success(fileupload.files[i].name, 'tải lên')
        }
        document.getElementById('upload-status').innerText = `Đã tải lên ${fileupload.files.length} chương thành công!`
        document.getElementById('chapter_upload_label').innerHTML = 'Upload chương tại đây!'
        listChap(50)
        thong_bao(10)
    }

    // Upload file v2
    function show_div() {
        var x = document.getElementById("uploadv2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

// -----------------------------------------------------------------------

  // Delete file
    async function deleteFile(x) {
        if (confirm('Bạn có chắc muốn xóa Chương ' + x + ' không?')) {
            let formData = new FormData();
            formData.append("filename", x);
            formData.append("action", "delete");
            formData.append("id", `${truyen.id}`);
	    formData.append("sortname", `${truyen.sortname}`);
            await fetch('delete.php', {
                method: "POST", 
                body: formData
            }); 
	success(x, 'xóa Chương')
            listChap (50)
        }
    }

// -----------------------------------------------------------------------

  // Open file
    function openFile(x) {
        header()
        vn98.appendChild(body)

        container = document.createElement('div')
        container.className = 'container'
        container_detail = document.createElement('div')
        container_detail.className = 'container_detail'

        $.ajax({
            url: `docx.php?id=${truyen.id}&chap=${x}&name=${truyen.name}`,
            success: function(data) {
                $('.container_detail').html(data);
            }
        });

        container.appendChild(container_detail)
        body.appendChild(container)
    }

// -----------------------------------------------------------------------

  // List chap
    function listChap (x) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("list_chap").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "list_chap.php?id=" + truyen.id + "&so_chuong=" + x, true);
        xmlhttp.send();
    }

// -----------------------------------------------------------------------

  // Thông báo
    function thong_bao(x) {
        $('#thong_bao').attr('style','position: absolute; top: 100%; left: -100px; width: 400px;');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("thong_bao").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "thong_bao.php?so_thong_bao=" + x, true);
        xmlhttp.send();
        so_thong_bao_moi();
        
    }

// -----------------------------------------------------------------------

  // Số thông báo mới
    function so_thong_bao_moi() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("so_thong_bao_moi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "so_thong_bao_moi.php", true);
        xmlhttp.send();
    }

// -----------------------------------------------------------------------

  // List User chờ duyệt
    function cho_duyet() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cho_duyet").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "cho_duyet.php", true);
        xmlhttp.send();
    }
    
    // -----------------------------------------------------------------------
  // Từ chối user
    async function tu_choi(x) {
        if (confirm('Bạn có chắc muốn xóa tài khoản ' + x + ' không?')) {
            // reset formData
            let formData = new FormData();
            formData.append("username", x);
            await fetch('tu_choi.php?username=' + x, {
                method: "GET"
            }); 
        }
        cho_duyet()
    }

// -----------------------------------------------------------------------
  // Chấp nhận user
    async function chap_nhan(x) {
        let formData = new FormData();
        formData.append("username", x);
        await fetch('chap_nhan.php?username=' + x, {
            method: "GET"
        }); 
        cho_duyet()       
    }

// -----------------------------------------------------------------------

  // Send ip
    function send_ip() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {}
        };
        xmlhttp.open("POST", "get_ip.php?title=" + document.title, true);
        xmlhttp.send();
    }

// -----------------------------------------------------------------------

  // Show cho admin
    function admin() {
        div_admin = document.getElementById('admin')
        div_admin.className = 'list'
        div_admin.style = 'position: relative; float:right'
        div_admin.innerHTML = `<a class="nav_item" href="#"><img src="img/user.webp" style="width: 24px"></a>
                        <div class="list_truyen" id="cho_duyet" style="position: absolute; top: 100%; left: -100px; width: 400px;">
                        </div>`

    }
// -----------------------------------------------------------------------


function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}    

// -----------------------------------------------------------------------
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// -----------------------------------------------------------------------

// Toast
function toast ({ title, message, type, duration }) {
    const main = document.getElementById('toast')

    if (main) {
        const toast = document.createElement('div')
        const icons = {
            success: 'checkmark-circle',
            info: 'information-circle',
            error: 'alert'
        }
        const icon = icons[type]
        const delay = duration / 1000

        const autoRemove = setTimeout(function() {
            main.removeChild(toast)
        }, duration + 1000)

        toast.onclick = function(e) {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast)
                clearTimeout(autoRemove)
            }
        }
        
        toast.classList.add('toast', `toast--${type}`)
        toast.style.animation = `slideIn ease .5s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
            <div class="toast__icon"><ion-icon name="${icon}"></ion-icon></div>
            <div class="toast__body">
                <div class="toast__heading">${title}</div>
                <div class="toast__msg">${message}</div>
            </div>
            <div class="toast__close"><ion-icon name="close"></ion-icon></div>
        `;
        
        main.appendChild(toast)
    }
}

  function success(ten, action) {
    toast ({
        title: 'Thành công!',
        message: 'Bạn đã ' + action + ' ' + ten + ' thành công.',
        type: 'success',
        duration: 3000
    })
  }

// -----------------------------------------------------------------------
// Ember Music
play_music = 0;
    function music_bg() {
	cookie_music_bg = getCookie('music_bg');
	if (play_music == 0 && cookie_music_bg !== 'off') {
		var x = document.createElement("IFRAME");
 		x.setAttribute("src", "https://www.nhaccuatui.com/lh/background/EWEloXcw8oIO");
		x.setAttribute("width", "1");
		x.setAttribute("height", "1");
		x.setAttribute("frameborder", "0");
		x.setAttribute("allow", "autoplay");
		x.setAttribute("id", "music_bg");
		document.body.appendChild(x);
		play_music = 1;	
		y = document.createElement("button");
		y.setAttribute("id", "music_bg_btn");
		y.setAttribute("onclick", "music_bg_remove()");
		y.innerHTML= '<img src="img/pause-button.png">';
		document.body.appendChild(y);
	} else if (play_music == 0) {
		var x = document.createElement("IFRAME");
		x.setAttribute("width", "1");
		x.setAttribute("height", "1");
		x.setAttribute("frameborder", "0");
		x.setAttribute("id", "music_bg");
		document.body.appendChild(x);
		play_music = 1;
		y = document.createElement("button");
		y.setAttribute("id", "music_bg_btn");
		y.setAttribute("onclick", "music_bg_play()");
		y.innerHTML= '<img src="img/play-button.png">';
		document.body.appendChild(y);
		music_bg_remove();
	}
    }

    function music_bg_remove() {
	x = document.getElementById("music_bg");
	x.remove();
	setCookie('music_bg','off',7);
	y = document.getElementById("music_bg_btn");
	y.setAttribute("onclick", "music_bg_play()");
	y.innerHTML= '<img src="img/play-button.png">';
    }

    function music_bg_play() {
	play_music = 0;
	setCookie('music_bg','on',7);
	x = document.getElementById("music_bg_btn");
	x.remove();
	music_bg();
    }

// -----------------------------------------------------------------------

  // Img Tết
    function img_tet() {
        $("body").css({"background-image": "url(img/phaohoa.webp), url(img/mai.webp)", "background-repeat": "no-repeat"});     
    }


// -----------------------------------------------------------------------
$('.list').hover(function() {
    // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
    $('.list_truyen', this).slideDown();
  },function() {
    // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
    $('.list_truyen', this).slideUp();
  });