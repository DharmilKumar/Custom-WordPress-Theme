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
      <th scope="row">1</th>
      <td><?php echo get_post_meta(68,'c1',true); ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php echo get_post_meta(68,'c2',true); ?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2"><?php echo get_post_meta(68,'c3',true); ?></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td colspan="2"><?php echo get_post_meta(68,'c4',true); ?></td>
    </tr>
  </tbody>
</table>

<?php
get_footer();