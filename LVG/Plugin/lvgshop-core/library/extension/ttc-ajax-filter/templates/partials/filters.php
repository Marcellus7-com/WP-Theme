<?php foreach ($filterlists as $filterlist) : ?>
  <div class="ajax-posts__filterlist el-hm1-filter-btn-group">
    <ul class="ajax-post__filter-category <?php echo esc_html( $filterlist['id'] ); ?>">
          <li>
          <a href="#" class="ajax-posts__filter js-reset-filters is_active">
              All
          </a>
        </li>
      <?php foreach ($filterlist['filters'] as $filter) : ?>
        <li>
          <a href="<?= get_term_link( $filter, $filter->taxonomy ); ?>" class="ajax-posts__filter" data-filter="<?= $filter->taxonomy; ?>" data-term="<?= $filter->slug; ?>">
              <?= $filter->name; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    
  </div>
<?php endforeach; ?>