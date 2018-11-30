<!DOCTYPE html>
<html>
<head>
	<title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
</head>
<body>
    
        <div class="gallery_wrapper">
            <h1>Галлерея картинок</h2>

        <?php foreach($contentOfDir as $key => $value):?>
        <a data-fancybox="gallery"  href=<?="img/" . $value?>  class="big-image_gallery_link"> 
                <img src=<?="img/" . $value?> width="300px" class="small-image_gallery"></a>
                
        <?php endforeach?>
        </div>
        
         
          

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="/js/jquery.fancybox.js"></script> 
</body>
</html>