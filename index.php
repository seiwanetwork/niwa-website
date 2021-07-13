<?php
include('_header.php');
?>

<link rel="stylesheet" type="text/css" href="dependencies/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="dependencies/slick/slick-theme.css"/>

<div class="main">
   <div class="carousel text-center">
      <?php
         $enwikis = (array) $dataHelper->getMemberWikis('en');
         $wikis = array_merge($enwikis);
         shuffle($wikis);
         foreach ($wikis as $wiki) {
            echo "
            <div>
               <a href='{$dataHelper->getWikiLink($wiki->url, $wiki->mainpage)}'>
                  <img src='{$wiki->logo}' alt='{$wiki->title}' width='100px' style='margin: 0 auto;' />
               </a>
            </div>
            ";
         }
      ?>
   </div>

  <h1>Welcome to the Square Enix Independent Wiki Alliance</h1>

  <p>SEIWA's main tenet is to always give its member wikis the freedom to decide how they will operate. SEIWA will never force any policy on a member wiki, and will always focus on community and material over dollars and cents. A member wiki and its material will belong to its community, not the SEIWA, and not anyone else.</p>

  <p>Furthermore, SEIWA acts as a safe haven from the profit-oriented wiki farms that ignore their workers and restrict their freedom like a boa does its prey. Any wiki that meets the basic policies outlined on our "Rules" page will be free to apply for membership. SEIWA also acts to promote fellow independent wikis, encouraging traffic and editing across member wikis. Even these minor policies will not be forced on a wiki -- if it decides that it does not like them, that wiki is free to leave, without the alliance making a grab for its content.</p>

  <p>We, SEIWA, exist to provide an alternative to the oppressive rule of wiki-farms; a path that will never sacrifice the wiki pillars of freedom, cooperation, and quality for the chance at an extra buck.</p>

  <p>
    Learn more about us on our <a href="/about">about page</a>, and check out our <a href="/members">members</a> and <a href="/affiliates">affiliates</a>.
  </p>

  <h1>Stay engaged</h1>

  <p>
    We have a <a href="https://discord.gg/tAHWTS8">public Discord server</a> for Square Enix and wiki fans alike to keep up-to-date with going-ons between our members.
  </p>

  <p>
    You can also engage with our <a href="/members">members</a> and <a href="/affiliates">affiliates</a> through their own Discord servers and social media.
  </p>

</div>

<script type="text/javascript" src="dependencies/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="dependencies/jquery/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="dependencies/slick/slick.min.js"></script>
<script type="text/javascript">
$('.carousel').slick({
   infinite: true,
   slidesToShow: 5,
   slidesToScroll: 1,
   autoplay: true,
   autoplaySpeed: 1500,
   swipeToSlide: true,
});
</script>

<?php
include('_sidebar.php');
include('_footer.php');
?>
