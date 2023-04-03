<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="stylesheet" href="styles.css?v=1.0.1">
</head>
<body>
    <div id="root">
      <h1>VN98 - Chat</h1>
      <div id="results">
        <div class="item">
          <div class="message bot">Xin chào! Tôi là trợ lý ảo và sẵn sàng hỗ trợ bạn. Cần gì hãy nói ra nhé!</div>
        </div>
      </div>
      <div id="inputHolder">
        <select name="action" id="action">
          <option value="chat">Chat</option>
          <option value="trans">Dịch</option>
        </select>
        <textarea id="inputField" type="text" rows="1"></textarea>
        <button id="submitBtn">Send</button>
      </div>
    </div>
    <script src="main.js?v=1.0.0"></script>
</body>
</html>
