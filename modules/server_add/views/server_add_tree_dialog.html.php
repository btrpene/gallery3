<?php defined("SYSPATH") or die("No direct script access.") ?>
<script type="text/javascript">
  var GET_CHILDREN_URL = "<?= url::site("server_add/children?path=__PATH__") ?>";
</script>

<div id="gServerAdd">
  <h1 style="display: none;"><?= t("Add Photos to '%title'", array("title" => p::clean($item->title))) ?></h1>

  <p id="gDescription"><?= t("Photos will be added to album:") ?></p>
  <ul class="gBreadcrumbs">
    <? foreach ($item->parents() as $parent): ?>
    <li>
      <?= p::clean($parent->title) ?>
    </li>
    <? endforeach ?>
    <li class="active">
      <?= p::clean($item->title) ?>
    </li>
  </ul>

  <?= form::open(url::abs_site("server_add/add"), array("method" => "post")) ?>
  <?= access::csrf_form_field(); ?>
  <ul id="gServerAddTree" class="gCheckboxTree">
    <?= $tree ?>
  </ul>

  <span>
    <?= form::submit(array("id" => "gServerPauseButton", "name" => "add", "disabled" => true, "class" => "submit", "style" => "display:none"), t("Pause")) ?>
    <?= form::submit(array("id" => "gServerAddButton", "name" => "add", "disabled" => true, "class" => "submit"), t("Add")) ?>
  </span>
  <?= form::close() ?>
  <div class="gProgressBar" style="visibility: hidden" ></div>
</div>
