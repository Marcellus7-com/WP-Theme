<?php
global $post;
?>
<a href="#" class="<?php echo $button_class; ?> action-btn <?php if ('style-three' == $product_archive_style) { echo 'el-btn btn-blue-outline'; } ?>" data-product_id="<?php echo $post->ID; ?>">
    <span class="xpc-quick-view-text product__quick_view_text">Quick View</span>
    <i class="ele-icon lvgshop-search product__quick_view_icon"></i>

    <!-- loader-image -->
    <div class="<?php echo $image_class; ?>"><div class="xpc-loading-circle">  <svg class="xpc-spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
</a>
