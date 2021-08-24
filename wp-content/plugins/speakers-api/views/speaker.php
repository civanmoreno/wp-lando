<div class="spk_box">
    <style scoped>
        .spk_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .spk_field{
            display: contents;
        }
    </style>
    <p class="meta-options spk_field">
        <label for="spk_id">Speaker_ID</label>
        <input id="spk_id"
               type="text"
               name="spk_id"
               value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_id', true ) ); ?>">
    </p>
    <p class="meta-options spk_field">
        <label for="spk_name">Name</label>
        <input id="spk_name"
            type="text"
            name="spk_name"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_name', true ) ); ?>">
    </p>
    <p class="meta-options spk_field">
        <label for="spk_last_name">Last Name</label>
        <input id="spk_last_name"
            type="text"
            name="spk_last_name"
           value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_last_name', true ) ); ?>">
    </p>
    <p class="meta-options spk_field">
        <label for="spk_company">Company Name</label>
        <input id="spk_company"
            type="text"
            name="spk_company"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_company', true ) ); ?>">
    </p>
    <p class="meta-options spk_field">
        <label for="spk_job">Job</label>
        <input id="spk_job"
            type="text"
            name="spk_job"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_job', true ) ); ?>">
    </p>
    <p class="meta-options spk_field">
        <label for="spk_bio">Bio</label>
        <textarea id="spk_bio"
            type="textarea"
            name="spk_bio"><?php echo esc_attr( get_post_meta( get_the_ID(), 'spk_bio', true ) ); ?></textarea>
    </p>
</div>