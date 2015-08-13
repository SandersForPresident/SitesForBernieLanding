<?php
get_header();
$slides = array(
  'https://berniesanders.com/wp-content/uploads/2015/08/080815_Bernie_SeaTac-6456.jpg',
  'https://berniesanders.com/wp-content/uploads/2015/08/0810151927-1.jpg'
)
?>



<main class="bs-docs-masthead" id="content" role="main">
  <div class="container">
    <div class="slides">
      <?php foreach ($slides as $slide): ?>
        <div class="slide" style="background-image: url(<?php echo $slide; ?>)"></div>
      <?php endforeach; ?>
    </div>
    <div class="content">
      <h1>Sites for Bernie Sanders</h1>
      <h2 id="typed-headline"><span>states</span>.forberniesanders.com</h2>
      <a href="#" class="btn btn-primary btn-lg">Claim Yours Today</a>
    </div>
  </div>
</main>
<div class="bs-docs-featurette">
  <div class="container">
    <h2 class="bs-docs-featurette-title">Made for everyone, everywhere.</h2>
    <p class="lead">
      Sites ForBernieSanders makes it easy for you to get your own grassroots website. <a href="#">CodersForSandres</a> has created a network of sites ready-to-go for your Bernie Sanders group. Just like Bernie, we don't want your money. Only your support.
    </p>
  </div>
</div>

<?php get_footer(); ?>
