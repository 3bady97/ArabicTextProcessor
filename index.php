<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>كتابة النص العربي بدون نقط</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
      text-align: center;
      transition: box-shadow 0.3s ease-in-out;
    }

    .container:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
    }

    textarea {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 5px;
      transition: border-color 0.3s ease-in-out;
      resize: vertical; /* يمكنك تعديل هذا حسب الحاجة */
    }

    textarea:focus {
      border-color: #4caf50;
    }

    #result {
      margin-top: 10px;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

<div class="container">
  <label for="text">أدخل النص:</label>
  <textarea id="text" name="text"></textarea>
  <div id="result"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
  $("#text").on('input', function() {
    var textValue = $(this).val();

    $.ajax({
      type: "POST",
      url: "process.php",
      data: { text: textValue },
      success: function(response) {
        $("#result").html(response);
      }
    });
  });
});
</script>

</body>
</html>
