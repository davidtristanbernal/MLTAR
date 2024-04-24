<!DOCTYPE html>
<html>
<head>
  <title>Form Example</title>
  <style>
    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    
    .form-group label {
      width: 100px;
    }
  </style>
</head>
<body>
  <form action="store.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required>
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
    </div>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>
