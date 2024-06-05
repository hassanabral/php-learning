<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h3><strong><?= htmlspecialchars($note['title']) ?></strong></h3>
    <br>
    <p><?= htmlspecialchars($note['body']) ?></p>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
