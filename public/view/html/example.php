<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Адаптивная вёрстка</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic|Playfair+Display:400,700&subset=latin,cyrillic">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/view/css/style_examp.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
<header>
    <nav class="container">
      <a class="logo" href="">
        <span>L</span>
        <span>O</span>
        <span>G</span>
        <span>O</span>
      </a>
      <div class="nav-toggle"><span></span></div>
      <form action="" method="get" id="searchform">
        <input type="text" placeholder="Искать на сайте...">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <ul id="menu">
        <li><a href="/">На главную</a></li>
        <li><a href="">Портфолио</a></li>
        <li><a href="">Об авторе</a></li> 
      </ul>
    </nav>
  </header>
<div class="container">
  <div class="posts-list">

    <article id="post-1" class="post">
      <div class="post-image"><a href=""><img src="https://html5book.ru/wp-content/uploads/2016/05/rasskaz_slovar_rodnoy_prirodi.jpg"></a></div>
        <div class="post-content">
          <div class="category"><a href="">Дизайн</a></div>
          <h2 class="post-title">Весна</h2>
          <p>Очень богат русский язык словами, относящимися к временам года и к природным явлениям, с ними связанным.</p>

          <p>Возьмем хотя бы раннюю весну. У неё, у этой ещё зябнувшей от последних заморозков девочки-весны, есть в котомке много хороших слов.</p>

          <p>Начинаются оттепели, ростепели, капели с крыш. Снег делается зернистым, ноздреватым, оседает и чернеет. Его съедают туманы. Постепенно развозит дороги, наступает распутица, бездорожье. На реках появляются во льду первые промоины с черной водой, а на буграх — проталины и проплешины. По краю слежавшегося снега уже желтеет мать-и-мачеха.</p>
          <div class="post-footer">
          <a class="more-link" href="">Продолжить чтение</a>
          <div class="post-social">
          <a href="" target="_blank"><i class="fa fa-facebook"></i></a> 
          <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="" target="_blank"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </article>

    <article id="post-2" class="post">
    <div class="post-image"><a href=""><img src="https://html5book.ru/wp-content/uploads/2016/05/rasskaz_Russia.jpg"></a></div>
    <div class="post-content">
    <div class="category"><a href="">Дизайн</a></div>
    <h2 class="post-title">Лето</h2>
    <p>С этого лета я навсегда и всем сердцем привязался к Средней России. Я не знаю страны, обладающей такой огромной лирической силой и такой трогательно живописной — со всей своей грустью, спокойствием и простором, — как средняя полоса России. Величину этой любви трудно измерить. Каждый знает это по себе. Любишь каждую травинку, поникшую от росы или согретую солнцем, каждую кружку воды из летнего колодца, каждое деревце над озером, трепещущее в безветрии листьями, каждый крик петуха, каждое облако, плывущее по бледному и высокому небу.</p>

    <div class="post-footer">
    <a class="more-link" href="">Продолжить чтение</a>
    <div class="post-social">
    <a href="" target="_blank"><i class="fa fa-facebook"></i></a> 
    <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="" target="_blank"><i class="fa fa-pinterest"></i></a>
    </div>
    </div>
    </div>
    </article>
  </div> <!-- конец div class="posts-list"-->

  <aside>
    <div class="widget">
      <h3 class="widget-title">Категории</h3>
      <ul class="widget-category-list">
        <li><a href="">Дизайн</a> (2)</li>
        <li><a href="">Вёрстка</a> (5)</li>
        <li><a href="">Видео</a> (1)</li>
      </ul>
    </div>

    <div class="widget">
      <h3 class="widget-title">Последние записи</h3>
      <ul class="widget-posts-list">

        <li>
          <div class="post-image-small">
            <a href=""><img src="https://html5book.ru/wp-content/uploads/2016/05/rasskaz_slovar_rodnoy_prirodi.jpg"></a>
          </div>
          <h4 class="widget-post-title">Весна</h4>
        </li>

        <li>
          <div class="post-image-small">
            <a href=""><img src="https://html5book.ru/wp-content/uploads/2016/05/rasskaz_Russia.jpg"></a>
          </div>
          <h4 class="widget-post-title">Лето</h4>
        </li>

        <li>
          <div class="post-image-small">
            <a href=""><img src="https://html5book.ru/wp-content/uploads/2016/05/rasskaz_rodnaya_priroda_osen.jpg"></a>
          </div>
          <h4 class="widget-post-title">Осень</h4>
        </li>
      </ul>
    </div>

    <div class="widget">
      <h3 class="widget-title">Подписка на рассылку</h3>
      <form action="" method="post" id="subscribe">
        <input type="email" name="email" placeholder="Ваш email" required>
        <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
      </form>
    </div>
  </aside>
</div> <!-- конец div class="container"-->

<footer>
<div class="container">
<div class="footer-col"><span>Мой блог © 2016</span></div>
<div class="footer-col">
<div class="social-bar-wrap">
<a title="Facebook" href="" target="_blank"><i class="fa fa-facebook"></i></a>
<a title="Twitter" href="" target="_blank"><i class="fa fa-twitter"></i></a>
<a title="Pinterest" href="" target="_blank"><i class="fa fa-pinterest"></i></a>
<a title="Instagram" href="" target="_blank"><i class="fa fa-instagram"></i></a>
</div>
</div>
<div class="footer-col">
<a href="mailto:admin@yoursite.ru">Написать письмо</a>
</div>
</div>
</footer>
<script>
$('.nav-toggle').on('click', function(){
$('#menu').toggleClass('active');
});
</script>

</body>
</html>

