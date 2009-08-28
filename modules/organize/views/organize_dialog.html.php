<?php defined("SYSPATH") or die("No direct script access.") ?>
<script type="text/javascript">
  var move_url = "<?= url::site("organize/move/__TARGET_ID__?csrf=$csrf") ?>";
  var rearrange_url = "<?= url::site("organize/rearrange/__TARGET_ID__/__BEFORE__?csrf=$csrf") ?>";
  var sort_order_url = "<?= url::site("organize/resort/$album->id/__COL__/__DIR__?csrf=$csrf") ?>";
</script>
<div id="gOrganize" class="gDialogPanel">
  <h1 style="display:none"><?= t("Organize %name", array("name" => p::purify($album->title))) ?></h1>
  <div id="bd">
    <div class="yui-gf">
      <div class="yui-u first">
        <h3><?= t("Albums") ?></h3>
      </div>
      <div id="gMessage" class="yui-u">
        <div class="gInfo"><?= t("Drag and drop photos to re-order or move between albums") ?></div>
      </div>
    </div>
    <div id="gOrganizeContentPane" class="yui-gf">
      <div id="gOrganizeTreeContainer" class="yui-u first">
        <ul id="gOrganizeAlbumTree">
          <?= $album_tree ?>
        </ul>
      </div>
      <div id="gOrganizeDetail" class="yui-u">
        <div id="gMicroThumbPanel"
             ref="<?= url::site("organize/content/__ITEM_ID__/__OFFSET__") ?>">
          <ul id="gMicroThumbGrid">
            <?= $micro_thumb_grid ?>
          </ul>
        </div>
        <div id="gOrganizeControls">
          <a id="gOrganizeClose" href="#" ref="done"
             class="gButtonLink ui-corner-all ui-state-default"><?= t("Close") ?></a>
          <form>
            <?= t("Sort order") ?>
            <?= form::dropdown(array("id" => "gOrganizeSortColumn"), album::get_sort_order_options(), $album->sort_column) ?>
            <?= form::dropdown(array("id" => "gOrganizeSortDir"), array("ASC" => "Ascending", "DESC" => "Descending"), $album->sort_order) ?>
          </form>
        </div>
        <div id="gOrganizeProgress" style="display: none">
          <div class="gProgressBar"></div>
          <div id="gStatus"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#gOrganize").ready($.organize.init);
</script>
