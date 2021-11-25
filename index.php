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

  <p>The Square Enix Indpendent Wiki Alliance, or SEIWA, is a network of independent wikis established in 2011 and focused on providing high-quality coverage of Square Enix and its content. We work together, along with our affiliates and others, to promote our values:
   <ul>
         <li>Providing the best-quality content on the various Square Enix video games and media.</li>
         <li>Co-operating and supporting one another</li>
         <li>Promoting and supporting independent wikis and their right to operate as they wish.</li>
      </ul>
   </p>

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
