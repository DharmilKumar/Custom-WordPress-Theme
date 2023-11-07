<?php
/*
Template Name: Checked Item
*/

get_header();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Social Media</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $i = 1; ?>
      <?php if (!empty(get_post_meta(68, 'c1', true))) {
        echo '<th scope="row">' . $i . '</th>
        <td>' . get_post_meta(68, "c1", true) . '</td>
      ';
        $i++;
      } ?>

    </tr>
    <tr>
      <?php if (!empty(get_post_meta(68, 'c2', true))) {
        echo '<th scope="row">' . $i . '</th>
        <td>' . get_post_meta(68, "c2", true) . '</td>
      ';
        $i++;
      } ?>
    </tr>
    <tr>
      <?php if (!empty(get_post_meta(68, 'c3', true))) {
        echo '<th scope="row">' . $i . '</th>
        <td>' . get_post_meta(68, "c3", true) . '</td>
      ';

        $i++;
      }
      ?>
    </tr>
    <tr>
      <?php if (!empty(get_post_meta(68, 'c4', true))) {
        echo '<th scope="row">' . $i . '</th>
        <td>' . get_post_meta(68, "c4", true) . '</td>
      ';

        $i++;
      }
      ?>
    </tr>
  </tbody>
</table>

<?php
get_footer(); ?>