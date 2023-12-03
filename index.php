<?php
require 'utils/db-connection.php';
//require 'utils/functions.php';

$sql = "SELECT * FROM articles WHERE published = true ORDER BY created DESC";
$statement = $pdo->query($sql);
$articles = $statement->fetchAll();

if (empty($articles)){
//    $heading = 'OOPS';
    include '404.php';
//    die();
}

$link_active = 'home';

//Include Header
include_once "includes/header.php"; ?>


<!-- ====== Blog Section Start -->
<section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
    <div class="container">
        <div class="-mx-4 flex flex-wrap">

            <?php
                if (empty($articles)) {
                     "<h1 class='text-center text-4xl'>No Posts Were Found</h1>";
                }else{
                    foreach ($articles as $article) {

             ?>
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="wow fadeInUp group mb-10" data-wow-delay=".1s">
                    <div class="mb-8 overflow-hidden rounded">
                        <a href="/cms/article.php?id=<?= $article['id']; ?>" class="block">
                            <img
                                    src="assets/images/blog/blog-01.jpg"
                                    alt="image"
                                    class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                            />
                        </a>
                    </div>
                    <div>
                <span
                        class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white"
                >
                  <?php echo date( $article['created'] ); ?>
                </span>
                        <h3>
                            <a
                                    href="/cms/article.php?id=<?= $article['id']; ?>"
                                    class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl"
                            >
                               <?php echo html_escape($article['title']); ?>
                            </a>
                        </h3>
                        <p class="text-base text-body-color">
                            <?php echo html_escape($article['summary']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } } ?>

        </div>
    </div>
</section>
<!-- ====== Blog Section End -->

<?php include_once "includes/footer.php";








