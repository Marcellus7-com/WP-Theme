<?php
function lvgshop_faq_style_1($settings, $this_is) {
    $id = $this_is->get_id();


    ?>
    <!-- create account section start -->
    <section class="el-faq-section ptb-120 wow fadeInUp">
        <div class="container container-xxxl">
            <!-- title bar -->
            <div class="row justify-content-center mb-40 wow fadeInUp">
                <div class="col-lg-6 text-center">
                    <span class="text-uppercase text-blue font-semibold el__subtitle"><?php echo $settings['section-subtitle']; ?></span>
                    <h2 class="font-semibold text-dark text-capitalize el__title">
                        <?php echo $settings['section-title']; ?>
                    </h2>
                </div>
            </div>

            <!-- faq section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="<?php echo $id; ?>">
                        <?php
                        $i = 0;
                        foreach ($settings['list'] as $item){
                            $i++;
                            ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="el-faq-heading-<?php echo $item['_id']; ?>">
                                <button class="accordion-button <?php if($i > 1){ echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#el-faq-collapse-<?php echo $item['_id']; ?>" aria-expanded="true" aria-controls="el-faq-collapse-<?php echo $item['_id']; ?>">
                                    <?php echo $item['faq_title']; ?>
                                </button>
                            </h2>
                            <div id="el-faq-collapse-<?php echo $item['_id']; ?>" class="accordion-collapse <?php if (1 == $i){ echo 'collapse show'; }else{ echo 'collapse'; } ?>" aria-labelledby="el-faq-heading-<?php echo $item['_id']; ?>"
                                 data-bs-parent="#<?php echo $id; ?>">
                                <div class="accordion-body">
                                    <p>
                                        <?php echo $item['faq_content']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- create account section end -->
    <?php
}



