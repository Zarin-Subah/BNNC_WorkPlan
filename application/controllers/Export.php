<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_export');
    }

    function to_excel($file_name, $query) {
        $filename = base64_decode(urldecode($file_name));
        $query = base64_decode(urldecode($query));
        $rows = $this->mod_export->data_query($query);
        header('Content-Disposition: attachment; filename=' . $filename . '.xls');
        header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');
        print "\xEF\xBB\xBF"; // UTF-8 BOM
        $h = array();
        foreach ($rows as $row) {
            foreach ($row as $key => $val) {
                if (!in_array($key, $h)) {
                    $h[] = $key;
                }
            }
        }
        echo '<table><tr>';
        foreach ($h as $key) {
            $key= str_replace("organization","committee", $key);
            $key = ucwords($key);            
            echo '<th>' . $key . '</th>';
        }
        echo '</tr>';

        foreach ($rows as $row) {
            echo '<tr>';
            foreach ($row as $val)
                $this->writeRow($val);
        }
        echo '</tr>';
        echo '</table>';
    }

    function writeRow($val) {
        echo '<td>' . $val . '</td>';
    }

}

?>