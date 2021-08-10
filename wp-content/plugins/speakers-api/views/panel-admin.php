<div class="wrap">
    <h1>Speakers API Settings</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'speakers-settings-group' ); ?>
        <?php do_settings_sections( 'speakers-settings-group' ); ?>
        <table class="form-table">
            <tr>
                <th scope="row">User</th>
                <td>
                    <label>
                        <input type="email" name="speaker_user" value="<?php echo esc_attr( get_option('speaker_user') ); ?>" />
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">Password</th>
                <td>
                    <label>
                        <input type="password" name="speaker_password" value="<?php echo esc_attr( get_option('speaker_password') ); ?>" />
                    </label>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>
