<?php namespace VahanMargaryan\Lraty;

class Lraty
{
    public function html($item_id, $avg_rate = 0)
    {
        $html = '<input type="hidden" value="' . $avg_rate . '" name="lraty-' . $item_id . '">';
        $html .= '<div id="lraty" data-item="' . $item_id . '" data-score="' . $avg_rate . '"></div>';
        return $html;
    }

    public function js()
    {
        return '<script src="' . \URL::asset('packages/lraty/jquery.raty.js') . '" type="text/javascript" charset="utf-8"></script>';
    }

    public function js_init($params = array())
    {
        if (!isset($params['score'])) {
            $params['score'] = 'function() { return $(this).attr(\'data-score\'); }';
        }
        if (!isset($params['number'])) {
            $params['number'] = '5';
        }
        if (!isset($params['click'])) {
            $params['click'] = 'function(score, evt) {
                $(\'input[name="lraty-\' + $(this).attr(\'data-item\') + \'"]\').val(score);
              }';
        }
        if (!isset($params['path'])) {
            $params['path'] = '\'' . \URL::asset('packages/lraty/images') . '\'';
        }
        $options = '';
        foreach ($params as $key => $value) {
            $options .= '\'' . $key . '\':' . $value . ',';
        }
        $options = substr($options, 0, -1); //removing last comma
        $code = '<script type="text/javascript">
        $(document).ready(function() {
  			$(\'body #lraty\').raty({' . $options . '});
        });
  			</script>';
        return $code;
    }
}