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

<div style="background-color: #eff3f7; padding-top: 60px; padding-bottom: 60px;">
  <div class="container">
    <h2>Claim your site</h2>

    <form>
      <div class="form-group">
        <label>Organization</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label>Cause</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label>Contact Name</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label>Contact Email</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label>Anything else?</label>
        <textarea class="form-control" ></textarea>
      </div>

      <a href="#" class="btn btn-primary btn-lg">Claim</a>

    </form>
  </div>
</div>

<?php get_footer(); ?>
