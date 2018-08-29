<?php
if (! function_exists('ipn_hash_varify')) {

    /**
     * @param string $store_passwd
     * @return bool
     */
    function ipn_hash_varify($store_passwd = "")
    {
        if (isset($_POST) && isset($_POST['verify_sign']) && isset($_POST['verify_key'])) {
            # NEW ARRAY DECLARED TO TAKE VALUE OF ALL POST

            $pre_define_key = explode(',', $_POST['verify_key']);

            $new_data = array();
            if (!empty($pre_define_key)) {
                foreach ($pre_define_key as $value) {
                    if (isset($_POST[$value])) {
                        $new_data[$value] = ($_POST[$value]);
                    }
                }
            }
            # ADD MD5 OF STORE PASSWORD
            $new_data['store_passwd'] = md5($store_passwd);

            # SORT THE KEY AS BEFORE
            ksort($new_data);

            $hash_string = "";
            foreach ($new_data as $key => $value) {
                $hash_string .= $key . '=' . ($value) . '&';
            }
            $hash_string = rtrim($hash_string, '&');

            if (md5($hash_string) == $_POST['verify_sign']) {

                return true;

            } else {
                return false;
            }
        } else return false;
    }
}