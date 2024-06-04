<?php require('partials/heading.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h3><strong><?= $note['title'] ?></strong></h3>
    <br>
    <p><?= $note['body'] ?></p>
  </div>
</main>

<?php require('partials/footer.php') ?>