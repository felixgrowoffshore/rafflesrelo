<?php
// grid blocks


$grids = get_field('blocks');
?>
<div class="row">
<h2 style="text-align: center;">Our Services</h2>
<?php
foreach ($grids as $key => $grid) { $grid['block_image']['url']?>
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 custom-boxes">
    <a href="<?= $grid['block_url'] ?>">
      <img class="alignnone" src="<?= $grid['block_image']['url'] ?>" />
    </a>
  <?= $grid['block_label'] ?>
  </div>
<?php }

?>
</div>
