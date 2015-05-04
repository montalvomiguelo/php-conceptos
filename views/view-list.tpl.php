<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
  <style>
    p {
      color: rgba(0, 0, 0, 0.71);
    }
    .header {
      color: #ee6e73;
      font-weight: 300;
    }
  </style>
</head>
<body>

  <nav>
    <div class="nav-wrapper container">
      <a id="logo-container" href="./" class="brand-logo">Films</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="view-list"><i class="mdi-action-view-list"></i></a></li>
        <li><a href="#"><i class="mdi-action-search"></i></a></li>
        <li><a href="#"><i class="mdi-communication-quick-contacts-mail"></i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="view-list">View list</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="header"><?= $title; ?></h1>
        <ul class="collection">
          <?php foreach ( $films as $film ) : ?>
          <li class="collection-item avatar">
            <i class="mdi-av-videocam circle"></i>
            <span class="title"><?php echo $film['title']; ?></span>
            <p><strong>Rate: </strong><?php echo $film['rating']; ?> <br>
              <strong>Rental Rate</strong>: <?php echo $film['rental_rate']; ?>
            </p>
            <a href="index.php?url=films&id=<?php echo $film['film_id']; ?>" class="secondary-content"><i class="mdi-action-grade"></i></a>
          </li>
          <?php endforeach; ?>
        </ul> <!-- Films list -->
        <ul id="pagination" class="pagination">
          <li class="waves-effect <?php echo ($pagesLimit <= $limit ? 'disabled' : ''); ?>">
            <a href="<?php echo ( $pagesStart > $limit  ? '?p=' . ($pagesStart - 1) : '' ); ?>"><i class="mdi-navigation-chevron-left"></i></a>
          </li>
          <?php for ($i = $pagesStart; $i <= $pagesLimit; $i++) : ?>
          <li class="waves-effect <?php echo ($p == $i ? 'active' : ''); ?>"><a href="?p=<?php echo $i; ?>"><?= $i; ?></a></li>
          <?php endfor; ?>
          <li class="waves-effect <?php echo ($pagesLimit >= $pagesTotal ? 'disabled' : ''); ?>">
            <a href="<?php echo ($pagesLimit < $pagesTotal ? '?p=' . ($pagesLimit + 1): ''); ?>"><i class="mdi-navigation-chevron-right"></i></a>
          </li>
        </ul> <!-- Films pagination -->
      </div>
    </div>
  </div>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Films</h5>
          <p class="grey-text text-lighten-4">The most popular films.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Quick links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="view-list">View list</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Search</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © <?= date('Y'); ?> Copyright Text
        <a class="grey-text text-lighten-4 right" href="./">Home</a>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
  <script>
    // Initialize collapse button
    $(".button-collapse").sideNav();

    // Do nothing for disabled buttons (pag)
    $('#pagination').on('click', '.disabled a', function(e) {
      e.preventDefault();
    });
  </script>

</body>
</html>