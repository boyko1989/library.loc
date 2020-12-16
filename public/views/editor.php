<?php 
	require_once('html/head.php');
  require_once('html/header.php');
  require_once('models/editor_model.php');?>
<body>
    <div class="content">
    <?php if (isset($update_data)) echo $update_data;?>
      <a href="/">На главную</a><br><br>

        <?php if(isset($delete_message)):?>         
          
        <form action="<?=$action?>" method="post">
          <p id="attention"><b><?=$delete_message?></b></p><br><br><br>
          <p>
            <a href="<?echo PATH;?>articles/<?=$article_alias?>" class="widget-title-red">НЕТ</a>
            <a href="true-delete" class="widget-title">ДА</a>
          </p>
        </form> 

        <? else: ?> 
        
        <form action="<?=$action?>" method="post">
          <p><b>Название:</b> 
          <input type="text" name="name_articles" value="<?php if (isset($title)) echo $title;?>" size="80">
          <br><br></p>

          <p><b>Тема статьи:</b> 
          <input type="text" name="theme" value="<?php if (isset($parent)) echo $parent;?>" size="80">
            
          <br><br></p>

        <p><b>Родительская тема:</b>
        <select size="1" name="parent_theme_id">
          <?php if (isset($option)) { 
            echo $option;
          } else {
            echo $options;
          }?>
        </select><br><br>

        <textarea id="txt" name="txt" cols="80" rows="60">
          <?php if (isset($content)) echo $content;?>            
        </textarea><br><br>            
           
        <input type="hidden" name="article_id" value="<?php if (isset($id)) echo $id ;?>">
        <input type="hidden" name="theme_id" value="<?php if (isset($theme_id)) echo $theme_id ;?>">
        <input type="hidden" name="alias" value="<?php if (isset($alias)) echo $alias ;?>">
        <input type="submit" name="submit" value="Сохранить">
      </form> 
    </div>
    </body>
    <? endif; ?>
<script>
  $('.nav-toggle').on('click', function(){
  $('#menu').toggleClass('active');
  });

  $("#txt").summernote({
		
		lang:'ru-RU',
		height:500,
		minHeight:200,
		maxHeight:800,
		focus:true,
		//placeholder:'Введите данные',
		toolbar:[
		//[groupname,[list buttons]]
			['insert',['picture','link','video','table']],
			['style',['bold','italic','underline']],
			['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize','fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph','style']],
      ['height', ['height','codeview']]
		
		]//,
		//fontNames:['Arial','Times New Roman','Verdana'],
		//disableDragAndDrop:true
		
	});
</script>
</html>
