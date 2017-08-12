<!DOCTYPE html>
<html>
<head>
  <script src='tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>

<body>
  <form method="post" action="test.php">
    <textarea id="mytextarea" name="hello"></textarea>
    <input type="submit">
  </form>
</body>
</html>