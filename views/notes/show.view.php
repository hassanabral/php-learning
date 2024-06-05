<?php require('views/partials/heading.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h3><strong><?= htmlspecialchars($note['title']) ?></strong></h3>
    <br>
    <p><?= htmlspecialchars($note['body']) ?></p>
  </div>
</main>

<?php require('views/partials/footer.php') ?>