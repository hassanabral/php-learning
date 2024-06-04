<?php require('partials/heading.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <p>All notes from user <strong><?= $user['name'] ?></strong></p>
    <br>
    <ol>
      <?php foreach($notes as $note) : ?>
        <li><a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= $note['title'] ?></a></li>
      <?php endforeach; ?>
    </ol>
  </div>
</main>

<?php require('partials/footer.php') ?>