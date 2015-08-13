<?php
get_header();
$slides = array(
  'https://berniesanders.com/wp-content/uploads/2015/08/080815_Bernie_SeaTac-6456.jpg',
  'https://scontent-ord1-1.xx.fbcdn.net/hphotos-xfp1/t31.0-8/11807565_881506715237667_18143513052069287_o.jpg',
  'https://berniesanders.com/wp-content/uploads/2015/08/0810151927-1.jpg',
  'https://scontent-ord1-1.xx.fbcdn.net/hphotos-xpt1/t31.0-8/11872020_881506155237723_9096113027227239162_o.jpg',
  'https://scontent-ord1-1.xx.fbcdn.net/hphotos-xft1/t31.0-8/11856275_880165818705090_8220844970488020042_o.jpg',
  'https://scontent-ord1-1.xx.fbcdn.net/hphotos-xap1/t31.0-8/11823075_880716421983363_4308904511561947777_o.jpg'
);
?>



<main class="bs-docs-masthead" id="banner" role="main">
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

<div id="claim" style="background-color: #eff3f7; padding-top: 60px; padding-bottom: 60px;">
  <div class="container">
    <h2>Claim your site</h2>

    <form id="claim-form">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('site_request'); ?>" />
      <div class="form-group">
        <label>Organization</label>
        <input type="text" name="organization" class="form-control" placeholder="Who do you represent?"/>
      </div>
      <div class="form-group">
        <label>Cause</label>
        <input type="text" name="cause" class="form-control" placeholder="What is your focus?" />
      </div>
      <div class="form-group">
        <label>URL</label><br/>
        <input type="text" name="url" class="form-control" placeholder="your-subdomain" style="width: 150px; text-align: right; display: inline-block;" />.forberniesanders.com
      </div>
      <div class="form-group">
        <label>Contact Name</label>
        <input type="text" name="contact_name" class="form-control" placeholder="What is your name?" />
      </div>
      <div class="form-group">
        <label>Contact Email</label>
        <input type="text" name="contact_email" class="form-control" placeholder="How we will contact you" />
      </div>
      <div class="form-group">
        <label>Anything else?</label>
        <textarea name="message" class="form-control" ></textarea>
      </div>

      <button class="btn btn-primary btn-lg">Request Site</button>

    </form>
  </div>
</div>

<div class="container" style="padding-top: 60px; padding-bottom: 60px;">
  <h2>Help fill the map!</h2>
  <div id="map"></div>
</div>

<?php get_footer(); ?>
