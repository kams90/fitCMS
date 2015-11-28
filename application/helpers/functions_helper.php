<?php

if (!function_exists('prepareURL')) {

    /**
     * Prepare URL fron string
     * 
     * @param string $sText
     * @return string
     */
    function prepareURL($sText)
    {
        $sText = clearDiacritics($sText);
        $sText = strtolower($sText);
        $sText = str_replace(' ', '-', $sText);
        $sText = preg_replace('/[^0-9a-z\-\/]+/', '', $sText);
        $sText = preg_replace('/[\-]+/', '-', $sText);
        $sText = trim($sText, '-');

        return $sText;
    }
}

if (!function_exists('prepareImageName')) {

    /**
     * Prepare image name from string
     * 
     * @param string $sText
     * @return string
     */
    function prepareImageName($sText)
    {
        $sText = clearDiacritics($sText);
        $sText = strtolower($sText);
        $sText = str_replace(' ', '-', $sText);
        $sText = preg_replace('/[^0-9a-z\-._]+/', '', $sText);
        $sText = preg_replace('/[\-]+/', '-', $sText);
        $sText = trim($sText, '-');

        return $sText;
    }
}

if (!function_exists('extension')) {

    /**
     * Get extension from string
     *
     * @param string $file_name
     * @return string
     */
    function extension($file_name)
    {
        $ex = explode(".", $file_name);
        $i = (count($ex) - 1);

        return strtolower($ex[$i]);
    }
}

if (!function_exists('createBreadCrumbs')) {

    /**
     * Create breadcrumbs from array
     *
     * @param array $array
     * @param string $class
     * @return string
     */
    function createBreadCrumbs($array, $return_link = '', $show_home = true, $class = 'breadcrumb', $wrap = 'ol')
    {
        $CI =& get_instance();

        $result = '';

        $result .= '<'.$wrap.' class="'.$class.'">'.PHP_EOL;

        if ($return_link != '') {
            $result .= '<li class="return"><a href="'.$return_link.'"><i class="fa fa-arrow-left"></i></a></li>'.PHP_EOL;
        }

        if ($show_home) {
            $result .= '<li><i class="fa fa-dashboard"></i> <a href="'.admin_url().'">'.lang('dashboard').'</a></li>'.PHP_EOL;
        }

        $i = 1;
        foreach ($array as $name => $link) {
            if ($i < count($array)) {
                $result .= '<li><a href="'.$link.'">'.$name.'</a></li>'.PHP_EOL;
            } else {
                $result .= '<li class="active"><a href="javascript:void(0);">'.$name.'</a></li>'.PHP_EOL;
            }

            $i++;
        }

        $result .= '</'.$wrap.'>'.PHP_EOL;

        return $result;
    }
}